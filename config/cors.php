<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => true,
    'allowedOrigins' => ['https://yourunity.org'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['X-CSRF-TOKEN','X-Requested-With', '*'],
    'allowedMethods' => ['HEAD, POST, GET, OPTIONS, PUT'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
