<?php

function view(string $view, array $data = [])
{
    extract($data);
    if ($view !== 'login') {
        require __DIR__ . '/../views/layouts/header.php';
    }
    require __DIR__ . '/../views/' . $view . '.php';
}
