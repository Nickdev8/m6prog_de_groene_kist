<?php

function database_connect(): mysqli
{
    static $db = null;
    if ($db instanceof mysqli) {
        return $db;
    }

    $host = getenv('DB_HOST') ?: 'm6prog_de_groene_kist_db';
    $name = getenv('DB_NAME') ?: 'm6prog_de_groene_kist';
    $user = getenv('DB_USER') ?: 'm6prog_de_groene_kist_app';
    $pass = getenv('DB_PASS') ?: 'm6prog_de_groene_kist_app_pw';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli($host, $user, $pass, $name);
    $db->set_charset('utf8mb4');

    return $db;
}

function productsByCategory(mysqli $db, string $categoryName): array
{
    $stmt = $db->prepare(
        'SELECT p.id, p.name, p.description, p.price, c.name AS category
         FROM products p
         JOIN categories c ON c.id = p.category_id
         WHERE c.name = ?
         ORDER BY p.name'
    );
    $stmt->bind_param('s', $categoryName);
    $stmt->execute();

    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $result;
}
