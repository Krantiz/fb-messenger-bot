<?php

namespace IndianSuperLeague\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use IndianSuperLeague\Team;
use IndianSuperLeague\Player;

use IndianSuperLeague\Http\Requests;
use Config;

class DataController extends Controller
{
    public static function queryData($query_data, $facebook_request, $payload = null) {

        $team = 'FC Goa';

        if(is_string($query_data)) {
            $action = $query_data;
        } else {
            $action = $query_data->action;
    	    $parameters = json_decode($query_data->parameters);
            $team = $parameters->team;
        }

        $data = [
            'texts' => [
                Config::get('services.facebook.unknown_message')
            ]
        ];

        switch($action) {
            // case 'indiansuperleague.about_team': {
            //     $team = self::getTeamData($team);
            //     if(!empty($team['about'])) {
            //         $data = [
            //             'texts' => [
            //                 $team['about']
            //             ]
            //         ];
            //     }
            //     if(!empty($team['photos']) && !empty($team['url'])) {
            //         $data = array_merge($data, [
            //             'textWithLinks' => [
            //                 'text' => 'How about you check below links?',
            //                 'buttons' => [
            //                     [
            //                         'type' => 'web_url',
            //                         'url' => $team['photos'],
            //                         'title' => 'Check photos'
            //                     ],
            //                     [
            //                         'type' => 'web_url',
            //                         'url' => $team['url'],
            //                         'title' => 'Official site'
            //                     ]
            //                 ]
            //             ]
            //         ]);
            //     }
            //     break;
            // }
            
            // case 'indiansuperleague.about_owner': {
            //     $team = self::getTeamData($team);
            //     if(!empty($team['owner'])) {
            //         if(empty($team['url'])) {
            //             $data = [
            //                 'texts' => [
            //                     $team['owner']
            //                 ]
            //             ];
            //         } else {
            //             $data = [
            //                 'textWithLinks'  => [
            //                     'text'      => $team['owner'],
            //                     'buttons'   => [
            //                         [
            //                             'type'  => 'web_url',
            //                             'url'   => $team['url'],
            //                             'title' => 'Know More'
            //                         ]
            //                     ]
            //                 ]
            //             ];
            //         }
            //     }
            //     break;
            // }

            // case 'indiansuperleague.brand_ambassador': {
            //     $team = self::getTeamData($team);
            //     if(!empty($team['brand_ambassador'])) {
            //         if(empty($team['url'])) {
            //             $data = [
            //                 'texts' => [
            //                     $team['brand_ambassador']
            //                 ]
            //             ];
            //         } else {
            //             $data = [
            //                 'textWithLinks'  => [
            //                     'text'      => $team['brand_ambassador'],
            //                     'buttons'   => [
            //                         [
            //                             'type'  => 'web_url',
            //                             'url'   => $team['url'],
            //                             'title' => 'Know More'
            //                         ]
            //                     ]
            //                 ]
            //             ];
            //         }
            //     }
            //     break;
            // }


            // case 'indiansuperleague.about_manager': {
            //     $team = self::getTeamData($team);
            //     if(!empty($team['manager'])) {
            //         if(empty($team['url'])) {
            //             $data = [
            //                 'texts' => [
            //                     $team['manager']
            //                 ]
            //             ];
            //         } else {
            //             $data = [
            //                 'textWithLinks'  => [
            //                     'text'      => $team['manager'],
            //                     'buttons'   => [
            //                         [
            //                             'type'  => 'web_url',
            //                             'url'   => $team['url'],
            //                             'title' => 'Know More'
            //                         ]
            //                     ]
            //                 ]
            //             ];
            //         }
            //     }
            //     break;
            // }

            // case 'indiansuperleague.about_mascot': {
            //     $team = self::getTeamData($team);
            //     if(!empty($team['mascot'])) {
            //         $team_mascot = 'This club does not have a mascot at the moment.';
            //         $data = [
            //             'texts'  => [
            //                 $team['mascot']
            //             ]
            //         ];
            //     } else if(!empty($team['url'])) {
            //         $data = [
            //             'textWithLinks'  => [
            //                 'text'      => $team['name'],
            //                 'buttons'   => [
            //                     [
            //                         'type'  => 'web_url',
            //                         'url'   => $team['url'],
            //                         'title' => 'Know More'
            //                     ]
            //                 ]
            //             ]
            //         ];
            //     }
            //     break;
            // }

            // case 'indiansuperleague.team_pictures': {
            //     $team = $team = self::getTeamData($team);
            //     $data = [
            //         'textWithLinks'  => [
            //             'text'      => 'You can check out team pictures on the following link! ',
            //             'buttons'   => [
            //                 [
            //                     'type'  => 'web_url',
            //                     'url'   => $team['photos'],
            //                     'title' => 'See Pictures'
            //                 ]
            //             ]
            //         ]
            //     ];
            //     break;
            // }

            // case 'indiansuperleague.player_bio': {
            //     if(!empty($parameters->player)) {
            //         $player = Player::where('name', 'like', '%' .$parameters->player. '%')->first();
            //         $data = [
            //             'collections' => [
            //                 'title'     => $player['name'],
            //                 'image_url' => $player['player_picture'],
            //                 'subtitle'  => $player['position'],
            //                 'buttons'   => [
            //                     [
            //                         'type'  => 'web_url',
            //                         'url'   => $player['url'],
            //                         'title' => 'Know more'
            //                     ]
            //                 ]
            //             ],
            //             'texts' => [
            //                 $player['about']
            //             ]
            //         ];
            //         Log::info('========= Response Package =============');
            //         Log::info($data);
            //         break; 
            //     }
            // }

            // case 'indiansuperleague.player_position': {
                
            //     if(!empty($team) && !empty($parameters->position)) {
            //         $team = self::getTeamData($team);
            //         $player = Player::where('team_id', $team['id'])
            //                         ->where('position', $parameters->position)
            //                         ->first();

            //         $description = $player['name'].' is a '.$player['position'].' for '.$team['name'];

            //         $data = [
            //             'textWithLinks'  => [
            //                 'text'      => $description,
            //                 'buttons'   => [
            //                     [
            //                         'type'  => 'web_url',
            //                         'url'   => $player['url'],
            //                         'title' => 'See Pictures'
            //                     ]
            //                 ]
            //             ]
            //         ];
            //     } else if(!empty($parameters->player)) {
            //         $player = Player::where('name', $parameters->player)->first();
            //         $team = Team::where('id', $player['team_id'])->first();
            //         $description = $player['name'].' is a '.$player['position'].' for '.$team['name'];
            //         $data = [
            //             'textWithLinks'  => [
            //                 'text'      => $description,
            //                 'buttons'   => [
            //                     [
            //                         'type'  => 'web_url',
            //                         'url'   => $player['url'],
            //                         'title' => 'Know more'
            //                     ]
            //                 ]
            //             ]
            //         ];
            //     } 
            //     break;
            // }

            // case 'indiansuperleague.team_squad': {
            //     if(!empty($team)){
            //         $team = self::getTeamData($team);
            //         $players = Player::where('team_id', '=', $team->id)->get();
            //         $collections = [];

            //         foreach($players as $player) {
            //             array_push($collections, [
            //                 'title'     => $player['name'],
            //                 'image_url' => $player['player_picture'],
            //                 'subtitle'  => $player['position'],
            //                 'buttons'   => [
            //                     [
            //                         'type'  => 'web_url',
            //                         'url'   => $player['url'],
            //                         'title' => 'Know more'
            //                     ]
            //                 ]
            //             ]);
            //         }
            //         if(sizeof($players) > 0) {
            //             $data = [
            //                 'collections' => $collections
            //             ];
            //         }
            //     }
            //     break;
            // }

            // case 'indiansuperleague.about_captain': {
            //     if(!empty($team)){
            //         $team = self::getTeamData($team);
            //         $player = Player::where('id', $team['captain_id'])->first();
            //         $description = $player['name']."\n\n".$player['about'];
            //         $data = [
            //             'collections' => [
            //                 [
            //                     'title'     => $player['name'],
            //                     'image_url' => $player['player_picture'],
            //                     'subtitle'  => $description
            //                 ]
            //             ]
            //         ];
            //     }
            //     break;
            // }

            // case 'indiansuperleague.about_nationality': {
            //     if(!empty($parameters->name)) {
            //         $player = Player::where('name', $parameters->name)->first();
            //         $description = $player['name'].'is of '.$player['nationality'].' origin.';
            //         $data = [
            //             'collections' => [
            //                 [
            //                     'title'     => $player['name'],
            //                     'image_url' => $player['player_picture'],
            //                     'subtitle'  => $description
            //                 ]
            //             ]
            //         ];
            //     }
            //     break;
            // }

            // case 'indiansuperleague.subscribe_news': {
            //     // TODO : Remember that user has subscribed for news
            //     $data = [
            //         'texts' => [
            //             'You have successfully subscribed to FC Goa news. We will keep you posted on latest updates. :)'
            //         ]
            //     ];
            //     break;
            // }

            // case 'indiansuperleague.unsubscribe_news': {
            //     // TODO : Remember that user has unsubscribed for news
            //     $data = [
            //         'texts' => [
            //             'You have successfully unsubscribed to FC Goa news. We are sad to see you go. :('
            //         ]
            //     ];
            //     break;
            // }

            // case 'indiansuperleague.buy_merchandise': {
            //     // TODO : Remember that user has unsubscribed for news
            //     $data = [
            //         'texts' => [
            //             'You can purchase amazing merchandise here : http://www.fcgoa.in/shop.php'
            //         ]
            //     ];
            //     break;
            // }

            // case 'indiansuperleague.buy_tickets': {
            //     // TODO : Remember that user has unsubscribed for news
            //     $data = [
            //         'texts' => [
            //             'You can purchase ISL tickets here : https://in.bookmyshow.com/sports/indian-super-league'
            //         ]
            //     ];
            //     break;
            // }

            default : {
                if(!empty($query_data->fulfillment)) {
                    $apiai_default_response = json_decode($query_data->fulfillment, true);
                    $data = [
                        'texts'  => [
                            $apiai_default_response['speech']
                        ]
                    ];
                }
            }

        }
    	return $data;
    }

    public static function getTeamData($name) {
        return Team::where('name', $name)->first();
    }
}
