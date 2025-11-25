<?php
$host = getenv('DB_HOST') ?: 'm6prog_digipost_db';
$db   = getenv('DB_NAME') ?: 'm6prog_digipost';
$user = getenv('DB_USER') ?: 'digipost_app';
$pass = getenv('DB_PASS') ?: 'digipost_app_pw';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset('utf8mb4');
    $result = $conn->query("SELECT 'db connected' AS status");
    $row = $result->fetch_assoc();
    $status = $row['status'] ?? 'unknown';
    $conn->close();
} catch (Throwable $e) {
    $status = 'DB error: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>m6prog_digipost</title>
</head>
<body>
    <h1>m6prog_digipost</h1>
    <p><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></p>
</body>
</html>
