<?php

// File: core/Controller.php

declare(strict_types=1);

namespace Core;

class Controller
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);
        $viewPath = __DIR__ . '/../App/Views/' . $view . '.php';

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "View not found: $viewPath";
        }
    }

    protected function loadModel(string $model)
    {
        $modelClass = 'App\\Models\\' . $model;
        if (class_exists($modelClass)) {
            return new $modelClass();
        }
        echo "Model not found: $modelClass";
        return null;
    }
}