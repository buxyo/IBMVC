<?php

declare(strict_types=1);

namespace Core;

use PDO;
use PDOException;

class Model
{
    protected PDO $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(
                DB_DSN,
                DB_USER,
                DB_PASS,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }
}
