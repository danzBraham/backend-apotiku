<?php
session_start();
require 'transFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apotiku</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="../CSS/style.php">
  <link rel="stylesheet" href="../CSS/print.php">
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
      <li><a href="../dashboard.php"><i class="fa-solid fa-home"></i> <span>Home</span> </a></li>
      <?php if (@$_SESSION['level'] === 'admin') : ?>
        <li><a href="../obat/dataobat.php"><i class="fa-solid fa-briefcase-medical"></i></i> <span>Table Obat</span> </a></li>
        <li><a href="../supplier/datasupplier.php"><i class="fa-solid fa-truck-medical"></i> <span>Table Supplier</span> </a></li>
        <li><a href="../pelanggan/datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
        <li><a href="../karyawan/datakaryawan.php"><i class="fa-solid fa-users"></i> <span>Table Karyawan</span> </a></li>
      <?php else : ?>
        <li><a href="../pelanggan/datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
      <?php endif; ?>
    </nav>
  </header>

  <!-- DATATRANSAKSI PAGE -->
  <main class="table-page">
    <div class="shape one"></div>
    <div class="shape two"></div>

    <div class="header">
      <form action="" class="search-box">
        <input type="text" name="keyword" id="keyword" placeholder="Cari Transaksi...">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <div class="btn">
        <button id="printBtn" onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        <button id="tambahBtn">Tambah Transaksi</button>
      </div>
    </div>

    <div id="overlay" class="overlay">
      <div id="tambahPopup" class="form-popup">
        <h3>Insert Transaksi</h3>
        <form action="">
          <div class="input-box">
            <label for="idTransaksi">ID Transaksi</label>
            <select name="" id="idTransaksi">
              <option value="xianjing">PT. Xianjing</option>
              <option value="shelby">PT. Shelby</option>
              <option value="sumaradu">PT. Sumaradu</option>
            </select>
          </div>
          <div class="input-box">
            <label for="tanggal">Tanggal</label>
            <input type="text" name="" id="tanggal">
          </div>
          <div class="input-box">
            <label for="idPelanggan">ID Pelanggan</label>
            <select name="" id="idPelanggan">
              <option value="xianjing">Joko</option>
              <option value="shelby">Bejo</option>
              <option value="sumaradu">Gordo</option>
            </select>
          </div>
          <div class="input-box">
            <label for="kategori">Kategori</label>
            <input type="text" name="" id="kategori">
          </div>
          <div class="btn">
            <button id="close" type="reset">Cancel</button>
            <button id="close" type="submit">Submit</button>
          </div>
        </form>
      </div>

      <div id="updatePopup" class="form-popup">
        <h3>Update Transaksi</h3>
        <form action="">
          <div class="input-box">
            <label for="idTransaksi">ID Transaksi</label>
            <select name="" id="idTransaksi">
              <option value="xianjing">PT. Xianjing</option>
              <option value="shelby">PT. Shelby</option>
              <option value="sumaradu">PT. Sumaradu</option>
            </select>
          </div>
          <div class="input-box">
            <label for="tanggal">Tanggal</label>
            <input type="text" name="" id="tanggal">
          </div>
          <div class="input-box">
            <label for="idPelanggan">ID Pelanggan</label>
            <select name="" id="idPelanggan">
              <option value="xianjing">Joko</option>
              <option value="shelby">Bejo</option>
              <option value="sumaradu">Gordo</option>
            </select>
          </div>
          <div class="input-box">
            <label for="kategori">Kategori</label>
            <input type="text" name="" id="kategori">
          </div>
          <div class="btn">
            <button id="closeUpdate" type="reset">Cancel</button>
            <button id="closeUpdate" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <div class="table">
      <h2>Daftar Transaksi</h2>
      <table>
        <thead>
          <td>Nama Pelanggan</td>
          <td>Nama Karyawan</td>
          <td>Tanggal</td>
          <td>Kategori</td>
          <td>Total Bayar</td>
          <td>Bayar</td>
          <td>Kembali</td>
          <td>Aksi</td>
        </thead>
        <tbody>
          <td>Suryadanaa</td>
          <td>Rizky Ryan</td>
          <td>14-09-2022</td>
          <td>Member</td>
          <td>3.000.000</td>
          <td>5.000.000</td>
          <td>2.000.000</td>
          <td class="btn">
            <button id="del">Hapus</button>
            <button class="update">Update</button>
          </td>
        </tbody>
      </table>
    </div>

  </main>

  <script src="../JS/table.js"></script>
</body>

</html>