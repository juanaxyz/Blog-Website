<?php

namespace Juns\Blog\Controller;

use Juns\Blog\Models\Article;

use Exception;

class AdminController
{
    public function dashboard()
    {
        global $conn;
        $username = $_SESSION['username'];
        $posts = new Article($conn);

        if (empty($_SESSION['username'])) {
            header("Location: /");
        }

        $totalPost = $posts->getAllPostsMixed($username);

        $totalPost = $totalPost->num_rows;

        $totalCategories = $posts->getAllCategories();
        $totalCategories = sizeof($totalCategories);

        $artikel = [];
        $data = $posts->getAllPostsMixed($username);
        while ($row = $data->fetch_assoc()) {
            $artikel[] = $row;
        }


        // var_dump($artikel);
        // exit;


        view('dashboard', [
            'title' => 'Dashboard',
            'totalPost' => $totalPost,
            'totalCategory' => $totalCategories,
            'artikel' => $artikel
        ]);
    }
    public function showEditForm()
    {
        global $conn;
        $username = $_SESSION['username'];
        $postID = $_GET['id'];
        $article = new Article($conn);
        $post = $article->getOnePost($username, $postID);

        // var_dump($post);
        // exit;
        if ($post->num_rows > 0) {
            view('article/edit-article', [
                'title' => 'Edit Article',
                'posts' => $post
            ]);
        } else {

            $_SESSION['error'] = 'data tidak ditemukan';
            header("Location: dashboard");
        }
    }
}
