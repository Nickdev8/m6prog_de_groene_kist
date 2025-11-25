<?php

require_once __DIR__ . '/../dataclasses/Recipients.php';
require_once __DIR__ . '/models/UserResponse.php';

$db = database_connect();
$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'GET') {
    http_response_code(403);
    exit;
}

$hasId = isset($request_url[2]) && $request_url[2] !== '';
if ($hasId) {
    handleGetById($db, (int)$request_url[2]);
} else {
    handleGetAll($db);
}

function handleGetAll(mysqli $db): void
{
    $users = Recipients::getAllRecipients($db);
    $response = array_map(fn(Recipients $user) => new UserResponse($user), $users);

    header('Content-Type: application/json');
    echo json_encode($response);
}

function handleGetById(mysqli $db, int $id): void
{
    $user = Recipients::getRecipientById($db, $id);
    if (!$user) {
        http_response_code(404);
        echo 'User niet gevonden';
        return;
    }

    $response = new UserResponse($user);
    header('Content-Type: application/json');
    echo json_encode($response);
}
