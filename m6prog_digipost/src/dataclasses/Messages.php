<?php
require_once __DIR__ . '/../db.php';

class Messages
{
    public int $id;
    public int $recipient_id;
    public string $subject;
    public string $body;
    public string $created_at;
    public ?string $read_at;

    public function __construct(
        int $id,
        int $recipient_id,
        string $subject,
        string $body,
        string $created_at,
        ?string $read_at
    ) {
        $this->id = $id;
        $this->recipient_id = $recipient_id;
        $this->subject = $subject;
        $this->body = $body;
        $this->created_at = $created_at;
        $this->read_at = $read_at;
    }

    public static function fromRow(array $row): Messages
    {
        return new Messages(
            (int)$row['id'],
            (int)$row['recipient_id'],
            (string)$row['subject'],
            (string)$row['body'],
            (string)$row['created_at'],
            $row['read_at'] !== null ? (string)$row['read_at'] : null
        );
    }

    public static function getAllMessages(mysqli $db): array
    {
        $rows = $db->query('SELECT id, recipient_id, subject, body, created_at, read_at FROM messages ORDER BY id')->fetch_all(MYSQLI_ASSOC);
        return array_map([self::class, 'fromRow'], $rows);
    }

    public static function getMessageById(mysqli $db, int $id): ?Messages
    {
        $stmt = $db->prepare('SELECT id, recipient_id, subject, body, created_at, read_at FROM messages WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $row ? self::fromRow($row) : null;
    }
}
