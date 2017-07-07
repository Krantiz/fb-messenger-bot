<?php

namespace LodhaStarter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use LodhaStarter\FacebookUser;
use LodhaStarter\LeadGeneration;
use LodhaStarter\ApiaiResponse;
use LodhaStarter\Http\Requests;
use Config;
use DB;
use Carbon\Carbon;

class DataController extends Controller
{
    public static function queryData($query_data, $facebook_request, $payload = null) {

        if(!empty($query_data->action) && !empty($query_data->parameters)){
            $action = $query_data->action;
            $parameters = json_decode($query_data->parameters);
            if(!empty($parameters->team))
                $team = $parameters->team;
        }else if(is_string($query_data) && !empty($query_data)) {
            $parameters = json_decode($query_data);

            if( ! empty($parameters->action))
                $action =  $parameters->action;
            else
                $action = $query_data;
            
        } 

        $data = [
            'texts' => [
                Config::get('services.facebook.unknown_message')
            ]
        ];

        switch($action) {

            case 'lodha.about_customer_contact': {
                $data = [
                    'texts' => [
                        'For Customer Care Call us on: 022 6716 1111'
                    ],
                    'collections' => [
                        [
                            'title'     => 'Head Office',
                            'image_url' => 'https://s3.ap-south-1.amazonaws.com/fcgoa-website/temp/head-office-map.png',
                            'subtitle'  => 'Lodha Excelus, N.M. Joshi Marg, Mahalaxmi, Mumbai - 400 011, India',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'https://goo.gl/maps/7xASTdoEiJ62',
                                    'title' => 'Show on Map'
                                ],
                                [
                                    'type' => 'web_url',
                                    'url' => 'http://skarma.com/',
                                    'title' => 'Visit Website'
                                ]
                            ]
                        ]
                    ]
                ];
                break;
            }

            case 'lodha.about_company': {

                $data = [
                    'texts' => [
                        'Established in 1980, privately held Lodha Group is India\'s No 1 real estate developer and amongst the world\'s select multinational real estate developers with presence in India and the United Kingdom.'
                    ],
                    'collections' => [
                        [
                            'title'     => 'Lodha',
                            'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Lodha---New-LOgo.png',
                            'subtitle'  => 'Building a better life',
                            'buttons' => [
                                [
                                    'type' => 'web_url',
                                    'url' => 'http://www.lodhagroup.com/corporate/careers/why-lodha.php',
                                    'title' => 'Join Us'
                                ],
                                [
                                    'type' => 'web_url',
                                    'url' => 'http://www.lodhagroup.com/',
                                    'title' => 'Visit Website'
                                ]
                            ]
                        ]
                    ]
                ];
                break;
            }

            case 'lodha.about_team': {
                $data = [
                    'collections' => [
                        [
                            'title'     => 'Deepak | Construction Management',
                            'image_url' => 'http://www.lodhagroup.com/corporate/careers/images/insl-deepak.jpg',
                            'subtitle'  => 'It has been a privilege to be associated with an organisation which is growing exceptionally and rewriting the concept of real estate growth in India.',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://www.lodhagroup.com/corporate/careers/inside-lodha.php',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Girish | Marketing',
                            'image_url' => 'http://www.lodhagroup.com/corporate/careers/images/girish.JPG',
                            'subtitle'  => 'Lodha Group offers a dynamic and fast-growth environment, providing immense opportunities to fulfil one’s drive for innovation and passion for excellence. Working in close quarters with the finest talent from premier institutions and diverse industries brings out one’s best. ',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://www.lodhagroup.com/corporate/careers/inside-lodha.php',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Shruti | Strategy',
                            'image_url' => 'http://www.lodhagroup.com/corporate/careers/images/insl-shruti.jpg',
                            'subtitle'  => 'At Lodha, change is the only constant. As part of the Strategy team, we work with functions across the organization to develop transformation strategies, and also support them in the implementation of ‘making the change happen’.',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://www.lodhagroup.com/corporate/careers/inside-lodha.php',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Smita | Design',
                            'image_url' => 'http://www.lodhagroup.com/corporate/careers/images/insl-smita.jpg',
                            'subtitle'  => 'Design Consultancy set-up to a corporate format was a major change, but Lodha Group work environment has made me feel at home. A place where you can put to use your previous knowledge and also learn some more every day.',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://www.lodhagroup.com/corporate/careers/inside-lodha.php',
                                    'title' => 'Read More'
                                ]
                            ]
                        ]
                    ]
                ];
                break;
            }

            case 'lodha.join_company': {
                $data = [
                    'texts' => [
                        'We will work with the best people treat them well, expect a lot and rest will follow',
                        'Our singular vision - \'To Build a Better Life\' is not just for our customers but also for our associates.',
                        'We are always on the lookout for talented professionals to join our team. If you think that you have what it takes to work with us, mail to us at careers@lodhagroup.com.'
                    ],
                    'collections' => [
                        [
                            'title'     => 'Lodha Jobs',
                            'image_url' => 'http://www.lodhagroup.com/contact-us/images/contactus_banner.jpg',
                            'subtitle'  => 'To Build a Better Life',
                            'buttons' => [
                                [
                                    'type' => 'web_url',
                                    'url' => 'https://mail.google.com/mail/?view=cm&fs=1&to=careers@lodhagroup.com&su=Job%20Application%20for%20&body='.htmlspecialchars('please attach your resume with a cover letter in this mail!'),
                                    'title' => 'Apply Now'
                                ],
                                [
                                    'type' => 'web_url',
                                    'url' => 'http://www.lodhagroup.com/corporate/careers/current-opening.php',
                                    'title' => 'Current Openings'
                                ]
                            ]
                        ]
                    ]
                ];
                break;
            }

            case 'lodha.contact_form': {

                $user = FacebookUser::where('id', $facebook_request->facebook_user_id)->first();
                
                $lead = LeadGeneration::where('lead_id', '=', $facebook_request->facebook_user_id)->exists();

                $lead_details = LeadGeneration::where('lead_id', '=', $facebook_request->facebook_user_id)->first();

                if (!empty($lead)) {
                    if(!empty($parameters->type) && !empty($parameters->city)){
                        //Update query
                        LeadGeneration::where('lead_id', '=', $facebook_request->facebook_user_id)
                                        ->update([
                                            'city' => $parameters->city,
                                            'room_type' => $parameters->type
                                            ]);
                        $data = [
                            'texts'  => [
                                "Alright {$user->first_name}, I have noted that down, and forwarded the information to our staff.",
                                "Please expect a call from our representative soon"
                            ]
                        ];              
                    }else if(!empty($parameters->{"phone-number"}) && !empty($lead_details->city) && !empty($lead_details->room_type)) {
                            if (strlen($parameters->{"phone-number"}) === 10) {
                                LeadGeneration::where('lead_id', '=', $facebook_request->facebook_user_id)
                                        ->update([
                                            'contact_number' => $facebook_request->text,
                                            ]);
                                $data = [
                                    'texts'  => [
                                        "Thanks for the info",
                                        "Please expect a call from our representative soon"
                                    ]
                                ];  
                            } else {
                                $data = [
                                    'texts'  => [
                                        "Please enter valid 10-digit mobile number!"
                                    ]
                                ];
                            }
                    } else if(!empty($parameters->city)) {

                        $data = [
                            'quick_replies' => [
                                'text' => 'Ok, great choice! What type of house are looking to buy?',
                                'replies' => [
                                    [
                                        "content_type" => "text",
                                        "title" => "1 BHK",
                                        "payload" => collect(['action' => 'lodha.contact_form', 'type' => '1BHK', 'selected_city' => $parameters->city])->toJson()
                                    ],
                                    [                                
                                        "content_type" => "text",
                                        "title" => "2 BHK",
                                        "payload" => collect(['action' => 'lodha.contact_form', 'type' => '2BHK','selected_city' => $parameters->city])->toJson()
                                    ],
                                    [                                
                                        "content_type" => "text",
                                        "title" => "3 BHK",
                                        "payload" => collect(['action' => 'lodha.contact_form', 'type' => '3BHK', 'selected_city' => $parameters->city])->toJson()
                                    ],
                                    [                                
                                        "content_type" => "text",
                                        "title" => "4 BHK",
                                        "payload" => collect(['action' => 'lodha.contact_form', 'type' => '4BHK', 'selected_city' => $parameters->city])->toJson()
                                    ]
                                ]
                            ]
                        ];
                    } else if(!empty($parameters->type)) {

                        $lead_payload_details = json_decode($facebook_request->payload, true);

                        LeadGeneration::where('lead_id', '=', $facebook_request->facebook_user_id)
                                        ->update([
                                            'city' => $lead_payload_details['selected_city'],
                                            'room_type' => $lead_payload_details['type']
                                            ]);
                        $data = [
                            'texts'  => [
                                "Alright {$user->first_name}, I have noted that down, and forwarded the information to our staff.",
                                "Please expect a call from our representative soon"
                            ]
                        ];
                    } else {

                        $data = [
                            'texts'  => [
                                "Alright, let's begin!!!"
                            ],
                            'quick_replies' => [
                                'text' => 'Please select city for your home',
                                'replies' => Config::get('services.facebook.city_quick_replies')
                            ]
                        ];
                    }
                } else if(!empty($parameters->{"phone-number"})) {

                    if (strlen($parameters->{"phone-number"}) === 10) {

                        if (empty($lead_details->city) && empty($lead_details->room_type)) {
                            
                            $data = [
                                'texts'  => [
                                    "Thank you for that information."
                                ],
                                'quick_replies' => [
                                    'text' => 'Please select city for your home',
                                    'replies' => Config::get('services.facebook.city_quick_replies')
                                ]
                            ];

                            $lead_generation = new LeadGeneration();
                            $lead_generation->lead_id = $facebook_request->facebook_user_id;
                            $lead_generation->contact_number = $parameters->{"phone-number"};
                            $lead_generation->save();
                            
                        } else if(!empty($lead)){
                            $data = [
                                'texts'  => [
                                    "Thank you for that information."
                                ]
                            ];
                        }
                        
                    } else {
                        $data = [
                            'texts'  => [
                                "Please enter valid 10-digit mobile number!"
                            ]
                        ];
                    }
                } else {
                    $data = [
                            'texts'  => [
                                "Hello {$user->first_name}, I am bob.",
                                "Your guide to help you buy your dream home.",
                                "Please provide your phone number to begin."
                            ]
                        ];

                    if(!empty($parameters->type) && !empty($parameters->city)){
                        //INsert query
                        $lead_generation = new LeadGeneration();
                        $lead_generation->lead_id = $facebook_request->facebook_user_id;
                        $lead_generation->city = $parameters->city;
                        $lead_generation->room_type = $parameters->type;
                        $lead_generation->save();

                        $data = [
                            'texts'  => [
                                "I have noted it down, please give your number"
                            ]
                        ];
                    }
                }
                break;
            }

            case 'lodha.user_feedback': {
                if($parameters->feedback == 'Good'){
                    $data = [
                        'texts'  => [
                            "I am glad to know that. Will keep rocking it!! 8-)"
                        ]
                    ];
                }else {
                    $data = [
                        'texts'  => [
                            "I am sorry about that, well I am still learning. 3:)"
                        ]
                    ];
                }
                break;
            }

            case 'lodha.about_mission': {
                
                $data = [
                    'texts'  => [
                        "Our Vision is to build a better life for its customers by leveraging its core strengths - the 5 Ls of Leadership, Luxury, Lifestyle, Location and Legacy - to create landmarks of exemplary quality and design that benchmark the highest standards of international living.",
                        "Our Mission is to treat each customer as if he is the only one you have and Care for him."
                    ]
                ];
                break;
            }

            case 'lodha.smalltalk_about_bot': {
                $data = [
                    'texts'  => [
                        "I'm Bob, Lodha's Private Assistant! 👷"
                    ]
                ];
                break;
            }

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

}