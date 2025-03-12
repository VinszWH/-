<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$query = "SELECT id_user, username, angkatan, kelas, no_tlpn FROM users";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bank Mini</title>
    <link rel="stylesheet" href="admin_dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

  <div class="navbar transparent" id="navbar">
    <div class="navbar-container">
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
  <div class="sidebar-header">
    <img src="logo.png" alt="Logo" class="sidebar-logo">
    <button class="close-btn">&times;</button>
  </div>
    <ul class="sidebar-menu">
      <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
      <li><a href="#"><i class="fas fa-piggy-bank"></i> Tabungan</a></li>
      <li><a href="#"><i class="fas fa-exchange-alt"></i> Transaksi</a></li>
      <li><a href="#"><i class="fas fa-hand-holding-usd"></i> Peminjaman</a></li>
      <li><a href="#"><i class="fas fa-envelope"></i> Bantuan</a></li>
    </ul>
  </div>

  <div class="main-content">
    <div class="admin-dashboard">
      <h1>Dashboard <span class="admin-text">Administrator</span></h1>
    </div>

    <div class="container">
      <div class="cards">
        <div class="card orange">
            <i class="fas fa-user-plus"></i>
            <h2>4</h2>
            <p>Siswa Aktif</p>
            <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>

        <div class="card blue">
            <i class="fas fa-shopping-bag"></i>
            <h2>Rp 398.600,00</h2>
            <p>Total Setoran</p>
            <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>

        <div class="card red">
            <i class="fas fa-chart-bar"></i>
            <h2>Rp 220.000,00</h2>
            <p>Total Penarikan</p>
            <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>

        <div class="card green">
            <i class="fas fa-pie-chart"></i>
            <h2>Rp 178.600,00</h2>
            <p>Total Saldo</p>
            <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="profil-bank">
        <div class="header">
          <h3>Profil Bank</h3>
        </div>
        <table>
          <tr>
            <th>Nama Bank</th>
            <th>Alamat</th>
          </tr>
          <tr>
            <td>BANK MINI</td>
            <td>Jl. Menuju Kehatimu</td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <script src="admin_dashboard.js"></script>
</body>
</html>
