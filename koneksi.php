<?php
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "db_bank"; 

$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
