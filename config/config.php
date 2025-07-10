<?php

declare(strict_types=1);

// Database configuration
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'ibmvc');
define('DB_USER', 'root');
define('DB_PASS', '000000xz');
define('DB_CHARSET', 'utf8mb4');
define('DB_DSN', 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET);

// Site configuration
define('BASE_URL', 'https://intelboard.ca');
define('APP_NAME', 'IBMVC');

// Error reporting (disable display in production)
ini_set('display_errors', '1');
error_reporting(E_ALL);
