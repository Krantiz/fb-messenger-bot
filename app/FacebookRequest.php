<?php

namespace IndianSuperLeague;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Config;

class FacebookRequest extends Model
{
    protected static $client;
	protected $fillable = ['sender_id', 'timestamp', 'text', 'page_id', 'mid', 'seq', 'session_id', 'unanswered'];
    protected $table = 'facebook_requests';

    public static function init() {
        self::$client = new Client([
            'base_uri'  => 'https://graph.facebook.com/v2.6/'
        ]);
    }

    public function facebookResponses() {    
        return $this->hasMany('IndianSuperLeague\FacebookResponse');
    }

    public function facebookUser() {    
        return $this->belongsTo('IndianSuperLeague\FacebookUser');
    }

    public function acknowledgeRequestReceipt() {

        Log::info("REQUEST RECEIPT ACKNOWLEDGED FOR { $this->mid }=============");

        self::$client->request('POST', 'me/messages', [
            'query' => [
                'access_token' => Config::get('services.facebook.page_access_token')
            ],
            'json' => [
                'recipient' => [
                    'id' => $this->sender_id
                ],
                'sender_action' => "typing_on"
            ]
        ]);
    }

    public function acknowledgeRequestCompletion() {

        Log::info("REQUEST COMPLETION ACKNOWLEDGED FOR { $this->mid }=============");

        self::$client->request('POST', 'me/messages', [
            'query' => [
                'access_token' => Config::get('services.facebook.page_access_token')
            ],
            'json' => [
                'recipient' => [
                    'id' => $this->sender_id
                ],
                'sender_action' => "typing_off"
            ]
        ]);
    }

    public function checkIfUnanswered() {
        $facebook_responses = $this->facebookResponses;
        if(sizeof($facebook_responses) == 1) {
            $text = $facebook_responses[0]->text;
            if($text == \Config::get('services.facebook.failed_message') || $text == \Config::get('services.facebook.unknown_message')) {
                $this->unanswered = true;
                $this->save();
            }
        }
    }

    public function queryTextWithApiai() {

        $client = new Client([
            'base_uri'  => Config::get('services.apiai.base_url'),
            'headers'   => [
                'Authorization' => 'Bearer '.Config::get('services.apiai.client_access_token')
            ]
        ]);

        $query = [
                'sessionId' => $this->session_id,
                'v'         => Config::get('services.apiai.version'),
                'lang'      => 'en'
            ];

        if(!empty($this->text)){            
            $query['query'] = $this->text;            
        }elseif(!empty($this->payload)){
            $query['query'] = $this->payload;   
        }

        $response = $client->request('GET', 'query', [
            'query' => $query
        ]);

        Log::info('========= RawApiaiResponse - START =============');
        Log::info($response->getBody());
        Log::info('========= RawApiaiResponse - END =============');

        return json_decode($response->getBody());
    }

    public function hasResponses() {
        return sizeof($this->facebookResponses) > 0;
    }

    public static function hasMessageText($messaging) {
        return array_key_exists('message', $messaging) && array_key_exists('text', $messaging['message']);
    }

    public static function hasPostbackPayload($messaging) {
        return array_key_exists('postback', $messaging) && array_key_exists('payload', $messaging['postback']);
    }

    public function isGreetingRequest(){
        return !empty($this->payload) && $this->payload === 'GREETING_MESSAGE';
    }

    public function isPostbackRequest(){
        return !empty($this->payload);
    }

    public static function hasDeliveryNotification($messaging) {
        return array_key_exists('delivery', $messaging);
    }

    public static function findByMid($mid) {
        return FacebookRequest::where('mid', '=', $mid)->first();
    }
}
