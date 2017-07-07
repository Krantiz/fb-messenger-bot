<?php

namespace LodhaStarter\Http\Controllers;

use Illuminate\Http\Request;
use LodhaStarter\Http\Requests;

use LodhaStarter\WitaiResponse;

use DB;

use Log;

class WitaiResponseController extends Controller
{
    public static function storeWitaiResponse($raw_witai_response, $facebook_request)
    {

        $action = null;
        $parameters = null;

        if(property_exists($raw_witai_response, 'entities') && !empty($raw_witai_response->entities)) {   

            $entities = collect($raw_witai_response->entities);

            if(!empty($entities['action'])) {
                $action  = $entities['action'][0]->value;
            }

            $parameters  = $entities->except(['action']);
        }

        $witai_response = new WitaiResponse([ 
                'msg_id'                    => $raw_witai_response->msg_id,
                'facebook_request_id'       => $facebook_request->id, 
                'action'                    => $action,
                'parameters'                => $parameters
            ]);

        $witai_response->save();

        //DynamoDbController::Witai_response($Witai_response);
        Log::info('========= WitaiResponse - START =============');
        Log::info($witai_response);
        Log::info('========= WitaiResponse - END =============');

        return $witai_response;
    }
}
