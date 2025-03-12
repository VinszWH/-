<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Bank Mini</title>
    <link rel="stylesheet" href="user_dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="navbar transparent" id="navbar">
    <div class="container">
      <button class="sidebar-toggle" id="sidebarToggle">&#9776;</button>
      <div class="navbar-right">
        <span class="user-text" id="userText"><?= htmlspecialchars($_SESSION['username']); ?></span>
        <div class="user-menu" id="userMenu">
          <a href="#"><i class="fas fa-user-circle"></i> Profil</a>
          <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div class="sidebar" id="sidebar">
    <button class="close-btn" id="closeSidebar">&times;</button>
    <ul class="sidebar-menu">
      <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
      <li><a href="#"><i class="fas fa-piggy-bank"></i> Tabungan</a></li>
      <li><a href="#"><i class="fas fa-exchange-alt"></i> Transaksi</a></li>
      <li><a href="#"><i class="fas fa-hand-holding-usd"></i> Peminjaman</a></li>
      <li><a href="#"><i class="fas fa-envelope"></i> Bantuan</a></li>
    </ul>
  </div>

  <div class="main-content" id="mainContent">
    <div class="carousel">
      <div class="slides" id="slides">
        <div class="slide">
          <img src="/image/anime.jpg" alt="Gambar 1">
          <p>Selamat datang di Layanan Kami</p>
        </div>
        <div class="slide">
          <img src="/image/az.jpg" alt="Gambar 2">
          <p>Kepercayaan Anda, Komitmen Kami</p>
        </div>
      </div>
    </div>

    <div class="content">
      <h1>Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
      
      <h2>Informasi Profil</h2>
      <table border="1">
        <tr>
            <th>Angkatan</th>
            <td><?= htmlspecialchars($_SESSION['angkatan']); ?></td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td><?= htmlspecialchars($_SESSION['kelas']); ?></td>
        </tr>
        <tr>
            <th>No. Telepon</th>
            <td><?= htmlspecialchars($_SESSION['no_tlpn']); ?></td>
        </tr>
      </table>
    </div>
  </div>

  <script src="user_dashboard.js"></script>
</body>
</html>
