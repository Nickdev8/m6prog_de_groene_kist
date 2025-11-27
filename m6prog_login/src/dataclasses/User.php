<?php

require_once __DIR__ . '/../db.php';

class User
{
    public int $id;
    public string $username;
    public string $displayname;
    public string $passwordhash;
    public string $created_at;

    public function __construct(int $id, string $username, string $displayname, string $passwordhash, string $created_at)
    {
        $this->id = $id;
        $this->username = $username;
        $this->displayname = $displayname;
        $this->passwordhash = $passwordhash;
        $this->created_at = $created_at;
    }

    public static function fromRow(array $row): User
    {
        return new User(
            (int)$row['id'],
            (string)$row['username'],
            (string)$row['displayname'],
            (string)$row['passwordhash'],
            (string)$row['created_at']
        );
    }

    public static function getUserByName(mysqli $db, string $username): ?User
    {
        $stmt = $db->prepare('SELECT id, username, displayname, passwordhash, created_at FROM users WHERE username = ? LIMIT 1');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        return $row ? self::fromRow($row) : null;
    }
}
