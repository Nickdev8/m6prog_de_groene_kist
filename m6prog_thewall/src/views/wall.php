<?php

require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../dataclasses/Message.php';

$db = database_connect();
$messages = Message::getAll($db);
?>
<section id="wall-section" class="wall">
    <?php foreach ($messages as $message): ?>
        <?php include __DIR__ . '/message.php'; ?>
    <?php endforeach; ?>
</section>
