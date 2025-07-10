<?php

declare(strict_types=1);

// Simple PSR-4 style autoloader
spl_autoload_register(function ($class) {
    $base_dir = __DIR__ . '/../app/';
    $core_dir = __DIR__ . '/';

    $class = str_replace('\\', '/', $class);

    if (file_exists($base_dir . $class . '.php')) {
        require_once $base_dir . $class . '.php';
    } elseif (file_exists($core_dir . $class . '.php')) {
        require_once $core_dir . $class . '.php';
    }
});
