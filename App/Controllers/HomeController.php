<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        try {
            // Prepare data for the homepage
            $pageTitle = 'Homepage';
            $welcomeMessage = 'Welcome to Intelboard';

            // Render the home view located in App/Views/home.php
            $this->view('home', [
                'pageTitle' => $pageTitle,
                'message' => $welcomeMessage,
            ]);
        } catch (\Throwable $e) { // Use \Throwable to catch both Errors and Exceptions
            // Log the error (replace with a proper logging mechanism in production)
            error_log($e->getMessage());

            // Display a generic error message to the user
            $this->view('error', [
                'pageTitle' => 'Error',
                'message' => 'An error occurred while processing your request.',
            ]);
        }
    }
}