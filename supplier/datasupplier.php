<?php
session_start();
require 'suppFunctions.php';

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
  alert('Anda Karyawan!');
  document.location.href = '../dashboard.php';
  </script>";
}

$dataSupp = query('SELECT * FROM tb_supplier');

if (isset($_POST['search'])) {
  $dataSupp = search($_POST['keyword']);
}

if (isset($_POST['add'])) {
  if (insert($_POST) > 0) {
    echo "<script>
            alert('Berhasil Menambah Supplier!');
          </script>";
  } else {
    echo "<script>
            alert('Gagal Menambah Supplier!');
          </script>";
  }
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
      <li><a href="dataobat.html"><i class="fa-solid fa-briefcase-medical"></i></i> <span>Table Obat</span> </a></li>
      <li><a href="datasupplier.html"><i class="fa-solid fa-truck-medical"></i> <span>Table Supplier</span> </a></li>
      <li><a href="datapelanggan.html"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
      <li><a href="datatransaksi.html"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
      <li><a href="datakaryawan.html"><i class="fa-solid fa-users"></i> <span>Table Karyawan</span> </a></li>
      <li><a href="detailtransaksi.html"><i class="fa-solid fa-clipboard"></i> <span>Detail Transaksi</span> </a></li>
    </nav>
  </header>

  <!-- DATASUPPLIER PAGE -->
  <main class="table-page">
    <div class="shape one"></div>
    <div class="shape two"></div>

    <div class="header">
      <form action="" method="POST" class="search-box">
        <input type="text" name="keyword" id="keyword" placeholder="Cari Supplier..." autocomplete="off">
        <button type="submit" name="search" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <div class="btn">
        <button id="printBtn" onclick="print()"><i class="fa-solid fa-print"></i></button>
        <button id="tambahBtn">Tambah Data</button>
      </div>
    </div>

    <div id="overlay" class="overlay">
      <div id="tambahPopup" class="tambah-popup">
        <h3>Insert Supplier</h3>
        <form action="" method="POST">
          <div class="input-box">
            <label for="namaSupplier">Nama Supplier</label>
            <input type="text" name="perusahaan" id="namaSupplier">
          </div>
          <div class="input-box">
            <label for="noTelp">No Telp</label>
            <input type="tel" name="telp" id="noTelp">
          </div>
          <div class="input-box">
            <label for="hargaJual">Alamat</label>
            <input type="text" name="alamat" id="hargaJual">
          </div>
          <div class="input-box">
            <label for="ketObat">Keterangan</label>
            <textarea name="ket" id="ketObat"></textarea>
          </div>
          <div class="btn">
            <button id="close" type="reset">Cancel</button>
            <button id="close" type="submit" name="add">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <div id="overlay" class="overlay">
      <div id="updatePopup" class="tambah-popup">
        <h3>Update Supplier</h3>
        <form action="">
          <div class="input-box">
            <label for="namaSupplier">Nama Supplier</label>
            <select name="" id="namaSupplier">
              <option value="xianjing">PT. Xianjing</option>
              <option value="shelby">PT. Shelby</option>
              <option value="sumaradu">PT. Sumaradu</option>
            </select>
          </div>
          <div class="input-box">
            <label for="noTelp">No Telp</label>
            <input type="text" name="" id="noTelp">
          </div>
          <div class="input-box">
            <label for="hargaJual">Alamat</label>
            <input type="text" name="" id="hargaJual">
          </div>
          <div class="input-box">
            <label for="ketObat">Keterangan</label>
            <textarea name="" id="ketObat" rows=""></textarea>
          </div>
          <div class="btn">
            <button id="close" type="reset">Cancel</button>
            <button id="close" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <div class="table">
      <h2>Daftar Supplier</h2>
      <table>
        <thead>
          <td>Nama Supplier</td>
          <td>No Tlp.</td>
          <td>Alamat</td>
          <td>Keterangan</td>
          <td>Aksi</td>
        </thead>
        <?php if (empty($dataSupp)) : ?>
          <tbody>
            <td>Supplier Tidak Ditemukan</td>
          </tbody>
        <?php endif; ?>
        <?php foreach ($dataSupp as $supp) : ?>
          <tbody>
            <td><?= $supp['perusahaan']; ?></td>
            <td><?= $supp['telp']; ?></td>
            <td><?= $supp['alamat']; ?></td>
            <td><?= $supp['keterangan']; ?></td>
            <td class="btn">
              <a href="suppDelete.php?idsupplier=<?= $supp['idsupplier']; ?>"><button id="del">Hapus</button></a>
              <button class="update">Update</button>
            </td>
          </tbody>
        <?php endforeach; ?>
      </table>
    </div>

  </main>

  <script src="../JS/table.js"></script>
  <script>
    const key = document.querySelector('#keyword');
    const table = document.querySelector('.table');

    key.addEventListener('keyup', () => {
      fetch('suppAjax.php?keyword=' + keyword.value)
        .then((response) => response.text())
        .then((response) => (table.innerHTML = response));
    });
  </script>
</body>

</html>