<?php
$config['app'] = [
    'routeMiddleware' => [
        'home' => AuthMiddleware::class
    ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ]
];
?>