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
            <li><a class="<?= trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') === '' || trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') === 'home' ? 'active' : '' ?>" href="/home">Home</a></li>
            <li><a class="<?= trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') === 'groente' ? 'active' : '' ?>" href="/groente">Groente</a></li>
            <li><a class="<?= trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') === 'fruit' ? 'active' : '' ?>" href="/fruit">Fruit</a></li>
            <li><a class="<?= trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') === 'contact' ? 'active' : '' ?>" href="/contact">Contact</a></li>
        </ul>
    </nav>
</header>
