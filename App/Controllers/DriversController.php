<?php

namespace App\Controllers;

use Core\Controller;

class DriversController extends Controller
{
    public function index()
    {
        $driversModel = $this->model('DriversModel');
        $drivers = $driversModel->getAllDrivers();

        $this->view('Drivers/drivers', ['drivers' => $drivers, 'pageTitle' => 'Drivers']);
    }

    public function addDriver()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $driversModel = $this->model('DriversModel');

            $data = [
                'full_name' => $_POST['full_name'] ?? '',
                'nas' => $_POST['nas'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'driver_id' => $_POST['driver_id'] ?? '',
                'added_by' => $_SESSION['user_id'] ?? 0, // Assuming `user_id` is stored in session
            ];

            $result = $driversModel->addDriver($data);

            if ($result) {
                header('Location: /drivers');
                exit;
            } else {
                $this->view('Drivers/add_driver', ['pageTitle' => 'Add Driver', 'error' => 'Failed to add driver.']);
            }
        } else {
            $this->view('Drivers/add_driver', ['pageTitle' => 'Add Driver']);
        }
    }
}
