<?php

use Juns\Blog\Controller\UserController;
session_start();
require_once __DIR__ . "/../vendor/autoload.php";
use Juns\Blog\App\Router;
use Juns\Blog\Controller\HomeController;
use Juns\Blog\Controller\ArticleController;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/hello', HomeController::class, 'hello');
Router::add('GET', '/article', ArticleController::class, 'index');
Router::add('GET', '/login', UserController::class, 'index');
Router::add('POST', '/user-login', UserController::class, 'login');

Router::run();
?>
