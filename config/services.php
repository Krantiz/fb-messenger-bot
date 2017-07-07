<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => IndianSuperLeague\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'verify_token'      => env('VERIFY_TOKEN') || 'this_better_work_as_I_am_expecting',
        'page_access_token' => env('PAGE_ACCESS_TOKEN') || 'EAANoFWIttK0BAFgymqFGLcxa69PZBGqqpCEuC3BgutJ6T6de9buGsQ3DTTqSII1HaZCGggq0NgZBnAX0rxtzPo6JKhjsN6wE3dALPSl93R0KdM03Ek802LSo5d3ul5KLYB5CU0mC7gbsrIqJWWNWMuio0pEbq1xjmQOVZBVZBJwZDZD',

        'text_character_limit' => 319,

        'failed_message'    => 'Sorry, but I am not able to comprehend what you are saying! I am just a bot, you see! Could you ask me that in another way, please?',
        'unknown_message'    => 'Not sure about that one. Sorry!',
        'greeting_elements' => [
            [
                'title'     => 'Welcome to FC Goa',
                'image_url' => 'https://s3.ap-south-1.amazonaws.com/fcgoa-production/public/welcome.png',
                'subtitle'  => 'FORCA GOA!',
                'buttons'   => [
                    [
                        'type'      => 'postback',
                        'title'     => 'Know more',
                        'payload'   => 'indiansuperleague.about_team'
                    ]
                ]
            ],[
                'title'     => 'Latest News',
                'image_url' => 'https://s3.ap-south-1.amazonaws.com/fcgoa-production/public/news.png',
                'subtitle'  => 'Your one stop hub of all the latest buzz about FC Goa Team Activities!',
                'buttons'   => [
                    [
                        'type'      => 'postback',
                        'title'     => 'Subscribe',
                        'payload'   => 'indiansuperleague.subscribe_news'
                    ]
                ]
            ],[
                'title'     => 'FC Goa Players',
                'image_url' => 'https://s3.ap-south-1.amazonaws.com/fcgoa-production/public/players.png',
                'subtitle'  => 'Get insights on what FC Goa is made of!!',
                'buttons'   => [
                    [
                        'type'      => 'postback',
                        'title'     => 'Know more',
                        'payload'   => 'indiansuperleague.team_squad'
                    ]
                ]
            ],[
                'title'     => 'Buy Merchandise',
                'image_url' => 'https://s3.ap-south-1.amazonaws.com/fcgoa-production/public/store.png',
                'subtitle'  => 'Check out all the cool merchandise we have to offer! :D',
                'buttons'   => [
                    [
                        'type'      => 'postback',
                        'title'     => 'Shop',
                        'payload'   => 'indiansuperleague.buy_merchandise'
                    ]
                ]
            ],[
                'title'     => 'Buy Tickets',
                'image_url' => 'https://s3.ap-south-1.amazonaws.com/fcgoa-production/public/tickets.png',
                'subtitle'  => 'Can\'t wait to get your hands on them? Let\'s start booking!!',
                'buttons'   => [
                    [
                        'type'      => 'postback',
                        'title'     => 'Buy now',
                        'payload'   => 'indiansuperleague.buy_tickets'
                    ]
                ]
            ]
        ]

    ],

    'apiai' => [
        'version' => '20150910',
        'base_url' => 'https://api.api.ai/v1/',
        'client_access_token' => '866b64116f8249f8bb54c01e4f5d6f13',
        'developer_access_token' => 'd096dd76d8c54c05b9bfad51c712771a',
        'session_token' => '.fcgoa.request'
    ]

];
