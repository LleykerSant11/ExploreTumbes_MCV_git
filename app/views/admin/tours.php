<?php require __DIR__ . '/../partials/header.php'; ?>
<div class="admin-layout">
    <?php require __DIR__ . '/../partials/nav_admin.php'; ?>
    <section class="container admin-list">
    <h2>Gestión de tours</h2>
    <table>
        <thead>
            <tr><th>ID</th><th>Tour</th><th>Ubicación</th><th>Precio</th></tr>
        </thead>
        <tbody>
            <?php foreach ($tours as $tour): ?>
                <tr>
                    <td><?php echo $tour->id; ?></td>
                    <td><?php echo $tour->title; ?></td>
                    <td><?php echo $tour->location; ?></td>
                    <td>S/ <?php echo $tour->price; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>