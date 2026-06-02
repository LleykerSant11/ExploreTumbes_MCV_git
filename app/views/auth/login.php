<?php require __DIR__ . '/../partials/auth_header.php'; ?>
<section class="auth-page auth-background">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-top">
                <div class="brand-icon">📍</div>
                <div>
                    <h1>ExploreTuTumbes</h1>
                    <p>Inicia sesión para continuar</p>
                </div>
            </div>
            <div class="auth-box">
                <h2>Iniciar Sesión</h2>
                <p class="auth-subtitle">Ingresa tus credenciales para acceder a tu cuenta.</p>
                <form action="<?php echo route('login'); ?>" method="post" class="auth-form">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" placeholder="tu@email.com" required>

                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="********" required>

                    <div class="auth-row">
                        <label class="auth-checkbox">
                            <input type="checkbox" name="remember">
                            Recordarme
                        </label>
                        <a class="link-secondary" href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button type="submit" class="button button-primary">Iniciar Sesión</button>
                </form>
                <div class="auth-divider"><span>O continúa con</span></div>
                <div class="auth-social">
                    <a class="auth-social-btn" href="#">Google</a>
                    <a class="auth-social-btn" href="#">Facebook</a>
                </div>
                <p class="auth-register">¿No tienes una cuenta? <a href="<?php echo route('register'); ?>">Regístrate aquí</a></p>
                <div class="auth-info">
                    <p class="auth-info-title">Credenciales de prueba:</p>
                    <p><strong>Admin:</strong> admin@exploretumbes.com</p>
                    <p><strong>Cliente:</strong> cualquier otro email</p>
                </div>
                <a class="auth-back" href="<?php echo route('home'); ?>">← Volver al inicio</a>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/../partials/auth_footer.php'; ?>