<?php

namespace App\Models;

use Core\Model;
use PDO;

class DriversModel extends Model
{
    public function getAllDrivers()
    {
        $stmt = $this->db->query("SELECT * FROM drivers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
