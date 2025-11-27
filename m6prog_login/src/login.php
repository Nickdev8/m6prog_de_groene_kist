<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/dataclasses/User.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(500);
    exit;
}

$payload = json_decode(file_get_contents('php://input'), true) ?? [];
$username = trim($payload['username'] ?? '');
$password = (string)($payload['password'] ?? '');

if ($username === '' || $password === '') {
    http_response_code(400);
    exit;
}

$db = database_connect();
$user = User::getUserByName($db, $username);

if (!$user) {
    http_response_code(404);
    exit;
}

if (password_verify($password, $user->passwordhash)) {
    header('Content-Type: text/plain; charset=utf-8');
    echo $user->displayname;
} else {
    http_response_code(404);
}
