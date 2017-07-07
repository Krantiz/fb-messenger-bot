<?php

namespace LodhaStarter\Http\Controllers;

use Illuminate\Http\Request;
use LodhaStarter\FacebookRequest;
use Illuminate\Support\Facades\Log;
use DB;

use LodhaStarter\Http\Requests;
use Config;
use Ramsey\Uuid\Uuid;

class FacebookRequestController extends Controller
{

    public static function storeFacebookRequests($request)
    {
        $facebook_requests = collect();
        $session_bucket = collect();
        $entry = $request['entry'][0];

        if(!is_null($entry)) {
            foreach ($entry['messaging'] as $messaging) {

                /*
                    Maintain session
                */
                if( ! $session_bucket->has($messaging['sender']['id'])){
                    // Generate a version 5 (name-based and hashed with SHA1) UUID object
                    $uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, $messaging['sender']['id'] . Config::get('services.witai.session_token'));
                    $session_bucket->put($messaging['sender']['id'], $uuid5->toString());
                }

                $session_id = $session_bucket->get($messaging['sender']['id']);

                $facebook_request = new FacebookRequest([
                    'facebook_user_id'  => $messaging['sender']['id'], 
                    'page_id'           => $messaging['recipient']['id'],
                    'session_id'        => $session_id, 
                    'timestamp'         => $messaging['timestamp']
                ]);

                // Check if response was already given for this request
                if(FacebookRequest::isDuplicateRequest($messaging)){
                    continue; 
                }else if(!empty($messaging['message']['mid']) && !empty($messaging['message']['seq'])){
                    $facebook_request->mid = $messaging['message']['mid'];
                    $facebook_request->seq = $messaging['message']['seq'];  
                }else {
                    $facebook_request->mid = Uuid::uuid5(Uuid::NAMESPACE_DNS, mt_rand(1, 2147483647) . Config::get('services.apiai.session_token'))->toString();
                    $facebook_request->seq = -1;
                }

                /*
                    Handle quick replies requests
                */
                if(FacebookRequest::hasQuickReplyPayload($messaging)){
                    $facebook_request->payload = $messaging['message']['quick_reply']['payload'];
                } 
                /*
                    Handle messages with user texts
                */
                else if(FacebookRequest::hasMessageText($messaging)) {
                    $facebook_request->text = $messaging['message']['text']; 
                } 
                /*
                    Handle postback requests
                */
                else if(FacebookRequest::hasPostbackPayload($messaging)){
                    $facebook_request->payload = $messaging['postback']['payload'];
                }
                /*
                    Handle payload Requests [Images, Emoticons, Stickers]
                */
                else if(FacebookRequest::hasAttachmentPayload($messaging)){
                    // TODO :: Handling Emoticons Requests
                    $facebook_request->text = "ATTACHMENT_REQUEST";
                    $facebook_request->attachment_url = $messaging['message']['attachments'][0]['payload']['url'];
                }

                $facebook_request->save();
                $facebook_requests->push($facebook_request);
                // DynamoDbController::facebook_request($facebook_request);
                Log::info('========= FacebookRequest - START =============');
                Log::info($facebook_request);
                Log::info('========= FacebookRequest - END =============');
            }
        }
        return $facebook_requests;
    }
}
