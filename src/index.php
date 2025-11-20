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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&display=swap" rel="stylesheet">
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
