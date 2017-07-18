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
            // Log::info('-----test-----1');
            // $decoded_traces=json_decode($parameters, true);
            // Log::info($query_data->parameters->GPIT);
            Log::info($action);
        }else if(is_string($query_data) && !empty($query_data)) {
            $parameters = json_decode($query_data);

            if( ! empty($parameters->action))
                $action =  $parameters->action;
            else
                $action = $query_data;
            // Log::info('-----test-----2');
            // Log::info($parameters);
            Log::info($action);
        } 

        $data = [
            'texts' => [
                Config::get('services.facebook.unknown_message')
            ]
        ];

        switch($action) {

            case 'gpit.contactus': {
                $data = [
                    'collections' => [
                        [
                            'title'     => 'Head Office',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2016/11/logo.png',
                            'subtitle'  => '209, The Empire Business Center, Lower Parel, Mumbai, INDIA',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'https://goo.gl/maps/z3y9G5rLkHr',
                                    'title' => 'Show on Map'
                                ],
                                [
                                    'type' => 'web_url',
                                    'url' => 'http://newwww.greatplaceitservices.com/',
                                    'title' => 'Visit Website'
                                ]
                            ]
                        ]
                    ]
                ];
                break;
            }

            case 'gpit.about': {

                $data = [
                    'texts' => [
                        'Great Place IT Services specializes in creating world-class employee diagnostic tools that empowers organizations to capture employee perceptions about the organization or the individuals within organization.'
                    ],
                    'collections' => [
                        [
                            'title'     => 'Great Place IT Services',
                            'image_url' => 'http://www.judycehmm.com/wp-content/uploads/2015/10/dummy-image-rectangle-1600x1200px.jpg',
                            'subtitle'  => 'About Great Place IT Services',
                            'buttons' => [
                                [
                                    'type' => 'web_url',
                                    'url' => 'http://www.lodhagroup.com/',
                                    'title' => 'Visit Website'
                                ]
                            ]
                        ]
                    ],
                    'quick_replies' => [
                        'text' => 'Click below to know our Vision and Mission',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "Vision and Mission",
                                "payload" => collect(['action' => 'gpit.visionmission', 'type' => 'VisionMission'])->toJson()
                            ]
                        ]
                    ]
                ];
                break;
            }

            case 'gpit.visionmission': {

                $data = [
                    'texts' => [
                        'Vision : To create great employee experiences through technology and our understanding of best workplaces.',
                        'Mission : Leverage technology to generate contextual and on-demand insights.'
                    ]
                ];
                break;
            }

            case 'gpit.career': {
                $data = [
                    'texts' => [
                        'Our small team is growing fast. We’d love your help in making Great Place IT Services truly Special. Come join us!',
                        'Great Place IT Services is a very young organization and an upcoming start-up. We provide career opportunities for both freshers and experienced individuals. We have a right mix of experienced and fresh minds within the company.'
                    ],
                    'collections' => [
                        [
                            'title'     => 'Great Place IT Services',
                            'image_url' => 'http://www.judycehmm.com/wp-content/uploads/2015/10/dummy-image-rectangle-1600x1200px.jpg',
                            'subtitle'  => ' ',
                            'buttons' => [
                                [
                                    'type' => 'web_url',
                                    'url' => 'https://mail.google.com/mail/?view=cm&fs=1&to=info@greatplaceitservices.com&su=Job%20Application%20for%20&body='.htmlspecialchars('please attach your resume with a cover letter in this mail!'),
                                    'title' => 'Apply Now'
                                ],
                                [
                                    'type' => 'web_url',
                                    'url' => 'http://newwww.greatplaceitservices.com/index.php/careers/',
                                    'title' => 'Current Openings'
                                ]
                            ]
                        ]
                    ]
                ];
                break;
            }

            case 'gpit.our_team': {

                $data = [
                    
                    'collections' => [
                        [
                            'title'     => 'Great Place IT Services',
                            'image_url' => 'http://www.judycehmm.com/wp-content/uploads/2015/10/dummy-image-rectangle-1600x1200px.jpg',
                            'subtitle'  => 'Great Place IT Services - OurTeam',
                            'buttons' => [
                                [
                                    'type' => 'web_url',
                                    'url' => 'http://newwww.greatplaceitservices.com/index.php/about-us/our-team/',
                                    'title' => 'Visit Our Team page'
                                ]
                            ]
                        ]
                    ],
                    'quick_replies' => [
                        'text' => 'Select the domain experts you want to see.',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "Board Of Directors",
                                "payload" => collect(['action' => 'gpit.bods', 'type' => 'Board Of Directors'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Business",
                                "payload" => collect(['action' => 'gpit.business', 'type' => 'Business'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Developers",
                                "payload" => collect(['action' => 'gpit.devs', 'type' => 'Developers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Testers",
                                "payload" => collect(['action' => 'gpit.testers', 'type' => 'Testers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Exit",
                                "payload" => collect(['action' => 'gpit.exit', 'type' => 'Exit'])->toJson()
                            ]

                        ]
                    ]
                ];
                break;
            }

            case 'gpit.bods': {

                $data = [
                    'collections' => [
                        [
                            'title'     => 'Babuji Abraham',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2016/12/Babuji-370x370.jpg',
                            'subtitle'  => '',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/babuji-abraham/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Prasenjit Bhattacharya',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2016/07/prasenjit-370x370.jpg',
                            'subtitle'  => '',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/steven-monroe/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Dheeraj Bhagat',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2016/04/Dheeraj-370x370.jpg',
                            'subtitle'  => '',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/romeo-alvarez/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ]
                    ],
                    'quick_replies' => [
                        'text' => 'Select the domain experts you want to see.',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "Board Of Directors",
                                "payload" => collect(['action' => 'gpit.bods', 'type' => 'Board Of Directors'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Business",
                                "payload" => collect(['action' => 'gpit.business', 'type' => 'Business'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Developers",
                                "payload" => collect(['action' => 'gpit.devs', 'type' => 'Developers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Testers",
                                "payload" => collect(['action' => 'gpit.testers', 'type' => 'Testers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Exit",
                                "payload" => collect(['action' => 'gpit.exit', 'type' => 'Exit'])->toJson()
                            ]

                        ]
                    ]
                ];
                break;
            }

            case 'gpit.business': {

                $data = [
                    'collections' => [
                        [
                            'title'     => 'Mritunjay Kumar',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2017/04/mritunjay-370x334.jpg',
                            'subtitle'  => 'Business Head',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/ba2/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Manish Aglawe',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2017/05/manish-370x334.jpg',
                            'subtitle'  => 'Sr. Business Analyst',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/manish-aglawe/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Disha Desai',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2017/04/disha-370x334.jpg',
                            'subtitle'  => 'Business Analyst',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/ba1/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ]
                    ],
                    'quick_replies' => [
                        'text' => 'Select the domain experts you want to see.',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "Board Of Directors",
                                "payload" => collect(['action' => 'gpit.bods', 'type' => 'Board Of Directors'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Business",
                                "payload" => collect(['action' => 'gpit.business', 'type' => 'Business'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Developers",
                                "payload" => collect(['action' => 'gpit.devs', 'type' => 'Developers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Testers",
                                "payload" => collect(['action' => 'gpit.testers', 'type' => 'Testers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Exit",
                                "payload" => collect(['action' => 'gpit.exit', 'type' => 'Exit'])->toJson()
                            ]

                        ]
                    ]
                ];
                break;
            }

            case 'gpit.devs': {

                $data = [
                    'collections' => [
                        [
                            'title'     => 'Pramod Zade',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2017/04/pramod-370x334.jpg',
                            'subtitle'  => 'Sr. Developer',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/devs2/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Nilesh Krishnarao Chinchkhede',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2017/04/Nilesh-GPIT-370x334.jpg',
                            'subtitle'  => 'Sr. Developer',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/devs1/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ]
                    ],
                    'quick_replies' => [
                        'text' => 'Select the domain experts you want to see.',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "Board Of Directors",
                                "payload" => collect(['action' => 'gpit.bods', 'type' => 'Board Of Directors'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Business",
                                "payload" => collect(['action' => 'gpit.business', 'type' => 'Business'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Developers",
                                "payload" => collect(['action' => 'gpit.devs', 'type' => 'Developers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Testers",
                                "payload" => collect(['action' => 'gpit.testers', 'type' => 'Testers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Exit",
                                "payload" => collect(['action' => 'gpit.exit', 'type' => 'Exit'])->toJson()
                            ]

                        ]
                    ]
                ];
                break;
            }

            case 'gpit.testers': {

                $data = [
                    'collections' => [
                        [
                            'title'     => 'Akash Ramesh Kawale',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2017/04/akash-370x334.jpg',
                            'subtitle'  => 'QA Lead',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/akash-ramesh-kawale/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Gauri Ashok Ghooi',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2017/04/gauri-370x334.jpg',
                            'subtitle'  => 'QA Engineer',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/team/gauri-ashok-ghooi/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ]
                    ],
                    'quick_replies' => [
                        'text' => 'Select the domain experts you want to see.',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "Board Of Directors",
                                "payload" => collect(['action' => 'gpit.bods', 'type' => 'Board Of Directors'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Business",
                                "payload" => collect(['action' => 'gpit.business', 'type' => 'Business'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Developers",
                                "payload" => collect(['action' => 'gpit.devs', 'type' => 'Developers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Testers",
                                "payload" => collect(['action' => 'gpit.testers', 'type' => 'Testers'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Exit",
                                "payload" => collect(['action' => 'gpit.exit', 'type' => 'Exit'])->toJson()
                            ]

                        ]
                    ]
                ];
                break;
            } 

            case 'gpit.exit': {

                $data = [
                    'texts' => [
                        'Okay'
                    ]
                ];
                break;
            }

            case 'gpit.products': {

                $data = [
                    'texts' => [
                        'Great Place IT services, the technology arm of Great Place to Work® Institute, India, was formed in 2011 with the vision to “Create great employee experiences through technology and our understanding of best workplaces”.',
                        ' Since then we have been at the forefront of building technologies which help organizations measure and improve employee experiences to attract, retain and grow their most crucial asset, their people.',
                        ' Our solution portfolio consists of employee engagement diagnostics and reporting, company culture analysis, leadership assessment and leadership behavior intervention products.'
                    ],
                    'quick_replies' => [
                        'text' => 'Following are the services we provide, Choose them to know more.',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "EngageMentor",
                                "payload" => collect(['action' => 'gpit.engagementor', 'type' => 'EngageMentor'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Culture Assessment",
                                "payload" => collect(['action' => 'gpit.ca', 'type' => 'Culture Assessment Platform'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Action Planning Portal",
                                "payload" => collect(['action' => 'gpit.actionplanning', 'type' => 'Action Planning Portal'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Exit",
                                "payload" => collect(['action' => 'gpit.exit', 'type' => 'Exit'])->toJson()
                            ]

                        ]
                    ]
                ];
                break;
            }

            case 'gpit.engagementor': {
                $data = [
                    'texts' => [
                        'Employee engagement surveys and workplace culture assessments turbo charged!Measure Employee Engagement, evaluate workplace processes '
                    ],
                    'collections' => [
                        [
                            'title'     => 'EngageMentor',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2016/12/Employee_Satisfaction_Survey-370x270.jpg',
                            'subtitle'  => 'Employee Experience Turbo Charged',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/services/employee-survey/',
                                    'title' => 'Know more'
                                ]
                            ]
                        ]
                    ],
                    'quick_replies' => [
                        'text' => 'Following are the services we provide, Choose them to know more.',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "EngageMentor",
                                "payload" => collect(['action' => 'gpit.engagementor', 'type' => 'EngageMentor'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Culture Assessment",
                                "payload" => collect(['action' => 'gpit.ca', 'type' => 'Culture Assessment Platform'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Action Planning Portal",
                                "payload" => collect(['action' => 'gpit.actionplanning', 'type' => 'Action Planning Portal'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Exit",
                                "payload" => collect(['action' => 'gpit.exit', 'type' => 'Exit'])->toJson()
                            ]

                        ]
                    ]
                ];
                break;
            }

            case 'gpit.ca': {
                $data = [
                    'texts' => [
                        'Capture company culture data, Evaluate human resource policies and practices and generate insights.'
                    ],
                    'collections' => [
                        [
                            'title'     => 'Culture Assessment Platform',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2016/04/voahi4b_gray-370x270.jpg',
                            'subtitle'  => 'Culture Audit and Evaluation',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/services/culture-assessment-platform/',
                                    'title' => 'Know more'
                                ]
                            ]
                        ]
                    ],
                    'quick_replies' => [
                        'text' => 'Following are the services we provide, Choose them to know more.',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "EngageMentor",
                                "payload" => collect(['action' => 'gpit.engagementor', 'type' => 'EngageMentor'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Culture Assessment",
                                "payload" => collect(['action' => 'gpit.ca', 'type' => 'Culture Assessment Platform'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Action Planning Portal",
                                "payload" => collect(['action' => 'gpit.actionplanning', 'type' => 'Action Planning Portal'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Exit",
                                "payload" => collect(['action' => 'gpit.exit', 'type' => 'Exit'])->toJson()
                            ]

                        ]
                    ]
                ];
                break;
            }

            case 'gpit.actionplanning': {
                $data = [
                    'texts' => [
                        'Manager Intervention Program for Taking Managers to next level of Employee Engagement.'
                    ],
                    'collections' => [
                        [
                            'title'     => 'Action Planning Portal',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2016/12/1434037051982-370x270.jpg',
                            'subtitle'  => 'Leadership Intervention',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/services/leadership-intervention/',
                                    'title' => 'Know more'
                                ]
                            ]
                        ]
                    ],
                    'quick_replies' => [
                        'text' => 'Following are the services we provide, Choose them to know more.',
                        'replies' => [
                            [
                                "content_type" => "text",
                                "title" => "EngageMentor",
                                "payload" => collect(['action' => 'gpit.engagementor', 'type' => 'EngageMentor'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Culture Assessment",
                                "payload" => collect(['action' => 'gpit.ca', 'type' => 'Culture Assessment Platform'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Action Planning Portal",
                                "payload" => collect(['action' => 'gpit.actionplanning', 'type' => 'Action Planning Portal'])->toJson()
                            ],
                            [
                                "content_type" => "text",
                                "title" => "Exit",
                                "payload" => collect(['action' => 'gpit.exit', 'type' => 'Exit'])->toJson()
                            ]

                        ]
                    ]
                ];
                break;
            }

            case 'gpit.testimonials': {

                $data = [
                    'collections' => [
                        [
                            'title'     => 'Great Place to Work® INDIA',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2016/04/GPTW-logo-kleiner-1-e1481546064923-80x80.jpg',
                            'subtitle'  => 'Testimonial - The world-class user interface cuts down time for each evaluation significantly CA2 assessors are taking 40 % less time to finish the analysis Time to do EC evaluation  has reduced by 50 %',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/testimonials/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Great Place to Work® JAPAN',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2017/04/pramod-370x334.jpg',
                            'subtitle'  => 'Testimonial - We have the impression our man-hours were reduced to half by using this system.',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/testimonials/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ],
                        [
                            'title'     => 'Great Place to Work® JAPAN',
                            'image_url' => 'http://newwww.greatplaceitservices.com/wp-content/uploads/2017/04/pramod-370x334.jpg',
                            'subtitle'  => 'Testimonial - Clean lines, nice use of text boxes and pop outs. It\'s like riding in a Lexus after driving a Geo Prism for years',
                            'buttons' => [
                                [
                                    'type'  => 'web_url',
                                    'url'   => 'http://newwww.greatplaceitservices.com/index.php/testimonials/',
                                    'title' => 'Read More'
                                ]
                            ]
                        ]
                    ]
                ];
                break;
            }














            //This code is not used yet....

            case 'gpit.contact_form': {

                $user = FacebookUser::where('id', $facebook_request->facebook_user_id)->first();
                
                $lead = LeadGeneration::where('lead_id', '=', $facebook_request->facebook_user_id)->exists();

                $lead_details = LeadGeneration::where('lead_id', '=', $facebook_request->facebook_user_id)->first();

                if (!empty($lead)) {
                     

                } else if(!empty($parameters->{"phone-number"})) {

                    
                } else {
                    

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