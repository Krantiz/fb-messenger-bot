<?php

namespace LodhaStarter\Http\Controllers;

use Illuminate\Http\Request;
use LodhaStarter\FacebookRequest;
use Illuminate\Support\Facades\Log;
use DB;

use LodhaStarter\Http\Requests;

class FacebookResponseController extends Controller
{

    public static function storeFacebookResponses($facebook_responses)
    {
        foreach($facebook_responses as $facebook_response) {
            if(is_array($facebook_response->collections)) {
                $facebook_response->collections = json_encode($facebook_response->collections);
            }

            if(is_array($facebook_response->quick_replies)) {
                $facebook_response->quick_replies = json_encode($facebook_response->quick_replies);
            }

            if(is_array($facebook_response->buttons)) {
                $facebook_response->buttons = json_encode($facebook_response->buttons); 
            }

            $facebook_response->save();
        }

        return $facebook_responses;
    }

    public static function checkIfUnanswered($facebook_responses)
    {
        foreach($facebook_responses as $facebook_response) {
            // Register Unanswered Requests, by looking at the response.
            if(!empty($facebook_response->text) && ($facebook_response->text == \Config::get('services.facebook.failed_message') || $facebook_response->text == \Config::get('services.facebook.unknown_message'))){
                $request = $facebook_response->facebookRequest;
                $request->unanswered = true;
                $request->save();
            }
        }
    }
}
