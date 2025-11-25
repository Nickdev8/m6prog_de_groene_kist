<?php

require_once __DIR__ . '/UserResponse.php';
require_once __DIR__ . '/BerichtResponse.php';

class BerichtenboxResponse
{
    public UserResponse $user;
    /** @var BerichtResponse[] */
    public array $berichten;

    public function __construct(UserResponse $user, array $berichten)
    {
        $this->user = $user;
        $this->berichten = $berichten;
    }
}
