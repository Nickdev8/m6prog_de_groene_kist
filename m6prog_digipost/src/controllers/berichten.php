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

handleGet($db);

function handleGet(mysqli $db): void
{
    $messages = Messages::getAllMessages($db);
    $recipients = Recipients::getAllRecipients($db);

    $recipientIndex = [];
    foreach ($recipients as $recipient) {
        $recipientIndex[$recipient->id] = $recipient;
    }

    $response = array_map(function (Messages $message) use ($recipientIndex) {
        $recipient = $recipientIndex[$message->recipient_id] ?? null;
        return new BerichtResponse($message, $recipient);
    }, $messages);

    header('Content-Type: application/json');
    echo json_encode($response);
}
