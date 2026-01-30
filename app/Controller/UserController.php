<?php

namespace Juns\Blog\Controller;

use Juns\Blog\Models;
use Juns\Blog\Models\User;

class UserController
{
    public function index()
    {
        view("login");
    }

    public function login_auth()
    {
        global $conn;

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username === '' || $password === '') {
            header('Location: /login');
            exit;
        }

        $user = new User($conn);

        if ($user->cekLogin($username, $password)) {
            $_SESSION['username'] = $username;

            header('Location: /dashboard');
            exit;
        }

        // login gagal
        $_SESSION['error'] = 'Username atau password salah';
        header('Location: /login');
        exit;
    }
    public function signUp()
    {
        view('signup');
    }
    public function logout()
    {
        session_destroy();
        header('Location: /');
        exit;
    }
    private function signup_auth() {}
}
