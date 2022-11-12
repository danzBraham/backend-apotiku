<?php
session_start();
require 'functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: ./index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apotiku</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="CSS/style.php">
  <link rel="stylesheet" href="CSS/print.php">
  <!-- Link Fontawesome -->
  <script src="https://kit.fontawesome.com/1c6364f841.js" crossorigin="anonymous"></script>
  <!-- Link Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
  <!-- HEADER -->
  <header>
    <nav>
      <h1 class="logo"><a href="#"><i class="uil uil-apps"></i></a></h1>
      <li><a href=""><i class="fa-solid fa-home"></i> <span>Home</span> </a></li>
      <?php if (@$_SESSION['level'] === 'admin') : ?>
        <li><a href="obat/obatView.php"><i class="fa-solid fa-briefcase-medical"></i></i> <span>Table Obat</span> </a></li>
        <li><a href="datasupplier.html"><i class="fa-solid fa-truck-medical"></i> <span>Table Supplier</span> </a></li>
        <li><a href="datapelanggan.html"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="datatransaksi.html"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
        <li><a href="datakaryawan.html"><i class="fa-solid fa-users"></i> <span>Table Karyawan</span> </a></li>
      <?php else : ?>
        <li><a href="datapelanggan.html"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="datatransaksi.html"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
      <?php endif; ?>
    </nav>
  </header>

  <!-- DASHBOARD PAGE -->
  <main class="dashboard-page">
    <div class="shape one"></div>
    <div class="shape two"></div>
    <div class="dash-tittle">
      <div class="tittle">
        <?php $id = $_SESSION['id'] ?>
        <?php $dataUser = query("SELECT * FROM tb_users WHERE id = '$id'"); ?>
        <h1>Hai <span class="active"><?= $dataUser['username']; ?></span></h1>
        <h2>Selamat Datang di Dashboard <span>👋</span></h2>
      </div>
      <div class="profile">
        <?php $username = $dataUser['username']; ?>
        <img src="Assets/profilePict/<?= $dataUser['picture']; ?>" alt="Profile">
        <a id="profileBtn"><?= $dataUser['username']; ?> <i class="fa-solid fa-arrow-down"></i></a>
      </div>
      <div id="profilePopup" class="profile-popup">
        <a href="register.html"><i class="fa-solid fa-user-plus"></i> Tambah User</a>
        <span></span>
        <a href="datauser.html"><i class="fa-solid fa-gear"></i> Pengaturan</a>
        <span></span>
        <a href="index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
      </div>
    </div>

    <section class="dash-content">
      <h3>Total Data</h3>
      <section class="dash-data">
        <section class="all-data">
          <div class="total-data">
            <div class="data"></div>
            <div class="data"></div>
            <div class="data"></div>
          </div>
          <div class="histori-tittle">
            <h3>Histori Transaksi</h3>
            <a href="datatransaksi.html">Lebih Banyak</a>
          </div>
          <div class="histori-data">
            <div class="data">
              <div class="profile">
                <img src="Assets/img/profile-client.svg">
                <div class="name">
                  <p>Thomas Slebew</p>
                  <p>thomasdingin@gmail.com</p>
                </div>
              </div>
              <p>Paracetamol</p>
              <p>Rp24000</p>
              <button>Detail</button>
            </div>
            <div class="data">
              <div class="profile">
                <img src="Assets/img/profile-client.svg">
                <div class="name">
                  <p>Thomas Slebew</p>
                  <p>thomasdingin@gmail.com</p>
                </div>
              </div>
              <p>Paracetamol</p>
              <p>Rp24000</p>
              <button>Detail</button>
            </div>
            <div class="data">
              <div class="profile">
                <img src="Assets/img/profile-client.svg">
                <div class="name">
                  <p>Thomas Slebew</p>
                  <p>thomasdingin@gmail.com</p>
                </div>
              </div>
              <p>Paracetamol</p>
              <p>Rp24000</p>
              <button>Detail</button>
            </div>
          </div>
        </section>

        <section class="data-karyawan">
          <h3>Data Karyawan</h3>
          <div class="karyawan">
            <img src="Assets/img/profile-karyawan.svg">
            <div class="name">
              <p>Thomas Slebew</p>
              <p>thomasdingin@gmail.com</p>
            </div>
          </div>
          <div class="karyawan">
            <img src="Assets/img/profile-karyawan.svg">
            <div class="name">
              <p>Thomas Slebew</p>
              <p>thomasdingin@gmail.com</p>
            </div>
          </div>
          <div class="karyawan">
            <img src="Assets/img/profile-karyawan.svg">
            <div class="name">
              <p>Thomas Slebew</p>
              <p>thomasdingin@gmail.com</p>
            </div>
          </div>
          <div class="btn">
            <img src="Assets/img/img-karyawan.svg">
            <a href="datakaryawan.html">Lihat Semua</a>
          </div>
        </section>
      </section>
    </section>
  </main>

  <script src="JS/script.js"></script>
</body>

</html>