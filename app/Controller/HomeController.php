<?php

namespace Juns\Blog\Controller;

class HomeController
{
    public function index()
    {
        view("home");
    }

    public function hello()
    {
        echo "hellow";
    }
    public function admin()
    {
        view("admin/admin");
    }
    public function adminLogin()
    {
        view("admin/login");
    }
    public function dashboard()
    {
        if (empty($_SESSION['username'])) {
            header("Location: /");
        }
        view('dashboard', ['title' => 'Dashboard']);
    }
}

// class HomeController {
//     public function index() {
//         view("home");
//     }
// }
