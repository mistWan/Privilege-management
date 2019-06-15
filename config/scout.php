<?php

return [


    'driver' => env('SCOUT_DRIVER', 'elasticsearch'),

    'prefix' => env('SCOUT_PREFIX', ''),

    'queue' => env('SCOUT_QUEUE', false),

    'chunk' => [
        'searchable' => 500,
        'unsearchable' => 500,
    ],

    'soft_delete' => false,

    /*'algolia' => [
        'id' => env('ALGOLIA_APP_ID', ''),
        'secret' => env('ALGOLIA_SECRET', ''),
    ],*/

    'elasticsearch' => [
        'index' => env('ELASTICSEARCH_INDEX', 'learn'),
        'hosts' => [
            env('ELASTICSEARCH_HOST', 'http://127.0.0.1:9200'),
        ],
    ],

];
