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
        <li><a href="obat/dataobat.php"><i class="fa-solid fa-briefcase-medical"></i></i> <span>Table Obat</span> </a></li>
        <li><a href="supplier/datasupplier.php"><i class="fa-solid fa-truck-medical"></i> <span>Table Supplier</span> </a></li>
        <li><a href="pelanggan/datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
        <li><a href="karyawan/datakaryawan.php"><i class="fa-solid fa-users"></i> <span>Table Karyawan</span> </a></li>
      <?php else : ?>
        <li><a href="pelanggan/datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
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
        <?php $dataUser = query("SELECT * FROM tb_users WHERE id = '$id'")[0]; ?>
        <h1>Hai <span class="active"><?= $dataUser['username']; ?></span></h1>
        <h2>Selamat Datang di Dashboard <span>👋</span></h2>
      </div>
      <div class="profile">
        <img src="Assets/profilePict/<?= $dataUser['picture']; ?>" alt="Profile">
        <a id="profileBtn"><?= $dataUser['username']; ?> <i class="fa-solid fa-arrow-down"></i></a>
      </div>
      <div id="profilePopup" class="profile-popup">
        <?php if (@$_SESSION['level'] != 'karyawan') : ?>
          <a href="register.php"><i class="fa-solid fa-user-plus"></i> Tambah User</a>
          <span></span>
        <?php endif; ?>
        <a href="datauser.php"><i class="fa-solid fa-gear"></i> Pengaturan</a>
        <span></span>
        <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
      </div>
    </div>

    <section class="dash-content">
      <h3>Total Data</h3>
      <section class="dash-data">
        <section class="all-data">
          <div class="total-data">
            <div class="data">
              <i class="fa-solid fa-pills"></i>
              <?php $totalObat = mysqli_fetch_row(mysqli_query(connection(), "SELECT COUNT(idobat) FROM tb_obat"))[0]; ?>
              <p>Banyak Obat : <span><?= $totalObat; ?></span></p>
            </div>
            <div class="data">
              <i class="fa-solid fa-user"></i>
              <?php $totalPel = mysqli_fetch_row(mysqli_query(connection(), "SELECT COUNT(idpelanggan) FROM tb_pelanggan"))[0]; ?>
              <p>Banyak Pelanggan : <span><?= $totalPel; ?></span></p>
            </div>
            <div class="data">
              <i class="fa-solid fa-cart-shopping"></i>
              <?php $totalTrans = mysqli_fetch_row(mysqli_query(connection(), "SELECT COUNT(idtransaksi) FROM tb_transaksi"))[0]; ?>
              <p>Banyak Transaksi : <span><?= $totalTrans; ?></span></p>
            </div>
          </div>
          <div class="histori-tittle">
            <h3>Histori Transaksi</h3>
            <a href="transaksi/datatransaksi.php">Lebih Banyak</a>
          </div>
          <div class="histori-data">
            <?php $historiTrans = query("SELECT * FROM tb_transaksi ORDER BY idtransaksi DESC LIMIT 2"); ?>
            <?php foreach ($historiTrans as $trans) : ?>
              <?php $idPel = $trans['idpelanggan']; ?>
              <?php $pelanggan = query("SELECT * FROM tb_pelanggan WHERE idpelanggan = '$idPel' ORDER BY idpelanggan ASC LIMIT 2"); ?>
              <div class="data">
                <div class="profile">
                  <img src="Assets/img/profile-client.svg">
                  <div class="name">
                    <?php foreach ($pelanggan as $pel) : ?>
                      <p><?= $pel['namapelanggan']; ?></p>
                    <?php endforeach; ?>
                  </div>
                </div>
                <p><?= $trans['tgltransaksi']; ?></p>
                <p>Rp<?= number_format($trans['totalbayar'], '0', ',', '.'); ?></p>
                <button>Detail</button>
              </div>
            <?php endforeach; ?>
        </section>

        <section class="data-karyawan">
          <h3>Data Karyawan</h3>
          <?php $dataKywn = query("SELECT namakaryawan, telp FROM tb_karyawan LIMIT 2"); ?>
          <?php foreach ($dataKywn as $kywn) : ?>
            <div class="karyawan">
              <img src="Assets/img/profile-karyawan.svg">
              <div class="name">
                <p><?= $kywn['namakaryawan']; ?></p>
                <p><?= $kywn['telp']; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="btn">
            <img src="Assets/img/img-karyawan.svg">
            <?php if (@$_SESSION['level'] === 'admin') : ?>
              <a href="karyawan/datakaryawan.php">Lihat Semua</a>
            <?php endif; ?>
          </div>
        </section>
      </section>
    </section>
  </main>

  <script src="JS/script.js"></script>
</body>

</html>