<?php

namespace IndianSuperLeague;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Config;

class FacebookUser extends Model
{
    protected static $client;
    protected $fillable = ['first_name', 'last_name', 'profile_pic', 'locale', 'timezone', 'gender', 'user_id'];
    protected $table = 'facebook_users';

    public static function init() {
        self::$client = new Client([
            'base_uri'  => 'https://graph.facebook.com/v2.6/'
        ]);
    }

    public function facebookRequests() {    
        return $this->hasMany('IndianSuperLeague\FacebookRequest', 'sender_id', 'user_id');
    }

    public static function fetchUser($user_id) {
        $response = self::$client->request('GET', $user_id, [
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

    public static function findByUserId($user_id) {
        return FacebookUser::where('user_id', '=', $user_id)->first();
    }
}
