<?php
session_start();
require 'suppFunctions.php';

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
          alert('Anda Karyawan!');
          document.location.href = '../dashboard.php';
        </script>";
}

if (isset($_POST['add'])) {
  if (insert($_POST) > 0) {
    echo "<script>
            alert('Berhasil Menambah Supplier!');
            document.location.href = 'datasupplier.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal Menambah Supplier!');
          </script>";
  }
} else if (isset($_POST['cancel'])) {
  echo "<script>
          document.location.href = 'datasupplier.php';
        </script>";
}

if (isset($_POST['update'])) {
  if (update($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Diupdate!');
            document.location.href = 'datasupplier.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Diupdate!');
          </script>";
  }
} else if (isset($_POST['cancel'])) {
  echo "<script>
          document.location.href = 'datasupplier.php';
        </script>";
}

$dataSupp = query('SELECT * FROM tb_supplier');
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
        <li><a href="datasupplier.php"><i class="fa-solid fa-truck-medical"></i> <span>Table Supplier</span> </a></li>
        <li><a href="../pelanggan/datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="../transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
        <li><a href="../karyawan/datakaryawan.php"><i class="fa-solid fa-users"></i> <span>Table Karyawan</span> </a></li>
      <?php else : ?>
        <li><a href="../pelanggan/datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="../transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
      <?php endif; ?>
    </nav>
  </header>

  <!-- DATASUPPLIER PAGE -->
  <main class="table-page">
    <div class="shape one"></div>
    <div class="shape two"></div>

    <div class="header">
      <form action="" method="POST" class="search-box">
        <input type="text" name="keyword" id="keyword" placeholder="Cari Supplier..." autocomplete="off">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <div class="btn">
        <button id="printBtn" onclick="print()"><i class="fa-solid fa-print"></i></button>
        <button id="tambahBtn">Tambah Data</button>
      </div>
    </div>

    <div id="overlay" class="overlay">
      <div id="tambahPopup" class="form-popup">
        <h3>Insert Supplier</h3>
        <form action="" method="POST" autocomplete="off">
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
            <button id="close" type="submit" class="submit-btn" name="add">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <?php if (@$_GET['idsupplier']) : ?>
      <?php $id = $_GET['idsupplier']; ?>
      <?php $dataSuppUp = query("SELECT * FROM tb_supplier WHERE idsupplier = $id")[0]; ?>
      <div id="overlay" class="overlay update">
        <div id="updatePopup" class="form-popup update">
          <h3>Update Supplier</h3>
          <form action="" method="POST" autocomplete="off">
            <input type="hidden" name="idsupplier" value="<?= $dataSuppUp['idsupplier']; ?>">
            <div class="input-box">
              <label for="namaSupplier">Nama Supplier</label>
              <input type="text" name="perusahaan" id="namaSupplier" value="<?= $dataSuppUp['perusahaan']; ?>">
            </div>
            <div class="input-box">
              <label for="noTelp">No Telp</label>
              <input type="tel" name="telp" id="noTelp" value="<?= $dataSuppUp['telp']; ?>">
            </div>
            <div class="input-box">
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" id="almaat" value="<?= $dataSuppUp['alamat']; ?>">
            </div>
            <div class="input-box">
              <label for="ketObat">Keterangan</label>
              <textarea name="ket" id="ketObat"><?= $dataSuppUp['keterangan']; ?></textarea>
            </div>
            <div class="btn">
              <button id="closeUpdate" type="submit" name="cancel">Cancel</button>
              <button id="submitUpdate" type="submit" name="update" class="submit-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    <?php endif; ?>

    <div class="table">
      <h2>Daftar Supplier</h2>
      <table>
        <thead>
          <td>Nama Supplier</td>
          <td>No Telp</td>
          <td>Alamat</td>
          <td>Keterangan</td>
          <td>Aksi</td>
        </thead>
        <?php foreach ($dataSupp as $supp) : ?>
          <tbody>
            <td><?= $supp['perusahaan']; ?></td>
            <td><?= $supp['telp']; ?></td>
            <td><?= $supp['alamat']; ?></td>
            <td><?= $supp['keterangan']; ?></td>
            <td class="btn">
              <a href="suppDelete.php?idsupplier=<?= $supp['idsupplier']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><button id="del">Hapus</button></a>
              <a href="datasupplier.php?idsupplier=<?= $supp['idsupplier']; ?>"><button class="update">Update</button></a>
            </td>
          </tbody>
        <?php endforeach; ?>
      </table>
    </div>

  </main>

  <script src="../JS/table.js"></script>
  <script>
    // Ajax Search
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