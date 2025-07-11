<?php

namespace App\Controllers;

require_once __DIR__ . '/../../core/Controller.php';

use Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        $lang = $this->loadLanguage();
        $this->view('auth/login', ['lang' => $lang]);
    }

    public function handleLogin()
    {
        session_start();
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($email === '' || $password === '') {
            $_SESSION['error'] = 'missing_fields';
            header('Location: /login');
            exit;
        }

        $userModel = $this->model('UserModel');
        $user = $userModel->getUserByEmail($email);

        if (!$user) {
            $_SESSION['error'] = 'email_not_found';
            header('Location: /login');
            exit;
        }

        if (!password_verify($password, $user['password'])) {
            $_SESSION['error'] = 'password_incorrect';
            header('Location: /login');
            exit;
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: /');
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
