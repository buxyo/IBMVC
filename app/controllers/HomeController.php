<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\Language;

$lang = new Language('en'); // or 'fr' for French

class HomeController extends Controller
{
    public function index(): void
    {
        $lang = new Language('en'); // or 'fr' for French
        $message = $lang->get('welcome');
        $this->view('home', ['message' => $message]);
    }
}
