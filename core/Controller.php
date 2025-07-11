<?php

declare(strict_types=1);

namespace Core;

class Controller
{
    protected function view(string $view, array $data = []): void
    {
        $viewPath = __DIR__ . '/../App/Views/' . $view . '.php';

        if (is_readable($viewPath)) {
            // Safely pass data to the view
            extract($data, EXTR_SKIP); // Use extract with EXTR_SKIP to avoid overwriting variables
            require $viewPath;
        } else {
            // Log error and send HTTP response code
            error_log("View not found: $viewPath");
            http_response_code(404);
            echo "Error: View not found.";
        }
    }

    protected function loadModel(string $model)
    {
        $modelClass = 'App\\Models\\' . $model;
        if (class_exists($modelClass)) {
            return new $modelClass();
        }

        // Log error and send HTTP response code
        error_log("Model not found: $modelClass");
        http_response_code(500);
        echo "Error: Model not found.";
        return null;
    }

    protected function model(string $model)
    {
        return $this->loadModel($model);
    }

    protected function loadLanguage(string $lang = 'en'): Language
    {
        return new Language($lang);
    }
}