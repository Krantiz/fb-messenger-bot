<?php

namespace LodhaStarter;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Config;
use Log;
use DB;

use Snipe\BanBuilder\CensorWords;

class FacebookRequest extends Model
{
    protected static $client;
	protected $fillable = ['facebook_user_id', 'timestamp', 'text', 'page_id', 'mid', 'seq', 'session_id', 'unanswered'];
    protected $table = 'facebook_requests';

    public static function init() {
        self::$client = new Client([
            'base_uri'  => 'https://graph.facebook.com/v2.6/',
            'verify' => env('SSL_VERIFY_FLAG', true)
        ]);
    }

    public function facebookResponses() {    
        return $this->hasMany('LodhaStarter\FacebookResponse', 'facebook_request_id', 'id');
    }

    public function facebookUser() {    
        return $this->belongsTo('LodhaStarter\FacebookUser', 'facebook_user_id', 'id');
    }

    public function acknowledgeRequestReceipt() {

        self::$client->request('POST', 'me/messages', [
            'query' => [
                'access_token' => Config::get('services.facebook.page_access_token')
            ],
            'json' => [
                'recipient' => [
                    'id' => $this->facebook_user_id
                ],
                'sender_action' => "typing_on"
            ]
        ]);
    }

    public function acknowledgeRequestCompletion() {

        self::$client->request('POST', 'me/messages', [
            'query' => [
                'access_token' => Config::get('services.facebook.page_access_token')
            ],
            'json' => [
                'recipient' => [
                    'id' => $this->facebook_user_id
                ],
                'sender_action' => "typing_off"
            ]
        ]);
    }

    public function queryTextWithWitai() {

        $client = new Client([
            'base_uri'      => Config::get('services.witai.base_url'),
            'headers'       => [
                'Authorization' => 'Bearer '.Config::get('services.witai.server_access_token')
            ],
            'verify'        => env('SSL_VERIFY_FLAG', true),
            'http_errors'   => env('HTTP_ERRORS_FLAG', false)
        ]);

        $response = $client->request('GET', 'message', [
            'query' => [
                'v'             => Config::get('services.witai.version'),
                'session_id'    => $this->session_id,
                'q'             => htmlentities($this->text, ENT_QUOTES),
                'access_token'  => Config::get('services.witai.server_access_token')
            ]
        ]);

        if ($response->getStatusCode() != 200) {
            Log::info('========= WIT AI FAILED TO PROCESS REQUEST =============');
            Log::info('ERROR CODE :: '.$response->getStatusCode());
            return null;
        }

        Log::info('========= RawWitaiResponse - START =============');
        Log::info($response->getBody());
        Log::info('========= RawWitaiResponse - END =============');
 
        return json_decode($response->getBody());
    }

    public function queryTextWithApiai() {

        $client = new Client([
            'base_uri'      => Config::get('services.apiai.base_url'),
            'headers'       => [
                'Authorization' => 'Bearer '.Config::get('services.apiai.client_access_token')
            ],
            'verify'        => env('SSL_VERIFY_FLAG', true),
            'http_errors'   => env('HTTP_ERRORS_FLAG', false)
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

        if ($response->getStatusCode() != 200) {
            Log::info('========= API AI FAILED TO PROCESS REQUEST =============');
            Log::info('ERROR CODE :: '.$response->getStatusCode());
            return null;
        }

        Log::info('========= RawApiaiResponse - START FBR =============');
        Log::info($response->getBody());
        Log::info('========= RawApiaiResponse - END  FBR=============');
 
        return json_decode($response->getBody());
    }

    public function hasResponses() {
        return sizeof($this->facebookResponses) > 0;
    }

    public static function isDuplicateRequest($messaging){
        return array_key_exists('message', $messaging) && !empty(FacebookRequest::findByMid($messaging['message']['mid']));
    }

    public static function hasMessageText($messaging) {
        return array_key_exists('message', $messaging) && array_key_exists('text', $messaging['message']);
    }

    public static function hasPostbackPayload($messaging) {
        return array_key_exists('postback', $messaging) && array_key_exists('payload', $messaging['postback']);
    }

    public static function hasQuickReplyPayload($messaging) {
        return array_key_exists('message', $messaging) && array_key_exists('quick_reply', $messaging['message']);
    }

    public static function hasAttachmentPayload($messaging){
        return array_key_exists('message', $messaging) && array_key_exists('attachments', $messaging['message']);
    }

    public function isGreetingRequest(){
        return !empty($this->payload) && $this->payload === 'GREETING_MESSAGE';
    }

    public function isPostbackRequest(){
        return !empty($this->payload);
    }

    public function isabusiveRequest(){
        return !empty($this->text) && $this->abusive($this->text);
    }

    public function isAttachmentRequest(){
        return !empty($this->text) && $this->text === 'ATTACHMENT_REQUEST';
    }

    public static function hasDeliveryNotification($messaging) {
        return array_key_exists('delivery', $messaging);
    }

    public static function findByMid($mid) {
        return FacebookRequest::where('mid', '=', $mid)->first();
    }

    /*
    * Class Required (specific) Methods
    */

    // Check if message contains abusive words
    private function abusive($message){

        $censor = new CensorWords;
        $langs = array('en-us', public_path('profanity-filter/hindi.php'), public_path('profanity-filter/konkani.php'), public_path('profanity-filter/pessimistic.php'), public_path('profanity-filter/removeEntries.php'));
        $badwords = $censor->setDictionary($langs);
        $processed_message = $censor->censorString($message);

        if(substr_count($processed_message['clean'], '*') > 2)
            return true;

        return false;
    }
}
