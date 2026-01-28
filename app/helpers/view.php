<?php

function view(string $view, array $data = [])
{
    extract($data);
    if ($view !== 'login' && $view !== 'admin/login') {
        require __DIR__ . '/../views/layouts/header.php';
    }
    // var_dump($view !== "admin/login");
    require __DIR__ . '/../views/' . $view . '.php';
}
