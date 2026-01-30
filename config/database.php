<?php

use function PHPUnit\Framework\throwException;

$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_PORT = 3306;
$DB_NAME = 'gblog';


$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME, $DB_PORT);

if (mysqli_connect_error()) {
    throw new Exception("Error Koneksi Database", 1);
}
