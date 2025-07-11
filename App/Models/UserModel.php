<?php

namespace App\Models;

use Core\Model;
use PDO;

class UserModel extends Model
{
    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Debug logging
        error_log("Query executed: SELECT * FROM users WHERE email = $email");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            error_log("No user found with email: $email");
        } else {
            error_log("User found: " . json_encode($result));
        }

        return $result;
    }
}
