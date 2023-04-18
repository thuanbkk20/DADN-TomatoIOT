<?php
$config['app'] = [
    // 'routeMiddleware' => [
    //     'admin' => AuthMiddleware::class
    // ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ]
];
?>