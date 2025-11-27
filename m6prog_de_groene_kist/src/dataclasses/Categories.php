<?php
require_once __DIR__ . '/../db.php';

class Categories
{
    public int $id;
    public string $name;
    public string $slug;
    public string $created_at;

    public function __construct(
        int $id,
        string $name,
        string $slug,
        string $created_at
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->created_at = $created_at;
    }

    public static function fromResultRow(array $row): Categories
    {
        return new Categories(
            (int)$row['category_id'],
            (string)$row['category_name'],
            (string)$row['category_slug'],
            (string)$row['category_created_at']
        );
    }
}
