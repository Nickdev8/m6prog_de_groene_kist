<?php
require_once __DIR__ . '/../db.php';

class Recipients
{
    public int $id;
    public string $name;
    public string $email;
    public string $token;
    public string $created_at;

    public function __construct(int $id, string $name, string $email, string $token, string $created_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->token = $token;
        $this->created_at = $created_at;
    }

    public static function fromRow(array $row): Recipients
    {
        return new Recipients(
            (int)$row['id'],
            (string)$row['name'],
            (string)$row['email'],
            (string)$row['token'],
            (string)$row['created_at']
        );
    }

    public static function getAllRecipients(mysqli $db): array
    {
        $rows = $db->query('SELECT id, name, email, token, created_at FROM recipients ORDER BY id')->fetch_all(MYSQLI_ASSOC);
        return array_map([self::class, 'fromRow'], $rows);
    }

    public static function getRecipientById(mysqli $db, int $id): ?Recipients
    {
        $stmt = $db->prepare('SELECT id, name, email, token, created_at FROM recipients WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $row ? self::fromRow($row) : null;
    }
}
