<?php
require_once __DIR__ . '/../db.php';

class Products
{
    public int $id;
    public string $name;
    public ?string $description;
    public float $price;
    public int $category_id;
    public bool $is_active;
    public string $created_at;
    public int $created_by;

    public function __construct(
        int $id,
        string $name,
        ?string $description,
        float $price,
        int $category_id,
        bool $is_active,
        string $created_at,
        int $created_by
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->is_active = $is_active;
        $this->created_at = $created_at;
        $this->created_by = $created_by;
    }
}
