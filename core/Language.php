<?php

declare(strict_types=1);

namespace Core;

class Language
{
    private array $translations = [];

    public function __construct(string $lang = 'en')
    {
        $file = __DIR__ . '/../app/lang/' . $lang . '/messages.php';
        if (file_exists($file)) {
            $this->translations = include $file;
        }
    }

    public function get(string $key): string
    {
        return $this->translations[$key] ?? $key;
    }
}
