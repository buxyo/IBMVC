<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;

class HomeModel extends Model
{
    public function getWelcomeMessage(): string
    {
        try {
            // Simulating future database or API call
            // Example: $message = $this->db->query("SELECT message FROM welcome_table")->fetchColumn();
            $message = "Welcome to IBMVC from HomeModel!";
            return $message;
        } catch (\Throwable $e) { // Use \Throwable to catch both Errors and Exceptions
            // Log the error
            error_log("Error fetching welcome message: " . $e->getMessage());
            return "An error occurred while fetching the welcome message.";
        }
    }
}