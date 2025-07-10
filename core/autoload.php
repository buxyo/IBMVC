<?php

// File: core/autoload.php

declare(strict_types=1);

// Clean PSR-4 autoloader for IBMVC
spl_autoload_register(function ($class) {
    $class_path = str_replace('\\', '/', $class) . '.php';

    $paths = [
        __DIR__ . '/../' . $class_path,        // App/*
        __DIR__ . '/' . basename($class_path), // Core/*
    ];

    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    echo "<pre>Autoload failed for: $class (tried: " . implode(', ', $paths) . ")</pre>";
});
