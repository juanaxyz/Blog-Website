<?php
require "../config/config.php";

    $username = htmlspecialchars($_POST['username']) ?? null;
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT) ?? null;
    $full_name = htmlspecialchars($_POST['full-name']) ?? null;


    if(empty($username) || empty($password) || empty($full_name)){
        // echo "kosong";
        header('Location: /signup.php');
        return false;
    }
    //cek username apakah ada di database
    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    // cek akun sudah ada atau belum
    if($result->num_rows > 0){
      echo "
        <script>
            alert('akun sudah ada ')
            window.location.href = '/signup.php';
        </script>";
        return false;    
      
    }

    // buat akun jika tidak ada
    $sql = "INSERT INTO users(username, password, nama_lengkap) VALUES 
            ('$username', '$password', '$full_name')";
    try {
        $result = $conn->query($sql);

    } catch (mysqli_sql_exception  $e) {
        //throw $th;
        echo "Error Processing Request", $e;
        
    }


 echo "
        <script>
            alert('akun berhasil dibuat ')
            window.location.href = '/login.php';
        </script>";
        return true;