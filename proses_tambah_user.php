<?php
include '../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $angkatan = $_POST['angkatan'];
    $kelas = $_POST['kelas'];
    $no_tlpn = $_POST['no_tlpn'];

    $query = "INSERT INTO users (username, password, angkatan, kelas, no_tlpn) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $username, $password, $angkatan, $kelas, $no_tlpn);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: user_management.php");
        exit();
    } else {
        echo "Gagal menambah user.";
    }
}
?>
