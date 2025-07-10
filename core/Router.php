<?php

declare(strict_types=1);

namespace Core;

class Router
{
    private array $routes = [];

    public function get(string $uri, string $action): void
    {
        $this->routes['GET'][$this->trim($uri)] = $action;
    }

    public function post(string $uri, string $action): void
    {
        $this->routes['POST'][$this->trim($uri)] = $action;
    }

    public function dispatch(string $requestUri): void
    {
        $uri = $this->trim(parse_url($requestUri, PHP_URL_PATH));
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            exit;
        }

        [$controllerName, $methodName] = explode('@', $this->routes[$method][$uri]);

        $controllerClass = 'App\\Controllers\\' . $controllerName;

        if (!class_exists($controllerClass) || !method_exists($controllerClass, $methodName)) {
            http_response_code(500);
            echo "Controller or method not found.";
            exit;
        }

        $controller = new $controllerClass();
        call_user_func([$controller, $methodName]);
    }

    private function trim(string $uri): string
    {
        return '/' . trim($uri, '/');
    }
}
