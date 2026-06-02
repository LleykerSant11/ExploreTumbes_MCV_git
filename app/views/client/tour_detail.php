<?php require __DIR__ . '/../partials/header.php'; ?>
<?php require __DIR__ . '/../partials/nav_client.php'; ?>
<section class="container tour-detail">
    <h2><?php echo $tour->title; ?></h2>
    <p class="location"><?php echo $tour->location; ?></p>
    <p><?php echo $tour->description; ?></p>
    <p class="price">Precio: S/ <?php echo $tour->price; ?></p>
    <a class="button" href="<?php echo route('catalog'); ?>">Volver al catálogo</a>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>