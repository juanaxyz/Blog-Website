<?php

namespace Juns\Blog\Controller;

use Juns\Blog\Models\Article;


class ArticleController
{
    public function index()
    {
        view("article", ['title' => 'Articles']);
        // return __DIR__ . "/../views/article.php";
    }


    public function showAddForm()
    {
        view('addArticle', ['title' => 'Tambah Artikel GBlog']);
    }
    public function handleFiles()
    {
        $file_name = $_FILES['gambar']['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        // var_dump($file_type);
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $file_size = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $validExt = ['jpg', 'png', 'jpeg'];

        if ($error || !in_array($ext, $validExt) || $file_size > 10 * 1024 * 1024) {

            header("Location: /add-article");
            exit;
        }

        move_uploaded_file($tmp_name, __DIR__ . '/../../public/assets/img/' . $file_name);
        return $file_name;
    }
    public function addArticle()
    {
        global $conn;

        // echo 'ini post article' . PHP_EOL;
        // var_dump($_POST);
        // var_dump($_FILES);

        // ambil posts
        $username = $_SESSION['username'];
        $judulArtikel = $_POST['judul'];
        $category = $_POST['category'];
        $slugArtikel = $_POST['slug'];
        $kontenArtikel = $_POST['konten'];
        $statusArtikel = $_POST['status'];

        // cek gambar
        $gambarArtikel = $this->handleFiles();

        $addPost = new Article($conn);
        $result = $addPost->addNewArticle([
            'username' => $username,
            'category' => $category,
            'judul' => $judulArtikel,
            'slug' => $slugArtikel,
            'konten' => $kontenArtikel,
            'status' => $statusArtikel,
            'gambar' => $gambarArtikel
        ]);

        // var_dump($addPost);
        if (!$result['success']) {
            // echo "GAGAL" . PHP_EOL;
            die("Gagal tambah artikel: " . $result['error']);
        }
        echo "Berhasil menambah artikel" . $result['insert_id'];
    }



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

    public function getCategories()
    {
        global $conn; // ATAU ambil dari container
        // $categories = [];
        $categorie = new Article($conn);
        $data = $categorie->getAllCategories();


        return $data;
    }

    public function getPost()
    {
        global $conn;
        $posts = [];

        $article = new Article($conn);
        $data = $article->getAllPosts();
        while ($row = $data->fetch_assoc()) {
            $posts[] = $row;
        }
        return $posts;
    }
}
