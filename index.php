<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/app/controllers/HomeController.php';
require_once __DIR__ . '/app/controllers/AdminController.php';
require_once __DIR__ . '/app/controllers/TourController.php';
require_once __DIR__ . '/app/controllers/AuthController.php';

$page = 'home';
if (isset($_GET['page']) && $_GET['page'] !== '') {
    $page = trim($_GET['page'], '/');
} else {
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    if ($basePath !== '') {
        $requestUri = preg_replace('#^' . preg_quote($basePath, '#') . '#', '', $requestUri);
    }
    $requestUri = trim($requestUri, '/');

    if ($requestUri !== '') {
        $page = $requestUri;
    }
}

switch (true) {
    case $page === 'admin':
        $controller = new AdminController();
        $controller->index();
        break;
    case $page === 'clients':
        $controller = new AdminController();
        $controller->clients();
        break;
    case $page === 'tours_admin':
        $controller = new AdminController();
        $controller->tours();
        break;
    case $page === 'bookings':
        $controller = new AdminController();
        $controller->bookings();
        break;
    case $page === 'destinos':
        $controller = new AdminController();
        $controller->destinos();
        break;
    case $page === 'users':
        $controller = new AdminController();
        $controller->users();
        break;
    case $page === 'settings':
        $controller = new AdminController();
        $controller->settings();
        break;
    case $page === 'catalog':
        $controller = new TourController();
        $controller->catalog();
        break;
    case preg_match('#^tour/([0-9]+)$#', $page, $matches) === 1:
        $controller = new TourController();
        $controller->detail((int) $matches[1]);
        break;
    case $page === 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case $page === 'register':
        $controller = new AuthController();
        $controller->register();
        break;
    case $page === 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case $page === 'home':
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}
