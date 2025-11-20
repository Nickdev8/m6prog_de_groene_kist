<?php
$page = $_GET['page'] ?? 'home';

$routes = [
    'home' => 'views/home.php',
    'products' => 'views/products.php',
    'contact' => 'views/contact.php',
];

$pageFile = $routes[$page] ?? $routes['home'];

?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groene Haven Markt</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <main class="page">
        <?php require __DIR__ . '/' . $pageFile; ?>
    </main>

    <?php require __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
