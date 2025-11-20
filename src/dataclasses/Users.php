<?php
require_once __DIR__ . '/../db.php';

class Users
{
    public int $id;
    public string $email;
    public string $password_hash;
    public string $role;
    public string $created_at;

    public function __construct(
        int $id,
        string $email,
        string $password_hash,
        string $role,
        string $created_at
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->role = $role;
        $this->created_at = $created_at;
    }
}
