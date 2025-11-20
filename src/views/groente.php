<?php
$groenteRows = productsByCategory($db, 'Groente');
$groente = [];
foreach ($groenteRows as $row) {
    $groente[] = new Products(
        (int)$row['id'],
        (string)$row['name'],
        $row['description'] !== null ? (string)$row['description'] : null,
        (float)$row['price'],
        (int)$row['category_id'],
        (bool)$row['is_active'],
        (string)$row['created_at'],
        (int)$row['created_by']
    );
}
?>
<section class="page-header">
    <p class="kicker">Assortiment</p>
    <h1>Groente</h1>
    <p class="lead">Dagverse groente uit de regio, gesorteerd op naam.</p>
</section>

<section class="product-grid">
    <?php foreach ($groente as $item): ?>
        <div class="card">
            <h3><?= htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8') ?></h3>
            <?php if (!empty($item->description)): ?>
                <p class="lead"><?= htmlspecialchars($item->description, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
            <div class="price-tag">€<?= number_format((float)$item->price, 2, ',', '') ?></div>
        </div>
    <?php endforeach; ?>
</section>
