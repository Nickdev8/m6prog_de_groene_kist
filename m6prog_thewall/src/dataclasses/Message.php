<?php

require_once __DIR__ . '/../db.php';

class Message
{
    public int $id;
    public string $author;
    public string $body;
    public string $created_at;

    public function __construct(int $id, string $author, string $body, string $created_at)
    {
        $this->id = $id;
        $this->author = $author;
        $this->body = $body;
        $this->created_at = $created_at;
    }

    public static function fromRow(array $row): Message
    {
        return new Message(
            (int)$row['id'],
            (string)$row['author'],
            (string)$row['body'],
            (string)$row['created_at']
        );
    }

    /**
     * @return Message[]
     */
    public static function getAll(mysqli $db): array
    {
        $rows = $db->query('SELECT id, author, body, created_at FROM messages ORDER BY id DESC')->fetch_all(MYSQLI_ASSOC);
        return array_map([self::class, 'fromRow'], $rows);
    }

    public static function insert(mysqli $db, Message $message): Message
    {
        $stmt = $db->prepare('INSERT INTO messages (author, body) VALUES (?, ?)');
        $stmt->bind_param('ss', $message->author, $message->body);
        $stmt->execute();

        $insertedId = $stmt->insert_id;
        $stmt->close();

        $rowStmt = $db->prepare('SELECT id, author, body, created_at FROM messages WHERE id = ?');
        $rowStmt->bind_param('i', $insertedId);
        $rowStmt->execute();
        $result = $rowStmt->get_result();
        $row = $result->fetch_assoc();
        $rowStmt->close();

        return self::fromRow($row);
    }
}
