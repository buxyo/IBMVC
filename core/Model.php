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
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Default fetch mode for better usability
                ]
            );
        } catch (PDOException $e) {
            // Log the error and provide a generic error message
            error_log("Database connection error: " . $e->getMessage());
            http_response_code(500);
            echo "An error occurred while connecting to the database.";
            exit; // Use exit instead of die for better clarity
        }
    }
}