<?php
require_once _DIR_ROOT . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(_DIR_ROOT);
$dotenv->load();

$config['database'] = [
    'host' => $_ENV['DB_HOST'],
    'user' => $_ENV['DB_USER'],
    'pass' => $_ENV['DB_PASSWORD'],
    'db' => $_ENV['DB_NAME']
];
