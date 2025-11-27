<?php
$requestPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '', '/');
$routes = [
    '' => 'views/home.php',
    'home' => 'views/home.php',
    'groente' => 'views/groente.php',
    'fruit' => 'views/fruit.php',
    'contact' => 'views/contact.php',
];

if (!array_key_exists($requestPath, $routes)) {
    http_response_code(404);
    echo 'Pagina niet gevonden.';
    exit;
}

$pageFile = $routes[$requestPath];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/navbar.php';
?>

<main class="page">
    <?php require __DIR__ . '/' . $pageFile; ?>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
