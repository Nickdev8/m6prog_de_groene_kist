<?php

require_once __DIR__ . '/../dataclasses/Messages.php';
require_once __DIR__ . '/../dataclasses/Recipients.php';
require_once __DIR__ . '/models/BerichtResponse.php';
require_once __DIR__ . '/models/UserResponse.php';
require_once __DIR__ . '/models/BerichtenboxResponse.php';

$db = database_connect();
$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'GET') {
    http_response_code(403);
    exit;
}

handleGet($db, $request_url);

function handleGet(mysqli $db, array $request_url): void
{
    if (!isset($request_url[2]) || !is_numeric($request_url[2])) {
        http_response_code(400);
        echo 'Geen geldige user id opgegeven';
        return;
    }

    $userId = (int)$request_url[2];
    $user = Recipients::getRecipientById($db, $userId);
    if (!$user) {
        http_response_code(404);
        echo 'User niet gevonden';
        return;
    }

    $messages = Messages::getMessagesByRecipientId($db, $userId);
    $messageResponses = array_map(fn(Messages $message) => new BerichtResponse($message, $user), $messages);
    $userResponse = new UserResponse($user);

    $response = new BerichtenboxResponse($userResponse, $messageResponses);

    header('Content-Type: application/json');
    echo json_encode($response);
}
