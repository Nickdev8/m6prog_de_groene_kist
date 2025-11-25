<?php

require_once __DIR__ . '/../../dataclasses/Messages.php';
require_once __DIR__ . '/../../dataclasses/Recipients.php';

class UserHasBerichtResponse
{
    public string $user;
    public string $bericht;

    public function __construct(Recipients $user, Messages $message)
    {
        $this->user = GetApiPath() . '/user/' . $user->id;
        $this->bericht = GetApiPath() . '/bericht/' . $message->id;
    }
}
