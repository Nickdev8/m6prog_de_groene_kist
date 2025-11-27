<?php
require_once __DIR__ . '/db.php';

$db = database_connect();
$connectionOk = $db->ping();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/controller/PostMessageController.php';

    $ctrl = new PostMessageController($db);
    $contentType = $_SERVER['CONTENT_TYPE'] ?? ($_SERVER['HTTP_CONTENT_TYPE'] ?? '');

    if (stripos($contentType, 'application/json') !== false) {
        $ctrl->handlePostJson();
    } else {
        $ctrl->handlePost();
    }

    include __DIR__ . '/views/wall.php';
    exit;
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wall</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body class="page">
    <main class="container">
        <section>
            <div class="status">
                <span>DB status:</span>
                <span><?php echo $connectionOk ? 'verbonden' : 'niet verbonden'; ?></span>
            </div>
            <h1>The Wall</h1>
            <p class="lead">Laat een kort bericht achter met je naam. Hieronder zie je de laatste posts.</p>
        </section>

        <?php include __DIR__ . '/views/wall.php'; ?>

        <section class="form-card">
            <h2>Post een nieuw bericht</h2>
            <form method="POST">
                <div>
                    <label for="author">Je naam / tag</label>
                    <input type="text" id="author" name="author" placeholder="bv. Alice" required>
                </div>
                <div>
                    <label for="body">Je bericht</label>
                    <textarea id="body" name="body" placeholder="Wat wil je delen?" required></textarea>
                </div>
                <button type="submit">Plaats op de muur</button>
            </form>
        </section>
    </main>
    <script src="/assets/js/main.js"></script>
</body>
</html>
