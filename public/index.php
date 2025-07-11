<?php

declare(strict_types=1);

// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Autoload classes
require_once __DIR__ . '/../core/autoload.php';

// Load configuration
require_once __DIR__ . '/../config/config.php';

use Core\Router;

$router = new Router();

// Example home route
$router->get('/', 'HomeController@index');

// ✅ Auth routes
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@handleLogin');
$router->get('/logout', 'AuthController@logout');

// Add route for drivers page
$router->get('/drivers', 'DriversController@index', ['viewPath' => 'Drivers/drivers']);
$router->get('/addDriver', 'DriversController@addDriver', ['viewPath' => 'Drivers/add_driver']);

// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Example: Set a cookie for user preferences
if (!isset($_COOKIE['theme'])) {
    setcookie('theme', 'dark', time() + (86400 * 30), '/'); // Expires in 30 days
}

// Redirect to login if not authenticated
if (!isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] !== '/login') {
    header('Location: /login');
    exit;
}

// Dispatch the request
try {
    $router->dispatch($_SERVER['REQUEST_URI']);
} catch (Throwable $e) {
    // Log errors and respond with a generic error message
    error_log($e->getMessage());
http_response_code(500);
echo "Error: " . $e->getMessage();
}
