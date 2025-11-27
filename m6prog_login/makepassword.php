<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $hash = password_hash($password, PASSWORD_ARGON2ID);
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak password hash</title>
</head>
<body>
    <h1>Maak password hash</h1>
    <form method="post">
        <label for="password">Password of client-hash</label>
        <input type="text" id="password" name="password" required>
        <button type="submit">Hash</button>
    </form>
    <?php if (isset($hash)): ?>
        <p>Hash:</p>
        <textarea rows="4" cols="70"><?php echo htmlspecialchars($hash, ENT_QUOTES, 'UTF-8'); ?></textarea>
    <?php endif; ?>
</body>
</html>
