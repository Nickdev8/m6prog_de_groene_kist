<?php
$current = $_GET['page'] ?? 'home';
?>
<header class="navigation">
    <div class="nav-brand">
        <div class="logo-circle">GH</div>
        <div class="brand-text">
            <span class="brand-name">Groene Haven Markt</span>
            <span class="brand-tag">groente & fruit</span>
        </div>
    </div>
    <nav>
        <ul>
            <li><a class="<?= $current === 'home' ? 'active' : '' ?>" href="?page=home">Home</a></li>
            <li><a class="<?= $current === 'products' ? 'active' : '' ?>" href="?page=products">Producten</a></li>
            <li><a class="<?= $current === 'contact' ? 'active' : '' ?>" href="?page=contact">Contact</a></li>
        </ul>
    </nav>
</header>
