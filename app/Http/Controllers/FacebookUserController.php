<?php

namespace IndianSuperLeague\Http\Controllers;

use Illuminate\Http\Request;
use IndianSuperLeague\FacebookRequest;
use IndianSuperLeague\FacebookUser;
use Illuminate\Support\Facades\Log;
use DB;

use IndianSuperLeague\Http\Requests;

class FacebookUserController extends Controller
{

    public static function storeFacebookUsers($facebook_requests)
    {

        $facebook_users = collect();

        foreach($facebook_requests as $facebook_request) {
            $facebook_user = FacebookUser::findByUserId($facebook_request->sender_id);
            if(empty($facebook_user)) {
                $user_info = FacebookUser::fetchUser($facebook_request->sender_id);
                $facebook_user = new FacebookUser([
                    'user_id'       => $facebook_request->sender_id,
                    'first_name'    => $user_info->first_name,
                    'last_name'     => $user_info->last_name,
                    'profile_pic'   => $user_info->profile_pic,
                    'timezone'      => $user_info->timezone,
                    'locale'        => $user_info->locale,
                    'gender'        => $user_info->gender
                ]);
                $facebook_user->save();
                $facebook_users->push($facebook_user);
            }   
        }

        return $facebook_users;
    }
}
