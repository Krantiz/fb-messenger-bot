<?php

namespace IndianSuperLeague\Http\Controllers;

use Illuminate\Http\Request;

use IndianSuperLeague\Http\Requests;

use IndianSuperLeague\Team;
use IndianSuperLeague\Player;
use Config;
use IndianSuperLeague\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class ApiaiEntityController extends Controller
{
    public function store(Request $request) {
        
        $entity = $request->entity;
        $entity_data = [];
        $url = Config::get('services.apiai.base_url').'entities';

        switch($entity) {
                    
            case 'Player': {
                $entity = 'player';
                $table_data = Player::where('in_sync', 0)->get();
                $entity_data = self::getValuesAndSynonyms($table_data, 'name');
                break;
            }
			case 'Team': {
                $entity = 'team';
                $table_data = Team::where('in_sync', 0)->get();
                $entity_data = self::getValuesAndSynonyms($table_data, 'name');
                break;
            }
        }
/*
        $entity = 'testentity';
        $url = Config::get('services.apiai.base_url').'entities';
        $table_data = TestEntity::get();
        $entity_data = self::getValuesAndSynonyms($table_data, 'value');*/

        $entity_put_data = [
            'name'      => $entity,
            'entries'   => $entity_data
        ];

        Log::info('=========$entity_put_data=========');
        Log::info($entity_put_data);
        Log::info('=========$entity_put_data=========');

        $status_code = self::putEntities($entity_put_data, $url);

        if ($status_code!=200) {
            $response = [
                'response' => 'Sync unsuccessful.'
            ];
            return $response;
        }

        $response = [
            'response' => 'Sync successful.'
        ];

        
        $table_data->each(function ($item, $key) {
        	Log::info($item);
		    $item->in_sync = 1;
        	$item->update();	// Update Sync Status for Synced Rows
		});

        return $response;
    }

    public static function putEntities($entity_data, $url){
        $client = new Client();
        $response = $client->put($url, [
            'headers'   => [
                'Authorization' => 'Bearer '.Config::get('services.apiai.developer_access_token'),
                'Content-Type'  => 'application/json'
            ],
            'query' => [
                'v'     => Config::get('services.apiai.version'),
            ],

            'json'      => $entity_data
        ]);
        $resp = $response->getBody();
        $resp = json_decode($resp);
        $status_code = $resp->status->code;
        return $status_code;
    }

    public static function getValuesAndSynonyms($table_data, $value_attribute) {
        $entity_data = [];
        foreach ($table_data as $record) {
            $synonyms = [];
            $value = $record[$value_attribute];
            $synonym_string = $record['synonyms'];

            $synonyms_array = explode(',', $synonym_string);
            
            foreach ($synonyms_array as $syn) {
                array_push($synonyms, trim($syn));
            }
            array_push($entity_data, [
                    'value'     => $value,
                    'synonyms'  => $synonyms
                ]);
        }

        return $entity_data;   
    }
}
