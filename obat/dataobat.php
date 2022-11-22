<?php
session_start();
require 'obatFunctions.php';

if (!isset($_SESSION['login'])) {
  header("Location: ../index.php");
  exit;
}

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
          alert('Anda Karyawan');
          document.location.href = '../dashboard.php';
        </script>";
}

if (isset($_POST['add'])) {
  if (insert($_POST) > 0) {
    echo "<script>
            alert('Berhasil Menambah Obat!');
            document.location.href = 'dataobat.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal Menambah Obat!');
          </script>";
  }
}

if (isset($_POST['update'])) {
  if (update($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Diupdate!');
            document.location.href = 'dataobat.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Diupdate!');
          </script>";
  }
} else if (isset($_POST['cancel'])) {
  echo "<script>
          document.location.href = 'dataobat.php';
        </script>";
}

$dataObat = query('SELECT * FROM tb_obat');
$dataSupplier = query('SELECT idsupplier, perusahaan FROM tb_supplier');
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
        <li><a href="dataobat.php"><i class="fa-solid fa-briefcase-medical"></i></i> <span>Table Obat</span> </a></li>
        <li><a href="../supplier/datasupplier.php"><i class="fa-solid fa-truck-medical"></i> <span>Table Supplier</span> </a></li>
        <li><a href="../pelanggan/datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="../transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
        <li><a href="../karyawan/datakaryawan.php"><i class="fa-solid fa-users"></i> <span>Table Karyawan</span> </a></li>
      <?php else : ?>
        <li><a href="../pelanggan/datapelanggan.php"><i class="fa-solid fa-hospital-user"></i> <span>Table Pelanggan</span> </a></li>
        <li><a href="../transaksi/datatransaksi.php"><i class="fa-solid fa-comment-dollar"></i> <span>Table Transaksi</span> </a></li>
      <?php endif; ?>
    </nav>
  </header>

  <!-- DATAOBAT PAGE -->
  <main class="table-page">
    <div class="shape one"></div>
    <div class="shape two"></div>

    <div class="header">
      <form action="" method="POST" class="search-box">
        <input type="text" name="keyword" id="keyword" placeholder="Cari Obat...">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <div class="btn">
        <button id="printBtn" onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        <button id="tambahBtn">Tambah Data</button>
      </div>
    </div>

    <div id="overlay" class="overlay">
      <div id="tambahPopup" class="form-popup">
        <h3>Insert Obat</h3>
        <form action="" method="POST" autocomplete="off">
          <div class="input-box">
            <label for="idSupplier">ID Supplier</label>
            <select name="idsupplier" id="idSupplier">
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
            <label for="kategori">Kstegori Obat</label>
            <input type="text" name="kategori" id="kategori">
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
            <button id="close" type="submit" name="add" class="submit-btn">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <?php if (@$_GET['idobat']) : ?>
      <?php $id = $_GET['idobat']; ?>
      <?php $dataObatUp = query("SELECT * FROM tb_obat WHERE idobat = $id")[0]; ?>
      <?php $idSupply = $dataObatUp['idsupplier']; ?>
      <?php $dataSupplierObat = query("SELECT idsupplier, perusahaan FROM tb_supplier WHERE idsupplier = $idSupply")[0]; ?>
      <?php $dataSupplier = query('SELECT idsupplier, perusahaan FROM tb_supplier'); ?>
      <div id="overlay" class="overlay update">
        <div id="updatePopup" class="form-popup update">
          <h3>Update Obat</h3>
          <form action="" method="POST" autocomplete="off">
            <input type="hidden" name="idobat" value="<?= $dataObatUp['idobat']; ?>">
            <div class="input-box">
              <label for="idSupplier">ID Supplier</label>
              <select name="idsupplier" id="idSupplier">
                <option value="<?= $dataSupplierObat['idsupplier']; ?>"><?= $dataSupplierObat['perusahaan']; ?></option>
                <?php foreach ($dataSupplier as $sup) : ?>
                  <option value="<?= $sup['idsupplier']; ?>"><?= $sup['perusahaan']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="input-box">
              <label for="namaObat">Nama Obat</label>
              <input type="text" name="obat" id="namaObat" value="<?= $dataObatUp['namaobat']; ?>">
            </div>
            <div class="input-box">
              <label for="hargaJual">Harga Jual</label>
              <input type="text" name="jual" id="hargaJual" value="<?= $dataObatUp['hargajual']; ?>">
            </div>
            <div class="input-box">
              <label for="hargaBeli">Harga Beli</label>
              <input type="text" name="beli" id="hargaBeli" value="<?= $dataObatUp['hargabeli']; ?>">
            </div>
            <div class="input-box">
              <label for="kategori">Kstegori Obat</label>
              <input type="text" name="kategori" id="kategori" value="<?= $dataObatUp['kategoriobat']; ?>">
            </div>
            <div class="input-box">
              <label for="stokObat">Stok Obat</label>
              <input type="text" name="stok" id="stokObat" value="<?= $dataObatUp['stok']; ?>">
            </div>
            <div class="input-box">
              <label for="ketObat">Keterangan Obat</label>
              <textarea name="ket" id="ketObat" rows=""><?= $dataObatUp['keterangan']; ?></textarea>
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
        <?php foreach ($dataObat as $obat) : ?>
          <tbody>
            <td><?= $obat['namaobat']; ?></td>
            <td>Rp<?= number_format($obat['hargabeli'], 0, ',', '.'); ?></td>
            <td>Rp<?= number_format($obat['hargajual'], 0, ',', '.'); ?></td>
            <td><?= $obat['keterangan']; ?></td>
            <?php $idSupplier = $obat['idsupplier']; ?>
            <?php $namaSupplier = query("SELECT perusahaan FROM tb_supplier WHERE idsupplier = $idSupplier"); ?>
            <?php foreach ($namaSupplier as $sup) : ?>
              <td><?= $sup['perusahaan']; ?></td>
            <?php endforeach; ?>
            <td><?= $obat['stok']; ?></td>
            <td class="btn">
              <a href="obatDelete.php?idobat=<?= $obat['idobat']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><button id="del">Hapus</button></a>
              <a href="dataobat.php?idobat=<?= $obat['idobat']; ?>"><button class="update">Update</button></a>
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
      fetch('obatAjax.php?keyword=' + keyword.value)
        .then((response) => response.text())
        .then((response) => (table.innerHTML = response));
    });
  </script>
</body>

</html>