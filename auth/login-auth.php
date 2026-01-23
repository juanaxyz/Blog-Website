<?php
    require '../config/config.php';
    session_start();
    // var_dump($_POST);

    // get user input
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;


    if(empty($username) || empty($password)){
        // echo "kosong";
        header('Location: /login.php');
        return false;
    }

    //cek username apakah ada di database
    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
           
            //cek password jika sama redirect 
            if(password_verify($password, $row['password'])){
                $_SESSION['username'] = $row['username'];
                // echo "berhasil login";
                header('Location: /index.php');
            }
        }
    }
        echo "
        <script>
            alert('akun tidak ditemukan / password salah')
            window.location.href = '/login.php';
        </script>";
        return false;
    