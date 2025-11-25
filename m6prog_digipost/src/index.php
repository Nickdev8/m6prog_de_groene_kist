<?php
include_once __DIR__ . '/db.php';

$request_url = explode('/', $_SERVER['REQUEST_URI']);

$controllers = ['bericht'];
foreach ($controllers as $page) {
    if ($request_url[1] == $page) {
        include_once __DIR__ . '/controllers/' . $page . '.php';
        exit;
    }
}

http_response_code(404);
exit;
