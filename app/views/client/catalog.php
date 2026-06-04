<?php require __DIR__ . '/../partials/header.php'; ?>
<?php require __DIR__ . '/../partials/nav_client.php'; ?>
<section class="container catalog-page">
    <?php $tourCount = count($tours); ?>
    <div class="catalog-header">
        <div>
            <p class="section-badge">Explora Nuestros Tours</p>
            <h1><?php echo $tourCount; ?> tours disponibles</h1>
        </div>
        <div class="catalog-sort">
            <label>Ordenar por:</label>
            <select>
                <option>Más Popular</option>
                <option>Precio más bajo</option>
                <option>Precio más alto</option>
                <option>Duración</option>
            </select>
        </div>
    </div>

    <div class="catalog-grid">
        <aside class="catalog-filter">
            <div class="filter-panel sticky-filter">
                <div class="filter-body">
                <div class="filter-header">
                    <h2>Filtros</h2>
                    <a href="#" class="filter-clear">Limpiar todo</a>
                </div>
                <div class="filter-group">
                    <h3>Rango de Precio</h3>
                    <div class="price-range">
                        <input type="range" min="0" max="500" value="250">
                        <div class="range-labels">
                            <span>$0</span>
                            <span>$500</span>
                        </div>
                    </div>
                </div>

                <div class="filter-group">
                    <h3>Duración</h3>
                    <label><input type="checkbox"> 1 día</label>
                    <label><input type="checkbox"> 2 días</label>
                    <label><input type="checkbox"> 3 días</label>
                </div>

                <div class="filter-group">
                    <h3>Tipo de Actividad</h3>
                    <label><input type="checkbox"> Tours Full Day</label>
                    <label><input type="checkbox"> Paquetes Nacionales</label>
                    <label><input type="checkbox"> Aventura</label>
                </div>
                </div>
                </div>
            </div>
        </aside>

        <div class="catalog-list">
            <?php foreach ($tours as $index => $tour): ?>
                <article class="tour-card">
                    <div class="tour-card-media tour-card-image-<?php echo ($index % 3) + 1; ?>">
                        <div class="tour-card-price">S/ <?php echo $tour->price; ?></div>
                    </div>
                    <div class="tour-card-body">
                        <div class="tour-card-meta">
                            <span class="tour-card-tag">Eco-turismo</span>
                        </div>
                        <h3><?php echo $tour->title; ?></h3>
                        <p><?php echo $tour->location; ?></p>
                        <p><?php echo $tour->description; ?></p>
                        <div class="tour-card-footer">
                            <span>★★★★☆</span>
                            <span>1 día</span>
                        </div>
                        <a class="button button-secondary" href="<?php echo route('tour/' . $tour->id); ?>">Ver Detalles →</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require __DIR__ . '/../partials/footer.php'; ?>
