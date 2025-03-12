<?php
include '../koneksi/koneksi.php';

$id_user = $_GET['id'];
$query = "SELECT * FROM users WHERE id_user = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id_user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="proses_edit_user.php" method="POST">
        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
        <input type="text" name="username" value="<?= $user['username']; ?>" required>
        <input type="text" name="angkatan" value="<?= $user['angkatan']; ?>">
        <input type="text" name="kelas" value="<?= $user['kelas']; ?>">
        <input type="text" name="no_tlpn" value="<?= $user['no_tlpn']; ?>">
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
