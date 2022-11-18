<?php
require 'obatFunctions.php';
$dataObat = search($_GET['keyword']);
?>

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

  <?php if (empty($dataObat)) : ?>
    <tbody>
      <td colspan="7" align="center">Obat Tidak Ditemukan</td>
    </tbody>
  <?php endif; ?>

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
        <a href="obatDelete.php?idobat=<?= $obat['idobat']; ?>" onclick="confirm('Yakin ingin menghapus data ini?')"><button id="del">Hapus</button></a>
        <a href="dataobat.php?idobat=<?= $obat['idobat']; ?>"><button class="update">Update</button></a>
      </td>
    </tbody>
  <?php endforeach; ?>
</table>