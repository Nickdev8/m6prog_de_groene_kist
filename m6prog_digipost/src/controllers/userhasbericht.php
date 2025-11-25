<?php

require_once __DIR__ . '/../dataclasses/Messages.php';
require_once __DIR__ . '/../dataclasses/Recipients.php';
require_once __DIR__ . '/models/BerichtResponse.php';
require_once __DIR__ . '/models/UserHasBerichtResponse.php';

$db = database_connect();
$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'GET') {
    http_response_code(403);
    exit;
}

$hasUserId = isset($request_url[2]) && $request_url[2] !== '';
if ($hasUserId) {
    handleGetByUser($db, (int)$request_url[2]);
} else {
    handleGetAll($db);
}

function handleGetAll(mysqli $db): void
{
    $messages = Messages::getAllMessages($db);
    $recipients = Recipients::getAllRecipients($db);

    $recipientIndex = [];
    foreach ($recipients as $recipient) {
        $recipientIndex[$recipient->id] = $recipient;
    }

    $response = array_map(function (Messages $message) use ($recipientIndex) {
        $recipient = $recipientIndex[$message->recipient_id] ?? null;
        if (!$recipient) {
            return null;
        }
        return new UserHasBerichtResponse($recipient, $message);
    }, $messages);

    $response = array_values(array_filter($response));

    header('Content-Type: application/json');
    echo json_encode($response);
}

function handleGetByUser(mysqli $db, int $userId): void
{
    $user = Recipients::getRecipientById($db, $userId);
    if (!$user) {
        http_response_code(404);
        echo 'User niet gevonden';
        return;
    }

    $messages = Messages::getMessagesByRecipientId($db, $userId);
    $response = array_map(fn(Messages $message) => new BerichtResponse($message, $user), $messages);

    header('Content-Type: application/json');
    echo json_encode($response);
}
