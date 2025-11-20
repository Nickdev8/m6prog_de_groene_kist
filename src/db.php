<?php

function getPdo(): PDO
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $host = getenv('DB_HOST') ?: 'm6prog_de_groene_kist_db';
    $db   = getenv('DB_NAME') ?: 'm6prog_de_groene_kist';
    $user = getenv('DB_USER') ?: 'm6prog_de_groene_kist_app';
    $pass = getenv('DB_PASS') ?: 'm6prog_de_groene_kist_app_pw';

    $dsn = "mysql:host={$host};dbname={$db};charset=utf8mb4";
    $opts = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    $pdo = new PDO($dsn, $user, $pass, $opts);
    return $pdo;
}

function productsByCategory(PDO $pdo, string $categoryName): array
{
    $stmt = $pdo->prepare(
        'SELECT p.id, p.name, p.description, p.price, c.name AS category
         FROM products p
         JOIN categories c ON c.id = p.category_id
         WHERE c.name = :category
         ORDER BY p.name'
    );
    $stmt->execute(['category' => $categoryName]);
    return $stmt->fetchAll();
}
