<?php
/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\TransmissionUI\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
    'resources' => [
        'torrent_api' => [
            'url' => '/api/1.0/torrent'
        ]
    ],
    'routes' => [
        [
            'name' => 'page#index',
            'url' => '/',
            'verb' => 'GET'
        ],
        [
            'name' => 'torrent_api#preflighted_cors',
            'url' => '/api/1.0/{path}',
            'verb' => 'OPTIONS',
            'requirements' => [
                'path' => '.+'
            ]
        ],
    ]
];
