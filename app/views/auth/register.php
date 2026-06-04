<?php require __DIR__ . '/../partials/auth_header.php'; ?>
<section class="auth-page auth-background">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-top">
                <div class="brand-icon">📍</div>
                <div>
                    <h1>ExploreTuTumbes</h1>
                    <p>Crea tu cuenta y comienza a explorar</p>
                </div>
            </div>
            <div class="auth-box">
                <h2>Crear Cuenta</h2>
                <p class="auth-subtitle">Completa el formulario para registrarte en nuestra plataforma</p>
                <form action="<?php echo route('register'); ?>" method="post" class="auth-form">
                    <?php if (!empty($error)): ?>
                        <div class="auth-error"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    <div class="auth-grid">
                        <label>
                            Nombre Completo*
                            <input type="text" name="name" value="<?php echo htmlspecialchars($old['name'] ?? ''); ?>" placeholder="Juan Pérez" required>
                        </label>
                        <label>
                            Teléfono
                            <input type="tel" name="phone" value="<?php echo htmlspecialchars($old['phone'] ?? ''); ?>" placeholder="+51 987 654 321">
                        </label>
                    </div>
                    <label>
                        Correo Electrónico*
                        <input type="email" name="email" value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>" placeholder="tu@email.com" required>
                    </label>
                    <div class="auth-grid">
                        <label>
                            Contraseña*
                            <input type="password" name="password" placeholder="********" required>
                        </label>
                        <label>
                            Confirmar Contraseña*
                            <input type="password" name="password_confirm" placeholder="********" required>
                        </label>
                    </div>
                    <p class="auth-hint">Mínimo 8 caracteres</p>
                    <label class="auth-checkbox">
                        <input type="checkbox" name="terms" required>
                        Acepto los <a href="#">términos y condiciones</a> y la <a href="#">política de privacidad</a>
                    </label>
                    <label class="auth-checkbox">
                        <input type="checkbox" name="offers">
                        Quiero recibir ofertas exclusivas y noticias sobre destinos por correo
                    </label>
                    <button type="submit" class="button button-primary">Crear Cuenta</button>
                </form>
                <div class="auth-divider"><span>O regístrate con</span></div>
                <div class="auth-social">
                    <a class="auth-social-btn" href="#">Google</a>
                    <a class="auth-social-btn" href="#">Facebook</a>
                </div>
                <p class="auth-register">¿Ya tienes una cuenta? <a href="<?php echo route('login'); ?>">Inicia sesión aquí</a></p>
                <a class="auth-back" href="<?php echo route('home'); ?>">← Volver al inicio</a>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/../partials/auth_footer.php'; ?>