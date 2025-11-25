<?php
include_once __DIR__ . '/db.php';

$request_url = explode('/', $_SERVER['REQUEST_URI']);
$controllers = ['berichten', 'bericht', 'user', 'userhasbericht', 'berichtenbox'];

function GetApiPath()
{
    $domain = $_SERVER['HTTP_HOST'];
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $basePath = dirname($_SERVER['SCRIPT_NAME']);

    $apiBaseUrl = $scheme . "://" . $domain . $basePath;
    return $apiBaseUrl;
}

foreach ($controllers as $page) {
    if ($request_url[1] == $page) {
        include_once __DIR__ . '/controllers/' . $page . '.php';
        exit;
    }
}

http_response_code(404);
exit;
