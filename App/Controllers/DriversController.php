<?php

namespace App\Controllers;

use Core\Controller;

class DriversController extends Controller
{
    public function index()
    {
        $driversModel = $this->model('DriversModel');
        $drivers = $driversModel->getAllDrivers();

        $this->view('drivers', ['drivers' => $drivers, 'pageTitle' => 'Drivers']);
    }
}
