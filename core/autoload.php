<?php

declare(strict_types=1);

// Clean PSR-4 autoloader for IBMVC
spl_autoload_register(function (string $class): void {
    $class_path = str_replace('\\', '/', $class) . '.php';

    $paths = [
        __DIR__ . '/../' . $class_path,        // App/*
        __DIR__ . '/' . basename($class_path), // Core/*
    ];

    foreach ($paths as $file) {
        if (is_readable($file)) { // Use is_readable for better validation
            require_once $file;
            return;
        }
    }

    error_log("Autoload failed for: $class (tried: " . implode(', ', $paths) . ")");
    echo "<pre>Autoload failed for: $class (check logs for details)</pre>"; // Hide file paths in the output
});