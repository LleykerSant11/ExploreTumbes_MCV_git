<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de Turismo</title>
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
</head>
<body>
<header class="main-header">
    <div class="container header-inner">
        <div class="site-brand">
            <div class="brand-icon">📍</div>
            <div>
                <a class="brand-name" href="<?php echo route('home'); ?>">ExploreTumbes</a>
                <p class="brand-tag">Región Tumbes</p>
            </div>
        </div>
        <nav class="main-nav">
            <a href="<?php echo route('home'); ?>">Inicio</a>
            <a href="<?php echo route('catalog'); ?>">Tours</a>
            <a href="#destinos">Destinos</a>
            <a href="#paquetes">Paquetes</a>
        </nav>
        <div class="auth-actions">
            <a class="btn-transparent" href="<?php echo route('login'); ?>">Ingresar</a>
            <a class="button button-primary" href="<?php echo route('register'); ?>">Registrarse</a>
        </div>
    </div>
</header>
<main class="page-container">
