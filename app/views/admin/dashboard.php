<?php require __DIR__ . '/../partials/header.php'; ?>
<?php require __DIR__ . '/../partials/nav_admin.php'; ?>
<section class="container admin-dashboard">
    <h2>Panel de administración</h2>
    <div class="stats-grid">
        <div class="stat-card"><strong><?php echo $stats['tours']; ?></strong><span>Tours</span></div>
        <div class="stat-card"><strong><?php echo $stats['bookings']; ?></strong><span>Reservas</span></div>
        <div class="stat-card"><strong><?php echo $stats['clients']; ?></strong><span>Clientes</span></div>
    </div>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>