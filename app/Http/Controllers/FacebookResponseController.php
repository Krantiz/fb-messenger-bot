<?php

namespace IndianSuperLeague\Http\Controllers;

use Illuminate\Http\Request;
use IndianSuperLeague\FacebookRequest;
use Illuminate\Support\Facades\Log;
use DB;

use IndianSuperLeague\Http\Requests;

class FacebookResponseController extends Controller
{

    public static function storeFacebookResponses($facebook_responses)
    {
        foreach($facebook_responses as $facebook_response) {
            if(is_array($facebook_response->collections)) {
                $facebook_response->collections = json_encode($facebook_response->collections);
            }

            if(is_array($facebook_response->buttons)) {
                $facebook_response->buttons = json_encode($facebook_response->buttons); 
            }

            $facebook_response->save();
        }

        return $facebook_responses;
    }
}
