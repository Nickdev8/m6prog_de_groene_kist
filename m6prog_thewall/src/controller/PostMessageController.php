<?php

require_once __DIR__ . '/../dataclasses/Message.php';

class PostMessageController
{
    private mysqli $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function handlePost(): void
    {
        $author = trim($_POST['author'] ?? '');
        $body = trim($_POST['body'] ?? '');

        if ($author === '' || $body === '') {
            return;
        }

        $message = new Message(0, $author, $body, date('Y-m-d H:i:s'));
        Message::insert($this->db, $message);
    }

    public function handlePostJson(): void
    {
        $rawBody = file_get_contents('php://input');
        $payload = json_decode($rawBody, true) ?: [];

        $author = trim($payload['sign'] ?? '');
        $body = trim($payload['text'] ?? '');

        if ($author === '' || $body === '') {
            return;
        }

        $message = new Message(0, $author, $body, date('Y-m-d H:i:s'));
        Message::insert($this->db, $message);
    }
}
