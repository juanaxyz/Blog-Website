<?php

function view(string $view, array $data = [])
{
    extract($data);
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/' . $view . '.php';
}
