<?php

require_once __DIR__ . '/../dataclasses/Messages.php';
require_once __DIR__ . '/../dataclasses/Recipients.php';
require_once __DIR__ . '/models/BerichtResponse.php';

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
        http_response_code(403);
        echo 'GET zonder id is niet toegestaan';
        return;
    }

    $messageId = (int)$request_url[2];
    $message = Messages::getMessageById($db, $messageId);
    if (!$message) {
        http_response_code(404);
        echo 'Bericht niet gevonden';
        return;
    }

    $recipient = Recipients::getRecipientById($db, $message->recipient_id);
    $response = new BerichtResponse($message, $recipient);

    header('Content-Type: application/json');
    echo json_encode($response);
}
