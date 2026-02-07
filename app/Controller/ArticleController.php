<?php

namespace Juns\Blog\Controller;

use Exception;
use Juns\Blog\Models\Article;
use SebastianBergmann\Type\FalseType;

class ArticleController
{
    public function index()
    {
        global $conn;
        $article = new Article($conn);

        $keyword = $_GET['q'] ?? null;
        $category = $_GET['category'] ?? null;

        // Use the search method if there are filters, otherwise get all
        if ($keyword || $category) {
            $result = $article->searchPosts($keyword, $category);
        } else {
            $result = $article->getAllPosts();
        }

        $posts = [];
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }

        $categories = $article->getAllCategories();

        view("article", [
            'title' => 'Articles',
            'posts' => $posts,
            'categories' => $categories,
            'currentKeyword' => $keyword,
            'currentCategory' => $category
        ]);
        // return __DIR__ . "/../views/article.php";
    }


    public function showAddForm()
    {
        if (empty($_SESSION['username'])) {
            header('Location: /');
        };
        view('addArticle', ['title' => 'Tambah Artikel GBlog', 'listCategories' => $this->getCategories()]);
    }
    public function handleFiles(string $username, bool $required = false): ?string
    {


        $file      = $_FILES['gambar'];
        $ext       = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $tmp_name  = $file['tmp_name'];
        $file_size = $file['size'];

        $validExt = ['jpg', 'jpeg', 'png'];

        // kasus untuk edit article
        if (!$required) {
            // jika tidak ada file yang diupload
            if (!isset($_FILES['gambar']) || $_FILES['gambar']['error']) {
                return null;
            }
        }
        // kasus untuk add article
        if ($required) {
            // jika tidak ada file yang diupload
            if (!isset($_FILES['gambar'])) {
                return False;
            }


            // jika error upload
            if ($_FILES['gambar']['error']) {
                return False;
            }

            // jika tipe file salah

            if (!in_array($ext, $validExt)) {
                $_SESSION['error'] = 'Format gambar tidak valid';
                header("Location: /dashboard");

                return False;
            }
            // jika ukuran file terlalu besar

            if ($file_size > 10 * 1024 * 1024) {
                $_SESSION['error'] = 'Ukuran gambar maksimal 10MB';
                header("Location: /dashboard");
                return False;
            }
        }



        $baseDir = __DIR__ . '/../../storage/uploads/thumbnails/';
        if (!is_dir($baseDir)) {
            mkdir($baseDir, 0755, true);
        }

        // nama file unik + username
        $filename = uniqid('img_') . '.' . $ext;
        $target   = $baseDir . $filename;

        if (!move_uploaded_file($tmp_name, $target)) {
            throw new Exception('Upload gambar gagal');
        }

        // path yang disimpan ke DB
        return  $filename;
    }

    public function addArticle()
    {

        global $conn;
        // ambil posts
        $username = $_SESSION['username'];
        $judulArtikel = $_POST['judul'];
        $category = $_POST['category'];
        $slugArtikel = $_POST['slug'];
        $kontenArtikel = $_POST['konten'];
        $statusArtikel = $_POST['status'];

        // cek gambar
        $gambarArtikel = $this->handleFiles($username, true);
        if (!$gambarArtikel) {
            $_SESSION['error'] = "Gambar wajib diupload";
            header("Location: /dashboard");
            exit;
        }

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
        // tambah sweet alert lalu redirect ke dashboard
        $_SESSION['success'] = "Berhasil menambah artikel";
        header("Location: /dashboard");
    }


    public function editArticle()
    {
        global $conn;

        $article = new Article($conn);
        $username = $_SESSION['username'];
        // prioritas: pakai id dari form (hidden). fallback: cari berdasarkan judul (compat)
        $postID = intval($_POST['id'] ?? 0);
        if ($postID <= 0) {
            $result = $article->cekTitle($_POST['judul'] ?? '');
            $postID = $result->fetch_assoc()['id'] ?? 0;
        }

        // var_dump($postID);
        $data = [
            'id'       => $postID, // WAJIB ADA
            'username' => $username,
            'category' => $_POST['category'],
            'judul'    => $_POST['judul'],
            'slug'     => $_POST['slug'],
            'content'  => $_POST['konten'],
            'status'   => $_POST['status']
        ];

        // cek upload gambar
        $gambarBaru = $this->handleFiles($username);

        if ($gambarBaru) {
            $data['gambar'] = $gambarBaru; // hanya kalau upload
        }


        $result = $article->editPost($data);


        if (!$result['success']) {
            die("Gagal edit artikel: " . $result['error']);
        }


        header('Location: /dashboard');
    }
    public function deleteArticle()
    {
        global $conn;

        $article = new Article($conn);
        $username = $_SESSION['username'];
        $postID = intval($_GET['id'] ?? 0);
        if ($postID <= 0) {
            $_SESSION['error'] = 'ID artikel tidak valid';
            header("Location: /dashboard");
            return;
        }
        $result = $article->deletePost(["username" => $username, "id" => $postID]);
        if (!$result['success']) {
            die("Gagal hapus artikel: " . $result['error']);
        }
        $_SESSION['success'] = "Berhasil menghapus artikel";
        header("Location: /dashboard");
    }


    public function viewArticle()
    {
        //ambil data dari database
        $blog_title = $_GET['title'];
        // echo $blog_title;

        global $conn; // ATAU ambil dari container
        $posts = [];
        $username = $_SESSION['username'] ?? null;
        $article = new Article($conn);
        // $data = $article->cekTitle("Judul Artikel");

        $res = $article->cekTitle($blog_title);

        if (!$res) {
            echo "tidak ada blog tersebut";
            return;
        }
        if ($res) {
            $post_raw = $article->getOnePost($username, $res->fetch_assoc()['id']);

            // var_dump($post_raw);
            // exit;
            if ($post_raw && $post_raw->num_rows > 0) {
            // echo" true";   
            // exit;
                while ($row = $post_raw->fetch_assoc()) {
                    $posts[] = $row;
                }
            }
            
        }


        // var_dump($posts);
        // exit;

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
    public function showEditForm()
    {
        global $conn;
        $username = $_SESSION['username'];
        $postID = $_GET['id'];
        $article = new Article($conn);
        $post = $article->getOnePost($username, $postID);
        // ambil list kategori untuk form edit
        $listCategories = $article->getAllCategories();

        // var_dump($post);
        // exit;
        if ($post->num_rows > 0) {
            view('article/edit-article', [
                'id' => $postID,
                'title' => 'Edit Article',
                'posts' => $post,
                'listCategories' => $listCategories
            ]);
        } else {

            $_SESSION['error'] = 'data tidak ditemukan';
            header("Location: dashboard");
        }
    }
    public function getAllPosts()
    {
        global $conn;
        $username = $_SESSION['username'];
        $posts = new Article(conn: $conn);

        if (empty($_SESSION['username'])) {
            header(header: "Location: /");
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


        return [
            'totalPost' => $totalPost,
            'totalCategory' => $totalCategories,
            'artikel' => $artikel,
            'success' => $_SESSION['success'] ?? false,
        ];
    }
}
