<?php require __DIR__ . '/../partials/header.php'; ?>
<div class="admin-layout">
    <?php require __DIR__ . '/../partials/nav_admin.php'; ?>
    <section class="container admin-list">
    <h2>Clientes registrados</h2>
    <table>
        <thead>
            <tr><th>ID</th><th>Nombre</th><th>Email</th></tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?php echo $client->id; ?></td>
                    <td><?php echo $client->name; ?></td>
                    <td><?php echo $client->email; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>