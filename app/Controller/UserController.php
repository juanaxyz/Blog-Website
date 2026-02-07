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
    public function settings()
    {
        if (empty($_SESSION['username'])) {
            header('Location: /login');
            exit;
        }
        view('settings', ['title' => 'Pengaturan Akun']);
    }

    public function updatePassword()
    {
        global $conn;
        
        if (empty($_SESSION['username'])) {
            header('Location: /login');
            exit;
        }

        $username = $_SESSION['username'];
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (empty($newPassword) || empty($confirmPassword)) {
            $_SESSION['error'] = 'Password tidak boleh kosong';
            header('Location: /settings');
            exit;
        }

        if ($newPassword !== $confirmPassword) {
            $_SESSION['error'] = 'Konfirmasi password tidak cocok';
            header('Location: /settings');
            exit;
        }

        if (strlen($newPassword) < 6) {
             $_SESSION['error'] = 'Password minimal 6 karakter';
             header('Location: /settings');
             exit;
        }

        $user = new User($conn);
        if ($user->updatePassword($username, $newPassword)) {
            $_SESSION['success'] = 'Password berhasil diperbarui';
            header('Location: /settings');
        } else {
            $_SESSION['error'] = 'Gagal memperbarui password';
            header('Location: /settings');
        }
        exit;
    }

    private function signup_auth() {}
}
