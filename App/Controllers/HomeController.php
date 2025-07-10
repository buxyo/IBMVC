<?php

// File: App/Controllers/HomeController.php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $message = "Welcome to IBMVC!";
        $this->view('home', ['message' => $message]);
    }
}
