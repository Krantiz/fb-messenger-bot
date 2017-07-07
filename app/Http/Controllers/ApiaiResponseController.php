<?php

namespace LodhaStarter\Http\Controllers;

use Illuminate\Http\Request;
use LodhaStarter\ApiaiResponse;
use Illuminate\Support\Facades\Log;
use DB;
use LodhaStarter\Http\Controllers\DynamoDbController;
use LodhaStarter\Http\Requests;

class ApiaiResponseController extends Controller
{
    public static function storeApiaiResponse($raw_apiai_response, $facebook_request)
    {

        $action = null;
        $action_incomplete = null;
        $parameters = null;
        $fulfillment = null;
        $intent_name = null;

        if(!empty($raw_apiai_response) && property_exists($raw_apiai_response, 'result')) {

            $result = $raw_apiai_response->result;

            if(property_exists($result, 'action')) {
                $action = $result->action;   
            }

            if(property_exists($result, 'actionIncomplete')) {
                $action_incomplete  = $result->actionIncomplete;   
            }

            if(property_exists($result, 'parameters')) {
                $parameters  = json_encode($result->parameters);   
            }

            if(property_exists($result, 'fulfillment')) {
                $fulfillment  = json_encode($result->fulfillment);   
            }

            if(property_exists($result, 'metadata') && property_exists($result->metadata, 'intentName')) {
                $intent_name  = $result->metadata->intentName;   
            }

            
        }else {
            $fulfillment  = "Pardon me, what was that again?";
        }

        $apiai_response = new ApiaiResponse([ 
                'facebook_request_id'       => $facebook_request->id, 
                'action'                    => $action, 
                'action_incomplete'         => $action_incomplete,
                'parameters'                => $parameters,
                'fulfillment'               => $fulfillment,
                'intent_name'               => $intent_name
            ]);

        $apiai_response->save();

        //DynamoDbController::apiai_response($apiai_response);
        Log::info('========= ApiaiResponse - START =============');
        Log::info($apiai_response);
        Log::info('========= ApiaiResponse - END =============');

        return $apiai_response;
    }
}
