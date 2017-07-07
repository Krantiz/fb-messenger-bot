<?php

namespace IndianSuperLeague\Http\Controllers;

use Illuminate\Http\Request;

use IndianSuperLeague\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Response;
use IndianSuperLeague\Http\Controllers\FacebookRequestController;
use IndianSuperLeague\Http\Controllers\FacebookResponseController;
use IndianSuperLeague\Http\Controllers\FacebookUserController;
use IndianSuperLeague\Http\Controllers\ApiaiResponseController;
use IndianSuperLeague\Http\Controllers\DataController;
use IndianSuperLeague\FacebookRequest;
use IndianSuperLeague\FacebookUser;
use IndianSuperLeague\FacebookResponse;
use Config;

class WebhookController extends Controller
{
    public function index()
    {
        $inputs = Input::all();

        if(empty($inputs['hub_verify_token'])){
            echo "You are not supposed to be here, only facebook allowed";
            return;
        }
        
        $verify_token = $inputs['hub_verify_token'];

        if(!is_null($verify_token) && $verify_token === Config::get('services.facebook.verify_token')) {
            echo $inputs['hub_challenge'];
        }
    }

    public function store(Request $request)
    {   
        FacebookUser::init();
        FacebookRequest::init();
        FacebookResponse::init();
        $facebook_responses = collect();

        Log::info('========= RawFacebookRequest - START =============');
        Log::info($request);
        Log::info('========= RawFacebookRequest - END =============');

        // Save all facebook requests
        $facebook_requests = FacebookRequestController::storeFacebookRequests($request);

        /*
            Process individual facebook requests to determine what the response should be
        */
        foreach($facebook_requests as $facebook_request) {

            // Respond with a message received/processing request status
            $facebook_request->acknowledgeRequestReceipt();

            if($facebook_request->isGreetingRequest()) {

                $facebook_response = new FacebookResponse([
                    'facebook_request_id'   => $facebook_request->id,
                    'collections'           => Config::get('services.facebook.greeting_elements')
                ]);
                $facebook_responses->push($facebook_response);

            } else if($facebook_request->isPostbackRequest()) {

                $data = DataController::queryData($facebook_request->payload, $facebook_request);
                foreach(FacebookResponse::processData($data, $facebook_request, false) as $facebook_response) {
                    $facebook_responses->push($facebook_response);
                }

            } else {

                // NLP + ML on facebook request  
                $raw_apiai_response = $facebook_request->queryTextWithApiai();
                $apiai_response = ApiaiResponseController::storeApiaiResponse($raw_apiai_response, $facebook_request);

                if($apiai_response->hasAction() && $apiai_response->hasCustomActionNamespace()) {

                    // If action is defined with custom namespace, that signifies we need to pass control to DataController

                    Log::info('========= Custom action namespace =============');
                    $data = DataController::queryData($apiai_response, $facebook_request);
                    foreach(FacebookResponse::processData($data, $facebook_request, false) as $facebook_response) {
                        $facebook_responses->push($facebook_response);
                    } 

                } else if ($apiai_response->hasFulfillment()) {    

                    // If custom namespace is absent, we should have an answer from one of the custom domains enabled OR we may have defined it ourselves

                    Log::info('========= Domain namespace =============');
                    $fulfillment = json_decode($apiai_response->fulfillment);
                    foreach(FacebookResponse::processData($fulfillment, $facebook_request, true) as $facebook_response) {
                        $facebook_responses->push($facebook_response);
                    }

                } else {    // We don't have any response available, let's apologize 
                    
                    Log::info('========= No match =============');
                    $facebook_response = new FacebookResponse([
                        'facebook_request_id'   => $facebook_request->id,
                        'text'                  => Config::get('services.facebook.failed_message')
                    ]);
                    $facebook_responses->push($facebook_response);
                }

            }

            $facebook_request->checkIfUnanswered();
            $facebook_request->acknowledgeRequestCompletion();
        }

        /*
            Process responses gathered
        */
        foreach($facebook_responses as $facebook_response) {
            $facebook_response->sendFacebookMessage();
        }

        FacebookResponseController::storeFacebookResponses($facebook_responses);
        FacebookUserController::storeFacebookUsers($facebook_requests);
    }
}
