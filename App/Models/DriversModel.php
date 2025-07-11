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

    public function addDriver(array $data): bool
    {
        $stmt = $this->db->prepare("INSERT INTO drivers (full_name, nas, phone, driver_id, broker_id, added_by, status, date_created, date_joined) VALUES (:full_name, :nas, :phone, :driver_id, :broker_id, :added_by, 'active', NOW(), NOW())");

        return $stmt->execute([
            ':full_name' => $data['full_name'],
            ':nas' => $data['nas'],
            ':phone' => $data['phone'],
            ':driver_id' => $data['driver_id'],
            ':broker_id' => $data['broker_id'],
            ':added_by' => $data['added_by'],
        ]);
    }
}
