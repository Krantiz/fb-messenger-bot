<?php

namespace LodhaStarter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Config;

class FacebookResponse extends Model
{
    protected static $client;
    protected $fillable = ['text', 'image', 'buttons', 'video', 'quick_replies', 'collections', 'facebook_request_id'];
    protected $table = 'facebook_responses';

    public static function init() {
        self::$client = new Client([
            'base_uri'  => 'https://graph.facebook.com/v2.6/',
            'verify'    => env('SSL_VERIFY_FLAG', true)
        ]);
    }

    public function facebookRequest() {    
        return $this->belongsTo('LodhaStarter\FacebookRequest');
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
                    'id' => $this->facebookRequest->facebook_user_id
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
        }  else if(!empty($this->quick_replies)) {
            $message = [
                'text' => $this->quick_replies['text'],
                'quick_replies' => $this->quick_replies['replies']
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
        } else if(!empty($this->video)) {
            Log::info('========= PROCESS FB REQUEST =============');
            Log::info($this->video);
            $message = [
                'attachment' => [
                    'type' => 'video',
                    'payload' => [
                        'url' => $this->video
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

    public static function processQuickReplies($quick_replies, $facebook_request) {
        return new FacebookResponse([
            'facebook_request_id'   => $facebook_request->id,
            'quick_replies'         => $quick_replies
        ]);
    }

    public static function processVideo($video_link, $facebook_request) {
        return new FacebookResponse([
            'facebook_request_id'   => $facebook_request->id,
            'video'         => $video_link[0]
        ]);
    }

    public static function processData($data, $facebook_request, $is_fulfillment = false) {

        $facebook_responses = collect();
        
        if($is_fulfillment == true) {

            foreach(self::processTexts($data->speech, $facebook_request) as $facebook_response) {
                $facebook_responses->push($facebook_response);
            }

        } else {

            foreach($data as $key => $chunk) {

                if($key == 'texts') {
                    foreach(self::processTexts($chunk, $facebook_request) as $facebook_response) {
                        $facebook_responses->push($facebook_response);
                    }
                }

                if($key == 'quick_replies') {
                    $facebook_responses->push(self::processQuickReplies($chunk, $facebook_request));
                }

                if($key == 'images') {
                    foreach(self::processImages($chunk, $facebook_request) as $facebook_response) {
                        $facebook_responses->push($facebook_response);
                    }
                }

                if($key == 'collections') {
                    foreach(self::processCollections($chunk, $facebook_request) as $facebook_response) {
                        $facebook_responses->push($facebook_response);
                    }
                }

                if($key == 'textWithLinks') {
                    $facebook_responses->push(self::processTextWithLinks($chunk, $facebook_request));
                }

                if($key == 'video') {
                    $facebook_responses->push(self::processVideo($chunk, $facebook_request));
                }

            }

        }

        return $facebook_responses;
    }

    public static function eligibleForQuickReplies($response, $action) {
        return !empty($response) && !array_key_exists('quick_replies', $response->toArray()) && !in_array($action, Config::get('services.facebook.skip_actions'));
    }

    public static function genericQuickReplies($request_id) {

        return new FacebookResponse([
            'facebook_request_id'   => $request_id,
            'quick_replies' => [
                'text' => Config::get('services.facebook.generic_quick_reply_texts')[array_rand(Config::get('services.facebook.generic_quick_reply_texts'))],
                'replies' => Config::get('services.facebook.generic_quick_replies')
            ]
        ]);
    }

    public function hasQuickReplies(){
        return array_key_exists('quick_replies', $this->toArray());
    }
}
