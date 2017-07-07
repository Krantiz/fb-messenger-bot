<?php

namespace IndianSuperLeague\Http\Controllers;

use Illuminate\Http\Request;
use IndianSuperLeague\FacebookRequest;
use Illuminate\Support\Facades\Log;
use DB;

use IndianSuperLeague\Http\Requests;
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
                    $uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, $messaging['sender']['id'] . Config::get('services.apiai.session_token'));
                    $session_bucket->put($messaging['sender']['id'], $uuid5->toString());
                    Log::info('========= SESSION ID NOT FOUND -- GENERATING ONE =============');
                }

                $session_id = $session_bucket->get($messaging['sender']['id']);

                Log::info('========= SESSION ID =============');
                Log::info($session_id);

                $facebook_request = new FacebookRequest([
                    'sender_id'     => $messaging['sender']['id'], 
                    'page_id'       => $messaging['recipient']['id'],
                    'session_id'    => $session_id, 
                    'timestamp'     => $messaging['timestamp']
                ]);

                /*
                    Handle messages with user texts
                */
                if(FacebookRequest::hasMessageText($messaging)) {

                    $existing_request = FacebookRequest::findByMid($messaging['message']['mid']);

                    // Check if response was already given for this request
                    if(!empty($existing_request)) {
                        /*if($existing_request->is_processed) {
                            Log::info('========= Already Processed Request =============');
                            continue; // We don't want to process requests we already replied to
                        }*/
                        continue;
                        // $facebook_request = $existing_request;             
                    } else {                            
                        $facebook_request->text = $messaging['message']['text'];
                        $facebook_request->mid = $messaging['message']['mid'];
                        $facebook_request->seq = $messaging['message']['seq'];
                    } 
                } 
                /*
                    Handle postback requests
                */
                else if(FacebookRequest::hasPostbackPayload($messaging)){
                    $facebook_request->payload = $messaging['postback']['payload'];
                }

                $facebook_request->save();
                $facebook_requests->push($facebook_request);

                Log::info('========= FacebookRequest - START =============');
                Log::info($facebook_request);
                Log::info('========= FacebookRequest - END =============');
            }
        }
        return $facebook_requests;
    }
}
