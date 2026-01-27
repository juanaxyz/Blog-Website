<?php

namespace Juns\Blog\Controller;

use Juns\Blog\Models\Article;


class ArticleController
{
    public function index()
    {
        view("article");
        // return __DIR__ . "/../views/article.php";
    }

    public function addArticle() {}

    public function viewArticle()
    {
        //ambil data dari database
        $blog_title = $_GET['title'];
        // echo $blog_title;

        global $conn; // ATAU ambil dari container
        $posts = [];
        $article = new Article($conn);
        $data = $article->cekTitle("Judul Artikel");

        $res = $article->cekTitle($blog_title);

        if ($res->num_rows <= 0) {
            echo "tidak ada blog tersebut";
            return;
        }

        while ($row = $res->fetch_assoc()) {
            $posts[] = $row;
        }


        // var_dump($res);

        view('view-article', compact('posts'));
    }
}
