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
$router->dispatch($_SERVER['REQUEST_URI']);
