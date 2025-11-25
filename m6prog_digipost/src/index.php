<?php
require_once __DIR__ . '/db.php';

$db = database_connect();

$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
$segments = $path == '' ? [] : explode('/', $path);
$resource = $segments[0] ?? '';

$routes = [
    'berichten' => __DIR__ . '/controllers/bericht.php',
];

if (!isset($routes[$resource])) {
    http_response_code(404);
    echo 'NOT FOUND';
    exit;
}

require $routes[$resource];
