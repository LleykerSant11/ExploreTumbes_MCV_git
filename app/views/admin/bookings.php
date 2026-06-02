<?php require __DIR__ . '/../partials/header.php'; ?>
<?php require __DIR__ . '/../partials/nav_admin.php'; ?>
<section class="container admin-list">
    <h2>Reservas</h2>
    <table>
        <thead>
            <tr><th>ID</th><th>Tour</th><th>Cliente</th><th>Fecha</th></tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?php echo $booking->id; ?></td>
                    <td><?php echo $booking->tourName; ?></td>
                    <td><?php echo $booking->clientName; ?></td>
                    <td><?php echo $booking->date; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>