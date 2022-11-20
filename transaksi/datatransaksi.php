<?php
session_start();
require 'transFunctions.php';

if (isset($_POST['add'])) {
  if (member($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Ditambah!');
            document.location.href = 'detailtransaksi.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Ditambah!');
          </script>";
  }
}

$dataTrans = query('SELECT * FROM tb_transaksi INNER JOIN tb_pelanggan USING(idpelanggan) INNER JOIN tb_karyawan USING(idkaryawan) ORDER BY idtransaksi DESC;');
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
        <form action="" method="POST">
          <div class="input-box">
            <label for="kategoriPel">Kategori Pelanggan</label>
            <select name="kategori" id="kategoriPel">
              <option value="umum">Umum</option>
              <option value="member">Member</option>
            </select>
          </div>
          <div class="btn">
            <button id="close" type="reset">Cancel</button>
            <button id="close" type="submit" class="submit-btn">Next</button>
          </div>
        </form>

        <?php if (@$_POST['kategori'] == 'member') : ?>
          <div id="updatePopup" class="form-popup update">
            <form action="" method="POST">
              <div class="input-box">
                <label for="tanggal">Nama Pelanggan</label>
                <input type="text" list="namaPealnggan" name="namaPelanggan" id="tanggal">
                <datalist id="namaPelanggan">
                  <?php $dataPelanggan = query('SELECT namapelanggan FROM tb_pelanggan'); ?>
                  <?php foreach ($dataPelanggan as $pel) : ?>
                    <option value="<?= $pel['namapelanggan']; ?>">
                    <?php endforeach; ?>
                </datalist>
              </div>
              <div class="btn">
                <button id="close" type="reset">Cancel</button>
                <button id="close" type="submit" class="submit-btn" name="add">Submit</button>
              </div>
            </form>
          </div>
        <?php elseif (@$_POST['kategori'] == 'umum') : ?>
          <?php if (umum() > 0) : ?>
            <?php
            echo "<script>
                    alert('Data Berhasil Ditambah!');
                    document.location.href = 'detailtransaksi.php';
                  </script>";
            ?>
          <?php else : ?>
            <?php
            echo "<script>
                    alert('Data Gagal Ditambah!');
                  </script>";
            ?>
          <?php endif; ?>
        <?php endif; ?>
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
        <?php foreach ($dataTrans as $trans) : ?>
          <tbody>
            <td><?= $trans['namapelanggan']; ?></td>
            <td><?= $trans['namakaryawan']; ?></td>
            <td><?= $trans['tgltransaksi']; ?></td>
            <td><?= $trans['kategoripelanggan']; ?></td>
            <td><?= number_format($trans['totalbayar'], 0, ',', '.'); ?></td>
            <td><?= number_format($trans['bayar'], 0, ',', '.'); ?></td>
            <td><?= number_format($trans['kembali'], 0, ',', '.'); ?></td>
            <td class="btn">
              <a href="transDelete.php?idtransaksi=<?= $trans['idtransaksi']; ?>"><button id="del">Hapus</button></a>
              <a href="detailtransaksi.php?idtransaksi=<?= $trans['idtransaksi']; ?>"><button class="update">Detail</button></a>
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
      fetch('transAjax.php?keyword=' + keyword.value)
        .then((response) => response.text())
        .then((response) => (table.innerHTML = response));
    });
  </script>
</body>

</html>