<?php

namespace LodhaStarter\Http\Controllers;

use Illuminate\Http\Request;
use LodhaStarter\FacebookRequest;
use LodhaStarter\FacebookUser;
use Illuminate\Support\Facades\Log;
use DB;

use LodhaStarter\Http\Requests;

class FacebookUserController extends Controller
{

    public static function storeFacebookUsers($request)
    {

        $facebook_users = collect();
        $entry = $request['entry'][0];

        if(!is_null($entry)) {
            foreach ($entry['messaging'] as $messaging) {

                $facebook_user = FacebookUser::findByUserId($messaging['sender']['id']);
                
                if(empty($facebook_user)) {
                    $user_info = FacebookUser::fetchUser($messaging['sender']['id']);
                    $facebook_user = new FacebookUser([
                        'id'            => $messaging['sender']['id'],
                        'first_name'    => $user_info->first_name,
                        'last_name'     => $user_info->last_name,
                        'profile_pic'   => $user_info->profile_pic,
                        'timezone'      => $user_info->timezone,
                        'locale'        => $user_info->locale
                    ]);
                    if(!empty($user_info->gender)) {
                        $facebook_user->gender = $user_info->gender;
                    }else {
                        $facebook_user->gender = 'unavailable';
                    }
                    \Log::info($facebook_user);
                    $facebook_user->save();
                    $facebook_users->push($facebook_user);
                }
            }
        }

        return $facebook_users;
    }
}
