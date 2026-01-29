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
        // get user input
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;


        if (empty($username) || empty($password)) {
            echo "<script>alert('login gagal username atau password kosong')</script>";
            header('Location: /login');
            return false;
        }

        $user = new User($conn);
        // $result = $user->cekLogin($username, $password);

        $result = $user->cekLogin($username, $password);
        if ($result) {
            $_SESSION['username'] = $username;
            // echo "berhasil login";
            header('Location: /');
            exit;
        } else {
            echo "<script>alert('login gagal username atau password salah')</script>";


            header('Location: /login');
            exit;
        }
        return;
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
