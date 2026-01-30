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
            "SELECT * FROM posts WHERE title = ? LIMIT 1"
        );

        $stmt->bind_param("s", $title);
        $stmt->execute();

        return $stmt->get_result();
    }
    public function getAllCategories()
    {
        $result = $this->conn->query("SELECT name FROM categories");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPosts()
    {
        $stmt = $this->conn->prepare(
            "SELECT p.*, u.username, c.name, u.profile
                FROM
                    posts p
                    JOIN users u ON u.id = p.user_id
                    JOIN categories c ON c.id = p.category_id
                    WHERE p.status = 'Publish'
                ORDER BY c.name"
        );
        $stmt->execute();
        return $stmt->get_result();
    }
    public function getAllPostsMixed(string $username)
    {
        $stmt = $this->conn->prepare(
            "SELECT p.*, u.username, c.name, u.profile
                FROM
                    posts p
                    JOIN users u ON u.id = p.user_id
                    JOIN categories c ON c.id = p.category_id
                WHERE u.username = ?
                ORDER BY p.id"
        );
        $stmt->bind_param(
            "s",
            $username
        );
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getOnePost($username, $postId)
    {
        $stmt = $this->conn->prepare(
            "SELECT p.title, p.content, p.slug, p.gambar, p.status, c.name category_name
                FROM
                    posts p
                    JOIN users u ON u.id = p.user_id
                    JOIN categories c ON c.id = p.category_id
                WHERE u.username = ? AND p.id = ?
                LIMIT 1"
        );
        $stmt->bind_param(
            "si",
            $username,
            $postId
        );
        $stmt->execute();
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
        $row = $res->fetch_assoc();
        // var_dump($row['id']);

        return $row['id'];
    }

    private function formatCategory(string $category): string
    {
        return ucwords(strtolower(trim($category)));
    }

    private function makeSlug(string $text): string
    {
        $slug = strtolower($text);
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
        $slug = preg_replace('/\s+/', '-', $slug);
        return trim($slug, '-');
    }

    private function getCategoryId(string $category, $conn): int
    {
        // 1️⃣ format category
        $categoryName = $this->formatCategory($category);

        // 2️⃣ cek apakah sudah ada
        $stmt = $conn->prepare(
            "SELECT id FROM categories WHERE name = ? LIMIT 1"
        );
        $stmt->bind_param("s", $categoryName);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            return (int) $row['id'];
        }

        // 3️⃣ kalau belum ada → buat baru
        $slug = $this->makeSlug($categoryName);

        $insert = $conn->prepare(
            "INSERT INTO categories (name, slug) VALUES (?, ?)"
        );
        $insert->bind_param("ss", $categoryName, $slug);
        $insert->execute();

        return $conn->insert_id;
    }

    public function addNewArticle(array $data)
    {


        $uid = $this->getUid($data['username'], $this->conn);
        $cid = $this->getCategoryId($data['category'], $this->conn);
        try {

            $stmt = $this->conn->prepare(
                "INSERT INTO posts (user_id, category_id, title,slug,content,gambar,status) VALUES 
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
        } catch (mysqli_sql_exception $e) {
            return ['success' => false, 'error' => "<br> error query SQL" . $e];
        }

        return ['success' => true, 'insert_id' => $stmt->insert_id];
    }

    public function editPost(array $data)
    {
        $uid = $this->getUid($data['username'], $this->conn);
        $cid = $this->getCategoryId($data['category'], $this->conn);

        $sql = "UPDATE posts SET 
                title = ?,
                category_id = ?,
                slug = ?,
                content = ?,
                status = ?";

        $types = "sisss";
        $params = [
            $data['judul'],
            $cid,
            $data['slug'],
            $data['content'],
            $data['status']
        ];

        // 👉 hanya update gambar jika ada
        if (!empty($data['gambar'])) {
            $sql .= ", gambar = ?";
            $types .= "s";
            $params[] = $data['gambar'];
        }

        $sql .= " WHERE user_id = ? AND id = ?";
        $types .= "ii";
        $params[] = $uid;
        $params[] = $data['id'];

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param($types, ...$params);

        if (!$stmt->execute()) {
            return ['success' => false, 'error' => $stmt->error];
        }

        return ['success' => true, 'affected_rows' => $stmt->affected_rows];
    }
}
