<?php
    // require 'auth/login-auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Gblog</title>
</head>
<body>
    <form action="./auth/sign-up-auth.php" method="POST">
        <label for="username" >Username : </label>
        <input type="text" name="username" id="username" required>
        <br>
        <br>
        <label for="full-name">Nama lengkap :</label>
        <input type="text" name="full-name" id="full-name" required>
        <br>
        <br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>