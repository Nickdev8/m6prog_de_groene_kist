<?php

/**
 * @var Message $message
 */
?>
<article class="wall-card">
    <header class="card-top">
        <span class="author"><?php echo htmlspecialchars($message->author, ENT_QUOTES, 'UTF-8'); ?></span>
        <span class="timestamp"><?php echo htmlspecialchars($message->created_at, ENT_QUOTES, 'UTF-8'); ?></span>
    </header>
    <p class="body"><?php echo nl2br(htmlspecialchars($message->body, ENT_QUOTES, 'UTF-8')); ?></p>
</article>
