<?php
session_start();
include 'koneksi.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Manajemen User</title>
</head>
<body>
    <h1>Manajemen User</h1>

    <h2>Tambah User</h2>
    <form action="proses_tambah_user.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="angkatan" placeholder="Angkatan">
        <input type="text" name="kelas" placeholder="Kelas">
        <input type="text" name="no_tlpn" placeholder="No Telepon">
        <button type="submit">Tambah User</button>
    </form>

    <h2>Daftar User</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Angkatan</th>
            <th>Kelas</th>
            <th>No. Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id_user']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['angkatan']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['no_tlpn']; ?></td>
            <td>
                <a href="edit_user.php?id=<?= $row['id_user']; ?>">Edit</a> | 
                <a href="proses_hapus_user.php?id=<?= $row['id_user']; ?>" onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
