<?php

declare(strict_types=1);

// Autoload classes
require_once __DIR__ . '/../core/autoload.php';

// Load configuration
require_once __DIR__ . '/../config/config.php';

use Core\Router;

$router = new Router();

// Example route
$router->get('/', 'HomeController@index');

// Dispatch the request
try {
    $router->dispatch($_SERVER['REQUEST_URI']);
} catch (Throwable $e) {
    // Log errors and respond with a generic error message
    error_log($e->getMessage());
    http_response_code(500);
    echo "An error occurred while processing your request.";
}