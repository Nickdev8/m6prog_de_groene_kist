<?php

require_once __DIR__ . '/../../dataclasses/Messages.php';
require_once __DIR__ . '/../../dataclasses/Recipients.php';

class BerichtResponse
{
    public int $id;
    public string $subject;
    public string $body;
    public string $created_at;
    public ?string $read_at;
    public string $url;
    public ?string $recipient;

    public function __construct(Messages $message, ?Recipients $recipient)
    {
        $this->id = $message->id;
        $this->subject = $message->subject;
        $this->body = $message->body;
        $this->created_at = $message->created_at;
        $this->read_at = $message->read_at;
        $this->url = GetApiPath() . '/bericht/' . $message->id;
        $this->recipient = $recipient ? GetApiPath() . '/user/' . $recipient->id : null;
    }
}
