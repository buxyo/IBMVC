<?php

declare(strict_types=1);

// Database configuration
define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_NAME', getenv('DB_NAME') ?: 'ibmvc');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '000000xz');
define('DB_CHARSET', 'utf8mb4');
define('DB_DSN', sprintf(
    'mysql:host=%s;dbname=%s;charset=%s',
    DB_HOST,
    DB_NAME,
    DB_CHARSET
));

// Site configuration
define('BASE_URL', getenv('BASE_URL') ?: 'https://intelboard.ca');
define('APP_NAME', getenv('APP_NAME') ?: 'IBMVC');

// Define paths for better consistency
define('APP_PATH', dirname(__DIR__) . '/App');
define('VIEW_PATH', APP_PATH . '/Views');
define('LANG_PATH', APP_PATH . '/lang');

// Error reporting (disable display in production)
if (getenv('ENV') === 'production') {
    ini_set('display_errors', '0');
    error_reporting(0);
} else {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
}