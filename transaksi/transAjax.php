<?php
require 'transFunctions.php'; 
$dataTrans = search($_GET['keyword']);
?>

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

  <?php if (empty($dataTrans)) : ?>
    <tbody>
      <td colspan="8" align="center">Transaksi Tidak Ditemukan</td>
    </tbody>
  <?php endif; ?>

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