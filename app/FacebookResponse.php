<?php

namespace IndianSuperLeague;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Config;

class FacebookResponse extends Model
{
    protected static $client;
    protected $fillable = ['text', 'image', 'buttons', 'collections', 'facebook_request_id'];
    protected $table = 'facebook_responses';

    public static function init() {
        self::$client = new Client([
            'base_uri'  => 'https://graph.facebook.com/v2.6/'
        ]);
    }

    public function facebookRequest() {    
        return $this->belongsTo('IndianSuperLeague\FacebookRequest');
    }

    public function sendFacebookMessage() {

        Log::info('========= FacebookMessage - START =============');
        Log::info($this->formFacebookMessage());
        Log::info('========= FacebookMessage - END =============');

        self::$client->request('POST', 'me/messages', [
            'query' => [
                'access_token' => Config::get('services.facebook.page_access_token')
            ],
            'json' => [
                'recipient' => [
                    'id' => $this->facebookRequest->sender_id
                ],
                'message' => $this->formFacebookMessage()
            ]
        ]);
    }

    public function formFacebookMessage() {
        $message = [
            'text' => Config::get('services.facebook.failed_message')
        ];

        if(!empty($this->text) && empty($this->buttons)) {
            $message = [
                'text' => $this->text
            ];
        } else if(!empty($this->image)) {
            $message = [
                'attachment' => [
                    'type' => 'image',
                    'payload' => [
                        'url' => $this->image
                    ]
                ]
            ];
        } else if(!empty($this->buttons)) {
            $message = [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => $this->text,
                        'buttons' => $this->buttons
                    ]
                ]
            ];
        } else if(!empty($this->collections)) {
            $message = [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements' => $this->collections
                    ]
                ]
            ];
        }

        return $message;

    }

    public static function processTexts($texts, $facebook_request) {

        $facebook_responses = collect();

        if(!is_array($texts)) {
            $texts = [$texts];
        }

        foreach($texts as $text) {

            $split_texts = str_split($text, Config::get('services.facebook.text_character_limit'));
            $split_texts_size = sizeof($split_texts);

            foreach($split_texts as $key => $split_text) {

                if($key != $split_texts_size - 1) {
                    $split_text_last_char = substr($split_text, -1);

                    if($split_text_last_char != ' ') {
                        $split_text = $split_text . '-';
                    }
                }

                $facebook_response = new FacebookResponse([
                    'facebook_request_id'   => $facebook_request->id,
                    'text'                  => $split_text
                ]);
                $facebook_responses->push($facebook_response);
            }
        }

        return $facebook_responses;
    }

    public static function processImages($images, $facebook_request) {

        $facebook_responses = collect();

        if(!is_array($images)) {
            $images = [$images];
        }

        foreach($images as $image) {
            $facebook_response = new FacebookResponse([
                'facebook_request_id'   => $facebook_request->id,
                'image'                 => $image 
            ]);
            $facebook_responses->push($facebook_response);
        }

        return $facebook_responses;
    }

    public static function processTextWithLinks($textWithLinks, $facebook_request) {
        return new FacebookResponse([
            'facebook_request_id'   => $facebook_request->id,
            'text'                  => $textWithLinks['text'],
            'buttons'               => $textWithLinks['buttons']
        ]);
    }

    public static function processCollections($collections, $facebook_request) {
       $collection_chunks = array_chunk($collections, 10);
        $facebook_responses = collect();
        foreach ($collection_chunks as $chunk) {
            $facebook_response = new FacebookResponse([
                'facebook_request_id'   => $facebook_request->id,
                'collections'           => $chunk
            ]);
            $facebook_responses->push($facebook_response);
        }

        return $facebook_responses;
    }

    public static function processData($data, $facebook_request, $is_fulfillment = false) {

        $facebook_responses = collect();
        
        if($is_fulfillment == true) {

            foreach(self::processTexts($data->speech, $facebook_request) as $facebook_response) {
                $facebook_responses->push($facebook_response);
            }

        } else {

            if(!empty($data['texts'])) {
                foreach(self::processTexts($data['texts'], $facebook_request) as $facebook_response) {
                    $facebook_responses->push($facebook_response);
                }
            }
            
            if(!empty($data['images'])) {
                foreach(self::processImages($data['images'], $facebook_request) as $facebook_response) {
                    $facebook_responses->push($facebook_response);
                }
            }

            if(!empty($data['textWithLinks'])) {
                $facebook_responses->push(self::processTextWithLinks($data['textWithLinks'], $facebook_request));
            }

            if(!empty($data['collections'])) {
                foreach(self::processCollections($data['collections'], $facebook_request) as $facebook_response) {
                    $facebook_responses->push($facebook_response);
                }
            }

        }

        return $facebook_responses;
    }
}
