<?php

// app/Models/Article.php
namespace Juns\Blog\Models;

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
}
