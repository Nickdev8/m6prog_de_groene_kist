<?php
require_once __DIR__ . '/../db.php';

class Offers
{
    public int $id;
    public int $product_id;
    public string $title;
    public float $promo_price;
    public string $starts_at;
    public string $ends_at;
    public bool $active;
    public int $created_by;

    public function __construct(
        int $id,
        int $product_id,
        string $title,
        float $promo_price,
        string $starts_at,
        string $ends_at,
        bool $active,
        int $created_by
    ) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->title = $title;
        $this->promo_price = $promo_price;
        $this->starts_at = $starts_at;
        $this->ends_at = $ends_at;
        $this->active = $active;
        $this->created_by = $created_by;
    }
}
