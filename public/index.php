<?php
// public/index.php

// Load Database Config
require_once __DIR__ . '/../config/database.php';

// Simple Autoloader for Controllers and Models
spl_autoload_register(function ($class_name) {
    $controller_path = __DIR__ . '/../app/controllers/' . $class_name . '.php';
    $model_path = __DIR__ . '/../app/models/' . $class_name . '.php';

    if (file_exists($controller_path)) {
        require_once $controller_path;
    } elseif (file_exists($model_path)) {
        require_once $model_path;
    }
});

// Basic Query-String Routing
$url = isset($_GET['url']) ? $_GET['url'] : 'home';

switch ($url) {
    case 'siswa':
        $controller = new SiswaController();
        $controller->index();
        break;

    case 'siswa/tambah':
        $controller = new SiswaController();
        $controller->tambah();
        break;

    case 'home':
    default:
        // Render simple homepage or redirect to student list
        header('Location: index.php?url=siswa');
        exit;
}
