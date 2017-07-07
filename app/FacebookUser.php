<?php

namespace LodhaStarter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Config;

class FacebookUser extends Model
{
    protected static $client;
    protected $fillable = ['id', 'first_name', 'last_name', 'profile_pic', 'locale', 'timezone', 'gender'];
    protected $table = 'facebook_users';

    public static function init() {
        self::$client = new Client([
            'base_uri'  => 'https://graph.facebook.com/v2.6/',
            'verify'    => env('SSL_VERIFY_FLAG', true)
        ]);
    }

    public function facebookRequests() {    
        return $this->hasMany('LodhaStarter\FacebookRequest', 'facebook_user_id', 'id');
    }

    public static function fetchUser($facebook_user_id) {
        $response = self::$client->request('GET', $facebook_user_id, [
            'query' => [
                'access_token'  => Config::get('services.facebook.page_access_token'),
                'fields'        => 'first_name,last_name,profile_pic,locale,timezone,gender'
            ],
        ]);

        Log::info('========= RawFacebookUser - START =============');
        Log::info($response->getBody());
        Log::info('========= RawFacebookUser - END =============');

        return json_decode($response->getBody());
    }

    public static function findByUserId($facebook_user_id) {
        return FacebookUser::where('id', '=', $facebook_user_id)->first();
    }
}
