<?php

use Juns\Blog\Controller\ImageController;
use Juns\Blog\App\Router;
use Juns\Blog\Controller\AdminController;
use Juns\Blog\Controller\UserController;
use Juns\Blog\Controller\HomeController;
use Juns\Blog\Controller\ArticleController;


session_start();
$isLogin = isset($_SESSION['username']);

require_once __DIR__ . "/../vendor/autoload.php";
require __DIR__ . '/../config/database.php';



if ($isLogin) {
    Router::add('GET', '/dashboard', AdminController::class, 'dashboard');
    Router::add('GET', '/edit-article', ArticleController::class, 'showEditForm');
    Router::add('POST', '/article/edit-article', ArticleController::class, 'editArticle');
    Router::add('GET', '/article/add-article', ArticleController::class, 'showAddForm');
    Router::add('POST', '/article/add-article', ArticleController::class, 'addArticle');
    Router::add('GET', '/article/delete-article', ArticleController::class, 'deleteArticle');
    
    // Settings Routes
    Router::add('GET', '/settings', UserController::class, 'settings');
    Router::add('POST', '/user/update-password', UserController::class, 'updatePassword');
}
Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/contact', HomeController::class, 'contact');
Router::add('GET', '/logout', UserController::class, 'logout');
Router::add('GET', '/article', ArticleController::class, 'index');
Router::add('GET', '/login', UserController::class, 'index');
Router::add('POST', '/user-login', UserController::class, 'login_auth');
Router::add('GET', '/article/view-article', ArticleController::class, 'viewArticle');
Router::add('GET', '/image', ImageController::class, 'show');
Router::add('GET', '/image-profile', ImageController::class, 'showProfile');


Router::run();
