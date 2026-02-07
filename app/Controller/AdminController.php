<?php

namespace Juns\Blog\Controller;
use Juns\Blog\Controller\ArticleController;



class AdminController
{
    public function dashboard()
    {
        $Article = new ArticleController();
        $data = $Article->getAllPosts();

        // var_dump($data);
        // exit;
        view('dashboard', $data);
    }
    
}
