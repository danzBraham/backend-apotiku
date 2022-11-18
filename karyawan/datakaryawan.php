<?php
session_start();
require 'kywnFunctions.php';

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
          alert('Anda Karyawan!');
          document.location.href = '../dashboard.php';
        </script>";
}

if (isset($_POST['add'])) {
  if (insert($_POST) > 0) {
    echo "<script>
            alert('Berhasil Menambah Karyawan!');
            document.location.href = 'datakaryawan.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal Menambah Karyawan!');
          </script>";
  }
} else if (isset($_POST['cancel'])) {
  echo "<script>
          document.location.href = 'datakaryawan.php';
        </script>";
}

if (isset($_POST['update'])) {
  if (update($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Diupdate!');
            document.location.href = 'datakaryawan.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Diupdate!');
          </script>";
  }
} else if (isset($_POST['cancel'])) {
  echo "<script>
            document.location.href = 'datakaryawan.php';
          </script>";
}

$dataKywn = query('SELECT * FROM tb_karyawan');
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
        <li><a href="../transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
        <li><a href="datakaryawan.php"><i class="fa-solid fa-users"></i> <span>Table Karyawan</span> </a></li>
      <?php else : ?>
        <li><a href="../pelanggan/datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="../transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
      <?php endif; ?>
    </nav>
  </header>

  <!-- DATAKARYAWAN PAGE -->
  <main class="table-page">
    <div class="shape one"></div>
    <div class="shape two"></div>

    <div class="header">
      <form action="" class="search-box" autocomplete="off">
        <input type="text" name="keyword" id="keyword" placeholder="Cari Karyawan...">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <div class="btn">
        <button id="printBtn" onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        <button id="tambahBtn">Tambah Data</button>
      </div>
    </div>

    <div id="overlay" class="overlay">
      <div id="tambahPopup" class="form-popup">
        <h3>Insert Karyawan</h3>
        <form action="" method="POST" autocomplete="off">
          <div class="input-box">
            <label for="namaKaryawan">Nama Karyawan</label>
            <input type="text" name="karyawan" id="namaKaryawan">
          </div>
          <div class="input-box">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat">
          </div>
          <div class="input-box">
            <label for="noTelp">No Telepon</label>
            <input type="text" name="telp" id="noTelp">
          </div>
          <div class="btn">
            <button id="close" type="reset">Cancel</button>
            <button id="close" type="submit" name="add" class="submit-btn">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <?php if (@$_GET['idkaryawan']) : ?>
      <?php $id = $_GET['idkaryawan']; ?>
      <?php $dataKywnUp = query("SELECT * FROM tb_karyawan WHERE idkaryawan = $id")[0]; ?>
      <div id="overlay" class="overlay update">
        <div id="updatePopup" class="form-popup update">
          <h3>Update Karyawan</h3>
          <form action="" method="POST" autocomplete="off">
            <input type="hidden" name="idkaryawan" value="<?= $dataKywnUp['idkaryawan']; ?>">
            <div class="input-box">
              <label for="namaKaryawan">Nama Karyawan</label>
              <input type="text" name="karyawan" id="namaKaryawan" value="<?= $dataKywnUp['namakaryawan']; ?>">
            </div>
            <div class="input-box">
              <label for="alamat">Alamat</label>
              <input type="text" name="alamat" id="alamat" value="<?= $dataKywnUp['alamat']; ?>">
            </div>
            <div class="input-box">
              <label for="noTelp">No Telepon</label>
              <input type="text" name="telp" id="noTelp" value="<?= $dataKywnUp['telp']; ?>">
            </div>
            <div class="btn">
              <button id="closeUpdate" type="submit" name="cancel">Cancel</button>
              <button id="closeUpdate" type="submit" name="update" class="submit-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    <?php endif; ?>

    <div class="table">
      <h2>Daftar Karyawan</h2>
      <table>
        <thead>
          <td>Nama Karyawan</td>
          <td>Alamat</td>
          <td>No Telp</td>
          <td>Aksi</td>
        </thead>
        <?php foreach ($dataKywn as $kywn) : ?>
          <tbody>
            <td><?= $kywn['namakaryawan']; ?></td>
            <td><?= $kywn['alamat']; ?></td>
            <td><?= $kywn['telp']; ?></td>
            <td class="btn">
              <a href="kywnDelete.php?idkaryawan=<?= $kywn['idkaryawan']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><button id="del">Hapus</button></a>
              <a href="datakaryawan.php?idkaryawan=<?= $kywn['idkaryawan']; ?>"><button class="update">Update</button></a>
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
      fetch('kywnAjax.php?keyword=' + keyword.value)
        .then((response) => response.text())
        .then((response) => (table.innerHTML = response));
    });
  </script>
</body>

</html>