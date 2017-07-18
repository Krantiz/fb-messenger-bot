
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
        'model' => LodhaStarter\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'verify_token'      => env('VERIFY_TOKEN'),
        'page_access_token' => env('PAGE_ACCESS_TOKEN'),
        'text_character_limit' => 319,
        'failed_message'    => 'Sorry, but I am not able to comprehend what you are saying! I am just a bot, you see! Try asking me that in another way. :)',
        'unknown_message'    => 'Not sure about that one. I am still learning... :P',
        'maintainance_message'  =>  "Hey, thanks for your message. We are not here right now, but we'll get back to you soon!",
        'abusive_message'  =>  "That is so rude. Why would you say something like that? 😔",
        'generic_quick_reply_text'  => [
            "So, what's next?",
            "What do you want me to do next?",
            "How about I suggest something you can do?"
        ],
        'generic_quick_reply_texts'  => [
            "So, what's next?",
            "What do you want me to do next?",
            "How about I suggest something I can help with?"
        ],
        'generic_quick_replies' => [
            [
                "content_type" => "text",
                "title" => "About GPITS",
                "payload" => "gpit.about"
            ],
            [
                "content_type" => "text",
                "title" => "Contact Us",
                "payload" => 'gpit.contactus'
            ],
            [
                "content_type" => "text",
                "title" => "Join Us",
                "payload" => 'gpit.career'
            ],
            [
                "content_type" => "text",
                "title" => "Our Team",
                "payload" => 'gpit.our_team'
            ],
            [
                "content_type" => "text",
                "title" => "Services",
                "payload" => 'gpit.products'
            ],
            [
                "content_type" => "text",
                "title" => "Clients",
                "payload" => 'gpit.testimonials'
            ],
            [
                "content_type" => "text",
                "title" => "👍",
                "payload" => collect(['action' => 'lodha.user_feedback', 'feedback' => 'Good'])->toJson(),
                "image_url" => ""
            ],
            [
                "content_type" => "text",
                "title" => "👎",
                "payload" => collect(['action' => 'lodha.user_feedback', 'feedback' => 'Bad'])->toJson(),
                "image_url" => ""
            ]
        ],
        'city_quick_replies' => [
            [
                "content_type" => "text",
                "title" => "Mumbai",
                "payload" => collect(['action' => 'lodha.contact_form', 'city' => 'mumbai'])->toJson()
            ],
            [
                "content_type" => "text",
                "title" => "Pune",
                "payload" => collect(['action' => 'lodha.contact_form', 'city' => 'pune'])->toJson()
            ],
            [
                "content_type" => "text",
                "title" => "Hyderabad",
                "payload" => collect(['action' => 'lodha.contact_form', 'city' => 'hyderabad'])->toJson()
            ],
            [
                "content_type" => "text",
                "title" => "London",
                "payload" => collect(['action' => 'lodha.contact_form', 'city' => 'london'])->toJson()
            ]
        ],
        'skip_actions' => [
            '{"action":"lodha.contact_form","type":"1BHK"}',
            '{"action":"lodha.contact_form","type":"2BHK"}',
            '{"action":"lodha.contact_form","type":"3BHK"}',
            '{"action":"lodha.contact_form","type":"4BHK"}',
            'lodha.contact_form',
        ]
    ],
    'apiai' => [
        'version' => '20150910',
        'base_url' => 'https://api.api.ai/v1/',
        'client_access_token' => env('APIAI_CLIENT_ACCESS_TOKEN'),
        'developer_access_token' => env('APIAI_DEVELOPER_ACCESS_TOKEN'),
        'session_token' => '.lodhagroup.request'
    ],
    'witai' => [
        'version' => '20160928',
        'base_url' => 'https://api.wit.ai/',
        'server_access_token' => env('WITAI_SERVER_ACCESS_TOKEN'),
        'session_token' => '.lodha.group.bot'
    ]
];
