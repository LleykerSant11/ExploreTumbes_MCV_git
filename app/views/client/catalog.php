<?php require __DIR__ . '/../partials/header.php'; ?>
<?php require __DIR__ . '/../partials/nav_client.php'; ?>
<section class="container">
    <h2>Catálogo de tours</h2>
    <div class="card-grid">
        <?php foreach ($tours as $tour): ?>
            <div class="card">
                <h3><?php echo $tour->title; ?></h3>
                <p><?php echo $tour->location; ?></p>
                <p><?php echo $tour->description; ?></p>
                <p class="price">S/ <?php echo $tour->price; ?></p>
                <a class="button small" href="<?php echo route('tour/' . $tour->id); ?>">Más información</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>