<?php require __DIR__ . '/../partials/header.php'; ?>
<div class="admin-layout">
    <?php require __DIR__ . '/../partials/nav_admin.php'; ?>
    <section class="container admin-dashboard">
        <div class="dashboard-hero">
            <div>
                <p class="page-subtitle">Panel de Control</p>
                <h1>Bienvenido al sistema de gestión de ExploreTuTumbes</h1>
                <p class="page-description">Revisa ventas recientes, reservas activas y administra destinos, tours y usuarios desde un solo lugar.</p>
            </div>
            <div class="hero-badge">Panel administrativo</div>
        </div>

        <div class="dashboard-metrics">
            <article class="metric-card">
                <span>Total de ventas</span>
                <strong>$1,350</strong>
                <p>+12.5% vs mes anterior</p>
            </article>
            <article class="metric-card">
                <span>Reservas activas</span>
                <strong><?php echo $stats['bookings']; ?></strong>
                <p>En proceso o confirmadas</p>
            </article>
            <article class="metric-card">
                <span>Nuevos usuarios</span>
                <strong><?php echo $stats['clients']; ?></strong>
                <p>Este mes</p>
            </article>
            <article class="metric-card">
                <span>Tour más vendido</span>
                <strong>Punta Sal Paraíso</strong>
                <p>$960 en ventas</p>
            </article>
        </div>

        <div class="dashboard-body">
            <section class="dashboard-card sales-card">
                <div class="card-header">
                    <h2>Tendencia de Ventas (Últimos 5 meses)</h2>
                </div>
                <div class="chart-placeholder">
                    <div class="chart-axis">
                        <span>0</span>
                        <span>6500</span>
                        <span>13000</span>
                        <span>19500</span>
                        <span>26000</span>
                    </div>
                    <div class="chart-area"></div>
                </div>
            </section>

            <section class="dashboard-card bookings-card">
                <div class="card-header card-header-space">
                    <h2>Reservas recientes</h2>
                    <a class="button-link" href="<?php echo route('bookings'); ?>">Ver todas</a>
                </div>
                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Tour</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentBookings as $booking): ?>
                                <tr>
                                    <td>B00<?php echo $booking->id; ?></td>
                                    <td><?php echo $booking->clientName; ?></td>
                                    <td><?php echo $booking->tourName; ?></td>
                                    <td><?php echo date('j/n/Y', strtotime($booking->date)); ?></td>
                                    <td><span class="status-pill status-paid">Pagado</span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
</div>
<?php require __DIR__ . '/../partials/footer.php'; ?>
