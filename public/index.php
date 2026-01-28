<?php


session_start();
require_once __DIR__ . "/../vendor/autoload.php";
require __DIR__ . '/../config/database.php';

use Juns\Blog\App\Router;
use Juns\Blog\Controller\UserController;
use Juns\Blog\Controller\HomeController;
use Juns\Blog\Controller\ArticleController;


Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/hello', HomeController::class, 'hello');
Router::add('GET', '/dashboard', HomeController::class, 'dashboard');
Router::add('GET', '/logout', UserController::class, 'logout');
Router::add('GET', '/article', ArticleController::class, 'index');
Router::add('GET', '/login', UserController::class, 'index');
Router::add('POST', '/user-login', UserController::class, 'login_auth');
Router::add('GET', '/view-article', ArticleController::class, 'viewArticle');
Router::add('GET', '/add-article', ArticleController::class, 'showAddForm');
Router::add('POST', '/add-article', ArticleController::class, 'addArticle');
Router::run();
