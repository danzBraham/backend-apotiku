<?php
session_start();
require './obatFunctions.php';

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
          alert('Anda Karyawan');
          document.location.href = './dashboard.php';
        </script>";
}

$dataObat = query('SELECT * FROM tb_obat');

if (isset($_POST['search'])) {
  $dataObat = search($_POST['keyword']);
}

$dataSupplier = query('SELECT idsupplier, perusahaan FROM tb_supplier');

if (isset($_POST['add'])) {
  if (insert($_POST) > 0) {
    echo "<script>
            alert('Data Succesfully Updated!');
            document.location.href = './obatView.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Failed to Update!');
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
      <li><a href="dashboard.html"><i class="fa-solid fa-home"></i> <span>Home</span> </a></li>
      <li><a href="dataobat.html"><i class="fa-solid fa-briefcase-medical"></i></i> <span>Table Obat</span> </a></li>
      <li><a href="datasupplier.html"><i class="fa-solid fa-truck-medical"></i> <span>Table Supplier</span> </a></li>
      <li><a href="datapelanggan.html"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
      <li><a href="datatransaksi.html"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
      <li><a href="datakaryawan.html"><i class="fa-solid fa-users"></i> <span>Table Karyawan</span> </a></li>
    </nav>
  </header>

  <!-- DATAOBAT PAGE -->
  <main class="table-page">
    <div class="shape one"></div>
    <div class="shape two"></div>

    <div class="header">
      <div class="search-box">
        <form action="" method="POST">
          <input type="text" name="keyword" id="keyword" placeholder="Cari Obat...">
          <button type="submit" name="search" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div>
      <div class="btn">
        <button id="printBtn" onclick="print()"><i class="fa-solid fa-print"></i></button>
        <button id="tambahBtn">Tambah Data</button>
      </div>
    </div>

    <div id="overlay" class="overlay">
      <div id="tambahPopup" class="tambah-popup">
        <h3>Insert Obat</h3>
        <form action="" method="POST">
          <div class="input-box">
            <label for="idSupplier">ID Supplier</label>
            <select name="" id="idSupplier">
              <?php foreach ($dataSupplier as $sup) : ?>
                <option value="<?= $sup['idsupplier']; ?>"><?= $sup['perusahaan']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="input-box">
            <label for="namaObat">Nama Obat</label>
            <input type="text" name="obat" id="namaObat">
          </div>
          <div class="input-box">
            <label for="hargaJual">Harga Jual</label>
            <input type="text" name="jual" id="hargaJual">
          </div>
          <div class="input-box">
            <label for="hargaBeli">Harga Beli</label>
            <input type="text" name="beli" id="hargaBeli">
          </div>
          <div class="input-box">
            <label for="stokObat">Stok Obat</label>
            <input type="text" name="stok" id="stokObat">
          </div>
          <div class="input-box">
            <label for="ketObat">Keterangan Obat</label>
            <textarea name="ket" id="ketObat" rows=""></textarea>
          </div>
          <div class="btn">
            <button id="close" type="reset">Cancel</button>
            <button id="close" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <div class="table">
      <h2>Daftar Obat</h2>
      <table>
        <thead>
          <td>Nama Obat</td>
          <td>Harga Beli</td>
          <td>Harga Jual</td>
          <td>Keterangan</td>
          <td>Supplier</td>
          <td>Stok</td>
          <td>Aksi</td>
        </thead>
        <?php foreach($dataObat as $obat) : ?>
        <tbody>
        <td><?= $obat['namaobat']; ?></td>
        <td><?= $obat['hargabeli']; ?></td>
        <td><?= $obat['hargajual']; ?></td>
        <td><?= $obat['keterangan']; ?></td>
        <?php $idSupplier = $obat['idsupplier']; ?>
        <?php $namaSupplier = query("SELECT perusahaan FROM tb_supplier WHERE idsupplier = $idSupplier"); ?>
        <?php foreach($namaSupplier as $sup) : ?>
        <td><?= $sup['perusahaan']; ?></td>
        <?php endforeach; ?>
        <td><?= $obat['stok']; ?></td>
          <td class="btn">
            <a href="obatDelete.php?idobat=<?= $obat['idobat']; ?>"><button>Hapus</button></a>
            <button type="submit">Update</button>
          </td>
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>

  </main>

  <script type="text/javascript">
    const navShow = document.querySelector('header');
    const navToggle = document.querySelector('header nav h1');

    navToggle.addEventListener('click', () => {
      navShow.classList.toggle('slide');
    });

    // Detail Popup
    const detailBtn = document.querySelectorAll('.table-page .table .data #popupBtn');
    const detailPopup = document.querySelectorAll('.table-page .table .data #popupDetail');

    detailBtn.forEach(el => {
      el.addEventListener('click', () => {
        detailPopup.classList.toggle('pop');
      });
    });

    // Tambah Popup
    const tambahBtn = document.querySelector('#tambahBtn');
    const overlay = document.querySelector('#overlay');
    const tambahPopup = document.querySelector('#tambahPopup');
    const tambahClose = document.querySelector('#close');

    tambahBtn.addEventListener('click', () => {
      overlay.classList.add('tambah');
      tambahPopup.classList.add('tambah');
    });

    tambahClose.addEventListener('click', () => {
      overlay.classList.remove('tambah');
      tambahPopup.classList.remove('tambah');
    });
  </script>
</body>

</html>