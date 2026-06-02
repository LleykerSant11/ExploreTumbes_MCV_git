<?php
// Configuración básica del proyecto
define('BASE_URL', '/ExploreTumbes_MCV');

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
