<?php

require_once __DIR__ . '/../../dataclasses/Recipients.php';

class UserResponse
{
    public int $id;
    public string $name;
    public string $url;

    public function __construct(Recipients $user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->url = GetApiPath() . '/user/' . $user->id;
    }
}
