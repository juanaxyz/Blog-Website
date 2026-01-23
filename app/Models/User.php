<?php
namespace Juns\Blog\Models;

class User{
    private string $username = "juana";
    private string $passwordHash;

    public function __construct(){
        $this->passwordHash = password_hash('juana', PASSWORD_DEFAULT);
    }

    public function cekLogin(string $username, string $password): bool
    {
        if ($username !== $this->username) {
            return false;
        }

        return password_verify($password, $this->passwordHash);
    }
}
