<?php

namespace LodhaStarter\Http\Controllers;

use Illuminate\Http\Request;

use LodhaStarter\Http\Requests;

use LodhaStarter\Http\Controllers\FacebookRequestController;
use LodhaStarter\Http\Controllers\FacebookResponseController;
use LodhaStarter\Http\Controllers\FacebookUserController;
use LodhaStarter\Http\Controllers\WitaiResponseController;

use LodhaStarter\EnvironmentProperty;
use LodhaStarter\FacebookRequest;
use LodhaStarter\FacebookUser;
use LodhaStarter\FacebookResponse;

use Illuminate\Support\Facades\Input;
use Config;
use Log;

class WebhookController extends Controller
{
    public function index()
    {   
        $inputs = Input::all();

        Log::info($inputs);
        
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

        FacebookUserController::storeFacebookUsers($request);
        
        // Save all facebook requests
        $facebook_requests = FacebookRequestController::storeFacebookRequests($request);

        /*
            Process individual facebook requests to determine what the response should be
        */
        foreach($facebook_requests as $facebook_request) {

            // Send typing response status
            $facebook_request->acknowledgeRequestReceipt();

            if(EnvironmentProperty::inMaintainance()) {  /* Are we Under Maintainance */

                $facebook_response = new FacebookResponse([
                    'facebook_request_id'   => $facebook_request->id,
                    'text'                  => Config::get('services.facebook.maintainance_message')
                ]);

                $facebook_responses->push($facebook_response);

            }else if($facebook_request->isabusiveRequest()) {   /* Make sure the message is safe to answer */

                $facebook_response = new FacebookResponse([
                    'facebook_request_id'   => $facebook_request->id,
                    'text'                  => Config::get('services.facebook.abusive_message')
                ]);

                $facebook_responses->push($facebook_response);

            }else if($facebook_request->isGreetingRequest()) {  /* Check if it's a new page visitor request */

                $user = FacebookUser::where('id', $facebook_request->facebook_user_id)->first();

                $facebook_response = new FacebookResponse([
                    'facebook_request_id'   => $facebook_request->id,
                    'text'                  => "Hello {$user->first_name}, I am Bob. An agent that will be helping you find your dream home :)."
                ]);
                $facebook_responses->push($facebook_response);

                if(FacebookResponse::eligibleForQuickReplies($facebook_response, null)) {
                    $facebook_responses->push(FacebookResponse::genericQuickReplies($facebook_request->id));
                }

            } else if($facebook_request->isPostbackRequest()) { /* Custom Request, needs to be handled without NLP */

                Log::info('========= POSTBACK REQUEST =============');

                $data = DataController::queryData($facebook_request->payload, $facebook_request);
                foreach(FacebookResponse::processData($data, $facebook_request, false) as $facebook_response) {
                    $facebook_responses->push($facebook_response);
                }

                if(FacebookResponse::eligibleForQuickReplies($facebook_response, $facebook_request->payload)) {
                    $facebook_responses->push(FacebookResponse::genericQuickReplies($facebook_request->id));
                }

            } else if($facebook_request->isAttachmentRequest()) {

                /* Reply with this message for attachments i.e images, audio, video, etc */

                if($facebook_request->attachment_url == 'https://scontent.xx.fbcdn.net/t39.1997-6/851557_369239266556155_759568595_n.png?_nc_ad=z-m') {
                    $facebook_response = new FacebookResponse([
                        'facebook_request_id'   => $facebook_request->id,
                        'text'                  => '(y)'
                    ]);
                }else{
                    $facebook_response = new FacebookResponse([
                        'facebook_request_id'   => $facebook_request->id,
                        'text'                  => "Comeon, you really want me to understand that!! I am bot, remember?"
                    ]);
                }

                $facebook_responses->push($facebook_response);

                if(FacebookResponse::eligibleForQuickReplies($facebook_response, null)) {
                    $facebook_responses->push(FacebookResponse::genericQuickReplies($facebook_request->id));
                }
                
            }else {    /* Let's ask NLP to help us find a solution to this query message */

                // NLP + ML on facebook request  
                $raw_apiai_response = $facebook_request->queryTextWithApiai();
                $apiai_response = ApiaiResponseController::storeApiaiResponse($raw_apiai_response, $facebook_request);

                if($apiai_response->hasAction()) {

                    // Thank you NLP for helping us understand that request, we will take it from here.
                    // If action is defined with custom namespace, that signifies we need to pass control to DataController

                    Log::info('========= Custom action namespace =============');
                    $data = DataController::queryData($apiai_response, $facebook_request);
                    foreach(FacebookResponse::processData($data, $facebook_request, false) as $facebook_response) {
                        $facebook_responses->push($facebook_response);
                    } 

                }else {    

                    // We don't have any response available, let's apologize 
                    Log::info('========= No match =============');
                    $facebook_response = new FacebookResponse([
                        'facebook_request_id'   => $facebook_request->id,
                        'text'                  => Config::get('services.facebook.failed_message')
                    ]);
                    $facebook_responses->push($facebook_response);
                }

                if(FacebookResponse::eligibleForQuickReplies($facebook_response, $apiai_response->action)) {
                    $facebook_responses->push(FacebookResponse::genericQuickReplies($facebook_request->id));
                }
            }

            // Remove typing response status
            $facebook_request->acknowledgeRequestCompletion();
        }

        /*
            Process responses gathered
        */
        foreach($facebook_responses as $facebook_response) {
            $facebook_response->sendFacebookMessage();
        }
        
        // DynamoDbController::logToDb($facebook_responses);
        FacebookResponseController::storeFacebookResponses($facebook_responses);
        FacebookResponseController::checkIfUnanswered($facebook_responses);
    }
}
