<?php

namespace Juns\Blog\Models;


class User
{
    private $conn;


    public function __construct($conn)
    {
        $this->conn = $conn;
        // $this->passwordHash = password_hash('juana', PASSWORD_DEFAULT);
    }

    private function cekPassword(string $username, string $password)
    {
        $stmt = $this->conn->prepare(
            "SELECT password FROM users WHERE username = ? LIMIT 1 "
        );

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        $passwordDB = $row['password'];
        // var_dump(password_verify($password, $passwordDB));
        return password_verify($password, $passwordDB);
    }
    public function cekLogin(string $username, string $password): bool
    {
        $stmt = $this->conn->prepare(
            "SELECT id FROM users WHERE username = ? LIMIT 1"
        );

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {

            return $this->cekPassword($username, $password);
        }

        return false;
    }
}
