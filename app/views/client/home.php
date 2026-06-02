<?php require __DIR__ . '/../partials/header.php'; ?>
<section class="hero">
    <div class="container hero-content">
        <span class="hero-badge">🌴 Región Tumbes - Norte del Perú</span>
        <h1>Descubre las Maravillas de <span>Tumbes</span></h1>
        <p class="hero-copy">Playas paradisíacas, manglares únicos y aventura en el norte del Perú. Tours con guías certificados y los mejores precios de la región.</p>
        <div class="hero-card">
            <div class="hero-tabs">
                <button class="tab active" type="button">Todos los Tours</button>
                <button class="tab" type="button">Full Day</button>
                <button class="tab" type="button">Aventura</button>
            </div>
            <form class="search-form" action="<?php echo route('catalog'); ?>" method="get">
                <div class="search-row">
                    <label>
                        Destino
                        <input type="text" placeholder="¿A dónde quieres ir?">
                    </label>
                    <label>
                        Fecha
                        <input type="date">
                    </label>
                    <label>
                        Pasajeros
                        <select>
                            <option>2 personas</option>
                            <option>4 personas</option>
                            <option>6 personas</option>
                        </select>
                    </label>
                </div>
                <button class="button button-primary" type="submit">Buscar Tours</button>
            </form>
        </div>
    </div>
</section>
<section id="destinos" class="container section section-destinos">
    <div class="section-header">
        <span class="section-badge">✨ Tours Destacados</span>
        <h2>Destinos de Tumbes</h2>
        <p>Explora los rincones más bellos de la región: playas, manglares, ríos y naturaleza salvaje.</p>
    </div>
    <div class="card-grid featured-tours">
        <?php foreach ($tours as $tour): ?>
            <article class="tour-card">
                <div class="tour-card-media tour-card-image-<?php echo $tour->id; ?>">
                    <div class="tour-card-price">S/ <?php echo $tour->price; ?></div>
                </div>
                <div class="tour-card-body">
                    <div class="tour-card-meta">
                        <span class="tour-card-tag"><?php echo $tour->location; ?></span>
                    </div>
                    <h3><?php echo $tour->title; ?></h3>
                    <p><?php echo $tour->description; ?></p>
                    <div class="tour-card-footer">
                        <span>1 día</span>
                        <a class="button button-secondary" href="<?php echo route('tour/' . $tour->id); ?>">Ver Detalles</a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<section class="section section-why">
    <div class="container">
        <span class="section-badge section-badge-alt">🏅 Calidad Garantizada</span>
        <h2>¿Por qué elegirnos?</h2>
        <p>Somos líderes en turismo regional con más de 10 años de experiencia.</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🎧</div>
                <h3>Soporte 24/7</h3>
                <p>Asistencia inmediata en cualquier momento de tu viaje.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💳</div>
                <h3>Pagos Seguros</h3>
                <p>Transacciones protegidas con encriptación de última generación.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎖️</div>
                <h3>Guías Certificados</h3>
                <p>Profesionales expertos con licencia oficial de turismo.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>Seguridad Total</h3>
                <p>Seguro de viaje incluido en todos nuestros paquetes.</p>
            </div>
        </div>
    </div>
</section>
<section class="section section-stats">
    <div class="container">
        <span class="section-badge section-badge-alt">📊 Nuestros Números</span>
        <h2>Líderes en Turismo Tumbesino</h2>
        <div class="stats-cards">
            <div class="stat-box stat-blue">
                <div class="stat-icon">👥</div>
                <strong>15,000+</strong>
                <span>Viajeros Satisfechos</span>
            </div>
            <div class="stat-box stat-green">
                <div class="stat-icon">⭐</div>
                <strong>4.9/5</strong>
                <span>Calificación Promedio</span>
            </div>
            <div class="stat-box stat-gold">
                <div class="stat-icon">📈</div>
                <strong>10+</strong>
                <span>Años de Experiencia</span>
            </div>
        </div>
    </div>
</section>
<section class="section section-cta">
    <div class="container cta-box">
        <div class="cta-symbol">🌎</div>
        <h2>¿Listo para tu Próxima Aventura?</h2>
        <p>Descubre la belleza natural de Tumbes con nuestros tours exclusivos. ¡Reserva hoy y vive una experiencia inolvidable!</p>
        <div class="cta-actions">
            <a class="button button-primary" href="<?php echo route('catalog'); ?>">Explorar Tours</a>
            <a class="button btn-transparent" href="<?php echo route('register'); ?>">Crear Cuenta</a>
        </div>
    </div>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>