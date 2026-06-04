<?php
// Configuración básica del proyecto
define('BASE_URL', '/ExploreTumbes_MCV');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'exploreT_prueba2');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8mb4');

// Iniciar sesión para autenticación
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function db() {
    static $pdo = null;

    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            // Mostrar error amigable y detener la ejecución en desarrollo
            die('Error de conexión a la base de datos: ' . $e->getMessage());
        }
    }

    return $pdo;
}

function auth_user() {
    return $_SESSION['auth'] ?? null;
}

function is_admin() {
    $auth = auth_user();
    return $auth && isset($auth['type']) && $auth['type'] === 'usuario';
}

function is_client() {
    $auth = auth_user();
    return $auth && isset($auth['type']) && $auth['type'] === 'cliente';
}

function require_auth($type = null) {
    if (!auth_user()) {
        header('Location: ' . route('login'));
        exit;
    }

    if ($type === 'usuario' && !is_admin()) {
        header('Location: ' . route('home'));
        exit;
    }

    if ($type === 'cliente' && !is_client()) {
        header('Location: ' . route('login'));
        exit;
    }
}

function logout() {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'],
            $params['secure'], $params['httponly']
        );
    }
    session_destroy();
}

function view($path, $data = []) {
    extract($data);
    require __DIR__ . '/app/views/' . $path;
}

function asset($file) {
    return BASE_URL . '/public/' . ltrim($file, '/');
}

function route($path = '') {
    return BASE_URL . '/' . trim($path, '/');
}
