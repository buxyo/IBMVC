<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use App\Models\HomeModel;

class HomeController extends Controller
{
    public function index(): void
    {
        try {
            // Fetching the message from the model
            $homeModel = new HomeModel();
            $message = $homeModel->getWelcomeMessage();

            // Rendering the view
            $this->view('home', ['message' => $message]);
        } catch (\Throwable $e) { // Use \Throwable to catch both Errors and Exceptions
            // Log the error (replace with a proper logging mechanism in production)
            error_log($e->getMessage());

            // Display a generic error message to the user
            $this->view('error', ['message' => 'An error occurred while processing your request.']);
        }
    }
}