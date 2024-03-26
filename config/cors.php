<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => [
        // 'api/*' ,
        // , 'sanctum/csrf-cookie'
        'api/admin/*' ,
        'api/attendant/*' ,
        'api/client/*' ,
        'api/mobile/*' ,
        'api/meeting/*'
    ],

    'allowed_methods' => [ 
        '*' 
    ],

    'allowed_origins' => [ 
        '*' ,
        env("ADMIN_URL", "http://127.0.0.1:3000" ) ,
        env("CLIENT_URL", "http://127.0.0.1:3001" ),
        env("MEETING_URL", "http://127.0.0.1:3002" ),
        env("ATTENDANT_URL", "http://127.0.0.1:3003" )
     ], 

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
    
    'Access-Control-Allow-Origin' => ['*']

];
