<?php 
namespace Juns\Blog\Controller;
use Juns\Blog\Models;
use Juns\Blog\Models\User;

class UserController{
    public function index(){
        view("login");
    }
    
    public function login(){
        require __DIR__. '/../../config/database.php';
        // get user input
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;


        if(empty($username) || empty($password)){
            // echo "kosong";
            header('Location: /login');
            return false;
        }

        $user = new User(); 
        $result = $user->cekLogin($username, $password);

        if($result){
            $_SESSION['username'] = $username;
            // echo "berhasil login";
            header('Location: /');
            exit;
        }else{

            header('Location: /login');
            exit;
            }       
            return;
    }
}