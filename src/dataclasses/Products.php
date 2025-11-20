<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/Categories.php';

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
    public ?Categories $category = null;

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

    public static function fromResultRow(array $row): Products
    {
        $product = new Products(
            (int)$row['id'],
            (string)$row['name'],
            $row['description'] !== null ? (string)$row['description'] : null,
            (float)$row['price'],
            (int)$row['category_id'],
            (bool)$row['is_active'],
            (string)$row['created_at'],
            (int)$row['created_by']
        );

        if (isset($row['category_name'])) {
            $product->category = Categories::fromResultRow([
                'category_id' => $row['category_id'],
                'category_name' => $row['category_name'],
                'category_slug' => $row['category_slug'],
                'category_created_at' => $row['category_created_at'],
            ]);
        }

        return $product;
    }

    public static function getAllProducts(mysqli $db, ?string $categoryName = null): array
    {
        if ($categoryName) {
            $stmt = $db->prepare(
                'SELECT p.id, p.name, p.description, p.price, p.category_id, p.is_active, p.created_at, p.created_by,
                        c.name AS category_name, c.slug AS category_slug, c.created_at AS category_created_at
                 FROM products p
                 JOIN categories c ON c.id = p.category_id
                 WHERE c.name = ?
                 ORDER BY p.name'
            );
            $stmt->bind_param('s', $categoryName);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
        } else {
            $result = $db->query(
                'SELECT p.id, p.name, p.description, p.price, p.category_id, p.is_active, p.created_at, p.created_by,
                        c.name AS category_name, c.slug AS category_slug, c.created_at AS category_created_at
                 FROM products p
                 JOIN categories c ON c.id = p.category_id
                 ORDER BY p.name'
            )->fetch_all(MYSQLI_ASSOC);
        }

        $products = [];
        foreach ($result as $row) {
            $products[] = self::fromResultRow($row);
        }

        return $products;
    }
}
