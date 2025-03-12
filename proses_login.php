<?php
session_start();
include 'koneksi.php';

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = mysqli_prepare($conn, "SELECT * FROM admins WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $admin = mysqli_fetch_assoc($result);

    if ($admin) {
        if (password_verify($password, $admin['password'])) {
            $_SESSION['username'] = $admin['username'];
            $_SESSION['role'] = 'admin';
            $_SESSION['id_admin'] = $admin['id_admin'];
            header("Location: admin_dashboard.php");
            exit();
        }
    }

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = 'user';
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['angkatan'] = $user['angkatan'];
            $_SESSION['kelas'] = $user['kelas'];
            $_SESSION['no_tlpn'] = $user['no_tlpn'];
            header("Location: user_dashboard.php");
            exit();
        }
    }

    $_SESSION['error'] = "Username atau password salah!";
    header("Location: login.php");
    exit();
}

$_SESSION['error'] = "Akses ditolak! Harap login melalui form.";
header("Location: login.php");
exit();
?>
