<?php
include '../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $angkatan = $_POST['angkatan'];
    $kelas = $_POST['kelas'];
    $no_tlpn = $_POST['no_tlpn'];

    $query = "UPDATE users SET username=?, angkatan=?, kelas=?, no_tlpn=? WHERE id_user=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $username, $angkatan, $kelas, $no_tlpn, $id_user);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: user_management.php");
        exit();
    } else {
        echo "Gagal mengupdate user.";
    }
}
?>
