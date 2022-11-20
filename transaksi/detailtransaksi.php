<?php
session_start();
require 'transFunctions.php';

$conn = connection();

if (@$_GET['idtransaksi']) {
  $idTrans = $_GET['idtransaksi'];
} else {
  $idTrans = $_SESSION['idtransaksi'];
}

// $idTrans = $_SESSION['idtransaksi'];
$dataTrans = query("SELECT * FROM tb_transaksi WHERE idtransaksi = '$idTrans'")[0];

$idPel = $dataTrans['idpelanggan'];
$dataPel = query("SELECT namapelanggan FROM tb_pelanggan WHERE idpelanggan = '$idPel'")[0];

$idKywn = $dataTrans['idkaryawan'];
$dataKywn = query("SELECT namakaryawan FROM tb_karyawan WHERE idkaryawan = '$idKywn'")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Transaksi</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="../CSS/style.php">
  <!-- Link FontAwesome -->
  <!-- Link Fontawesome -->
  <script src="https://kit.fontawesome.com/1c6364f841.js" crossorigin="anonymous"></script>
</head>

<body>
  <a class="back-btn" href="datatransaksi.php"><i class="fa-solid fa-arrow-left"></i></a>
  <h1 class="tittle-detail">Detail Transaksi</h1>

  <main class="content-detail">
    <div class="data-nota">
      <p class="head">Kategori Pelanggan</p>
      <p><?= $dataTrans['kategoripelanggan']; ?></p>
      <p class="head">Pelanggan</p>
      <p><?= $dataPel['namapelanggan']; ?></p>
      <p class="head">Tanggal Transaksi</p>
      <p><?= $dataTrans['tgltransaksi']; ?></p>
      <p class="head">Nama Karyawan</p>
      <p><?= $dataKywn['namakaryawan']; ?></p>
    </div>

    <table class="data-transaksi">
      <thead>
        <td>Nama Obat</td>
        <td>Jumlah</td>
        <td>Harga Satuan</td>
        <td>Total Harga</td>
      </thead>
      <?php if (@$_POST['more']) more($_POST); ?>
      <?php $detail = query("SELECT * FROM tb_detail_transaksi WHERE idtransaksi = $idTrans"); ?>
      <?php foreach ($detail as $det) : ?>
        <tbody>
          <td>
            <?php $idObat = $det['idobat']; ?>
            <?php $namaObat = query("SELECT namaobat FROM tb_obat WHERE idobat = $idObat")[0]; ?>
            <?= $namaObat['namaobat']; ?>
          </td>
          <td><?= $det['jumlah']; ?></td>
          <td><?= number_format($det['hargasatuan'], 0, ',', '.'); ?></td>
          <td><?= number_format($det['totalharga'], 0, ',', '.'); ?></td>
        </tbody>
      <?php endforeach; ?>
      <tr>
        <td colspan="3">Total Transaksi</td>
        <?php $grandTotal = mysqli_fetch_row(mysqli_query($conn, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi = $idTrans"))[0]; ?>
        <td><?= number_format($grandTotal, 0, ',', '.'); ?></td>
      </tr>
    </table>

    <?php if (@$_POST['finish']) : ?>
      <form action="" method="POST" style="border: 2px solid #000; width: fit-content; padding: 15px;">
        <label for="jumlahBayar"><h2>Masukkan Jumlah Bayar</h2></label>
        <input type="number" id="jumlahBayar" name="bayar" placeholder="Jumlah Bayar...">
        <input type="submit" value="Simpan Transaksi" name="simpan_transaksi">
      </form>
      <?php  elseif (@$_POST['simpan_transaksi']) : ?>
        <?php $transaksi = saveTrans($_POST); ?>
    <div class="data-nota">
        <p class="head">Bayar</p>
        <p><?= number_format($transaksi['bayar'], 0, ',', '.'); ?></p>
        <p class="head">Total Bayar</p>
        <p><?= number_format($transaksi['totalbayar'], 0, ',', '.'); ?></p>
        <p class="head">Kembali</p>
        <p><?= number_format($transaksi['kembali'], 0, ',', '.'); ?></p>
      </div>
      <div class="btn">
        <a href="datatransaksi.php"><button id="lihatTrans">Lihat Semua Transaksi</button></a>
      </div>
    <?php else : ?>
      <?php if (!@$_GET['idobat']):  ?>
      <form action="" method="POST">
        <input type="text" list="obat" name="obat" placeholder="Pilih Obat">
        <datalist id="obat">
          <?php $dataObat = query("SELECT namaobat, hargajual FROM tb_obat"); ?>
          <?php foreach ($dataObat as $obat) : ?>
            <option value="<?= $obat['namaobat']; ?>"> | Rp.<?= number_format($obat['hargajual'], 0, ',', '.'); ?>
          <?php endforeach; ?>
        </datalist>
        <input type="number" name="jumlah" placeholder="Jumlah" style="width: 80px;">
        <br><br>
        <input type="submit" value="Masukkan Obat" name="more">
        <input type="submit" value="Selesai" name="finish">
      </form>
      <?php endif; ?>
    <?php endif; ?>
    <!-- <div class="btn">
      <button id="transBaru">Masukkan Transaksi Baru</button>
      <button id="lihatTrans">Lihat Semua Transaksi</button>
    </div> -->
  </main>

  <script src="../JS/detail.js"></script>
</body>

</html>