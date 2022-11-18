<?php
session_start();
require 'pelFunctions.php';

if (isset($_POST['add'])) {
  if (insert($_POST) > 0) {
    echo "<script>
            alert('Berhasil Menambah Pelanggan!');
            document.location.href = 'datapelanggan.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal Menambah Pelanggan!');
          </script>";
  }
} else if (isset($_POST['cancel'])) {
  echo "<script>
          document.location.href = 'datapelanggan.php';
        </script>";
}

if (isset($_POST['update'])) {
  if (update($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Diupdate!');
            document.location.href = 'datapelanggan.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Diupdate!');
          </script>";
  }
} else if (isset($_POST['cancel'])) {
  echo "<script>
          document.location.href = 'datapelanggan.php';
        </script>";
}

$dataPel = query('SELECT * FROM tb_pelanggan');
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
      <?php if (@$_SESSION['level'] === 'admin') : ?>
        <li><a href="../obat/dataobat.php"><i class="fa-solid fa-briefcase-medical"></i></i> <span>Table Obat</span> </a></li>
        <li><a href="../supplier/datasupplier.php"><i class="fa-solid fa-truck-medical"></i> <span>Table Supplier</span> </a></li>
        <li><a href="datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="../transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
        <li><a href="../karyawan/datakaryawan.php"><i class="fa-solid fa-users"></i> <span>Table Karyawan</span> </a></li>
      <?php else : ?>
        <li><a href="datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="../transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
      <?php endif; ?>
    </nav>
  </header>

  <!-- DATAPELANGGAN PAGE -->
  <main class="table-page">
    <div class="shape one"></div>
    <div class="shape two"></div>

    <div class="header">
      <form action="" class="search-box">
        <input type="text" name="keyword" id="keyword" placeholder="Cari Pelanggan...">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <div class="btn">
        <button id="printBtn" onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        <button id="tambahBtn">Tambah Data</button>
      </div>
    </div>

    <div id="overlay" class="overlay">
      <div id="tambahPopup" class="form-popup">
        <h3>Insert Pelanggan</h3>
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="input-box">
            <label for="namaPelanggan">Nama Pelanggan</label>
            <input type="text" name="namaPel" id="namaPelanggan">
          </div>
          <div class="input-box">
            <label for="noTelp">No Telp</label>
            <input type="tel" name="telp" id="noTelp">
          </div>
          <div class="input-box">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat">
          </div>
          <div class="input-box">
            <label for="usia">Usia</label>
            <input type="text" name="usia" id="usia">
          </div>
          <div class="input-box">
            <label for="buktiresep">Bukti Resep</label>
            <input type="file" name="bukti" id="buktiresep">
          </div>
          <div class="btn">
            <button id="close" type="reset">Cancel</button>
            <button class="submit-btn" id="close" type="submit" name="add">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <?php if (@$_GET['idpelanggan']) : ?>
      <?php $id = $_GET['idpelanggan']; ?>
      <?php $dataPelUp = query("SELECT * FROM tb_pelanggan WHERE idpelanggan = $id")[0]; ?>
      <div id="overlay" class="overlay update">
        <div id="updatePopup" class="form-popup update">
          <h3>Update Pelanggan</h3>
          <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="idpelanggan" value="<?= $dataPelUp['idpelanggan']; ?>">
            <div class="input-box">
              <label for="namaPelanggan">Nama Pelanggan</label>
              <input type="text" name="namaPel" id="namaPelanggan" value="<?= $dataPelUp['namapelanggan']; ?>">
            </div>
            <div class="input-box">
              <label for="noTelpp">No Telp</label>
              <input type="text" name="telp" id="noTelp" value="<?= $dataPelUp['telp']; ?>">
            </div>
            <div class="input-box">
              <label for="alammat">Alamat</label>
              <input type="text" name="alamat" id="alamat" value="<?= $dataPelUp['alamat']; ?>">
            </div>
            <div class="input-box">
              <label for="usia">Usia</label>
              <input type="text" name="usia" id="usia" value="<?= $dataPelUp['usia']; ?>">
            </div>
            <div class="input-box">
              <label for="buktiresep">Bukti Resep</label>
              <input type="file" name="bukti" id="buktiresep" value="<?= $dataPelUp['buktifotoresep']; ?>">
              <input type="hidden" name="buktiLama" id="buktiresep" value="<?= $dataPelUp['buktifotoresep']; ?>">
            </div>
            <div class="btn">
              <button id="close" type="submit" name="cancel">Cancel</button>
              <button id="close" type="submit" name="update" class="submit-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    <?php endif; ?>

    <div class="table">
      <h2>Daftar Pelanggan</h2>
      <table>
        <thead>
          <td>Nama Pelanggan</td>
          <td>No Telp</td>
          <td>Alamat</td>
          <td>Usia</td>
          <td>Bukti Resep</td>
          <?php if (@$_SESSION['level'] === 'admin') : ?>
            <td>Aksi</td>
          <?php endif; ?>
        </thead>
        <?php foreach ($dataPel as $pel) : ?>
          <?php if ($pel['idpelanggan'] != 3) : ?>
            <tbody>
              <td><?= $pel['namapelanggan']; ?></td>
              <td><?= $pel['telp']; ?></td>
              <td><?= $pel['alamat']; ?></td>
              <td><?= $pel['usia']; ?></td>
              <td><img src="buktifoto/<?= $pel['buktifotoresep']; ?>" alt="tidak ada foto"></td>
              <?php if (@$_SESSION['level'] === 'admin') : ?>
                <td class="btn">
                  <a href="pelDelete.php?idpelanggan=<?= $pel['idpelanggan']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><button id="del">Hapus</button></a>
                  <a href="datapelanggan.php?idpelanggan=<?= $pel['idpelanggan']; ?>"><button class="update">Update</button></a>
                </td>
              <?php endif; ?>
            </tbody>
          <?php endif; ?>
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
      fetch('pelAjax.php?keyword=' + keyword.value)
        .then((response) => response.text())
        .then((response) => (table.innerHTML = response));
    });
  </script>
</body>

</html>