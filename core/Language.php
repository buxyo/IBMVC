<?php

declare(strict_types=1);

namespace Core;

class Language
{
    private array $translations = [];

    public function __construct(string $lang = 'en')
    {
        $file = __DIR__ . '/../App/lang/' . $lang . '/messages.php';

        if (is_readable($file)) { // Use is_readable for better validation
            $this->translations = include $file;
        } else {
            // Log error and use fallback language
            error_log("Language file not found: $file. Falling back to default language.");
            $fallbackFile = __DIR__ . '/../App/lang/en/messages.php';
            if (is_readable($fallbackFile)) {
                $this->translations = include $fallbackFile;
            } else {
                error_log("Fallback language file not found: $fallbackFile.");
            }
        }
    }

    public function get(string $key): string
    {
        // Use htmlspecialchars to sanitize output, preventing potential XSS issues
        return htmlspecialchars($this->translations[$key] ?? $key, ENT_QUOTES, 'UTF-8');
    }
}