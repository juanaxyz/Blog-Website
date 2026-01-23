<?php
namespace Juns\Blog\Controller;

class HomeController{
    public function index(){
    view("home");
    }

    public function hello(){
        echo "hellow";
    }

}

// class HomeController {
//     public function index() {
//         view("home");
//     }
// }
