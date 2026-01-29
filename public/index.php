<?php

use Juns\Blog\Controller\ImageController;
use Juns\Blog\App\Router;
use Juns\Blog\Controller\UserController;
use Juns\Blog\Controller\HomeController;
use Juns\Blog\Controller\ArticleController;


session_start();
require_once __DIR__ . "/../vendor/autoload.php";
require __DIR__ . '/../config/database.php';




Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/dashboard', HomeController::class, 'dashboard');
Router::add('GET', '/logout', UserController::class, 'logout');
Router::add('GET', '/article', ArticleController::class, 'index');
Router::add('GET', '/login', UserController::class, 'index');
Router::add('POST', '/user-login', UserController::class, 'login_auth');
Router::add('GET', '/article/view-article', ArticleController::class, 'viewArticle');
Router::add('GET', '/article/add-article', ArticleController::class, 'showAddForm');
Router::add('POST', '/article/add-article', ArticleController::class, 'addArticle');
Router::add('GET', '/image', ImageController::class, 'show');
Router::add('GET', '/image-profile', ImageController::class, 'showProfile');


Router::run();
