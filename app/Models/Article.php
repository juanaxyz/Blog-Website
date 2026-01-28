<?php

// app/Models/Article.php
namespace Juns\Blog\Models;

use mysqli_sql_exception;

class Article
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function cekTitle(string $title)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM posts WHERE judul = ?"
        );

        $stmt->bind_param("s", $title);
        $stmt->execute();

        return $stmt->get_result();
    }
    public function getAllCategories()
    {
        $result = $this->conn->query("SELECT nama_kategori FROM categories");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPosts()
    {
        // $result = $this->conn->query("SELECT * FROM posts");

        // return $result->fetch_all(MYSQLI_ASSOC);

        $stmt = $this->conn->prepare(
            "SELECT p.*, u.username, c.nama_kategori FROM posts p JOIN users u ON u.id = p.user_id JOIN categories c ON c.id = p.category_id LIMIT 5"
        );
        $stmt->execute();
        // var_dump($stmt->get_result());
        return $stmt->get_result();
    }

    private function getUid(string $username, $conn)
    {
        $stmt = $conn->prepare(
            "SELECT id from users WHERE username = ? LIMIT 1"
        );
        $stmt->bind_param(
            "s",
            $username
        );
        $stmt->execute();
        $res = $stmt->get_result();
        // "ini get uid" . var_dump($res);
        return $res->fetch_array(MYSQLI_NUM);
    }

    private function getCategoryid(string $category, $conn)
    {
        $stmt = $conn->prepare(
            "SELECT id from categories WHERE nama_kategori = ? LIMIT 1"
        );
        $stmt->bind_param(
            "s",
            $category
        );
        $stmt->execute();
        $res = $stmt->get_result();
        // var_dump($res);
        return $res->fetch_array(MYSQLI_NUM);
    }
    public function addNewArticle(array $data)
    {


        $uid = $this->getUid($data['username'], $this->conn);
        $cid = $this->getCategoryid($data['category'], $this->conn);
        try {

            $stmt = $this->conn->prepare(
                "INSERT INTO posts (user_id, category_id, judul,slug,konten,gambar,status) VALUES 
            (?, ?, ?, ?, ?, ? , ?) "
            );
            $stmt->bind_param(
                "iisssss",
                $uid,
                $cid,
                $data['judul'],
                $data['slug'],
                $data['konten'],
                $data['gambar'],
                $data['status']

            );

            if (!$stmt->execute()) {
                return ['success' => false, 'error' => $stmt->error];
            }
        } catch (mysqli_sql_exception) {
            return ['success' => false, 'error' => "<br> error query SQL"];
        }

        return ['success' => true, 'insert_id' => $stmt->insert_id];
    }
}
