<?php 
require 'obatFunctions.php';

$dataObat = search($_GET['keyword']);
?>

<table border="1">
  <tr>
    <th>NO</th>
    <th>NAMA SUPPLIER</th>
    <th>NAMA OBAT</th>
    <th>KATEGORI OBAT</th>
    <th>HARGA JUAL</th>
    <th>HARGA BELI</th>
    <th>STOK</th>
    <th>KETERANGAN</th>
    <th class="print">ACTIONS</th>
  </tr>

  <?php if (empty($dataObat)) : ?>
    <tr>
      <th colspan="9" style="color: red;">Obat Tidak Ditemukan</th>
    </tr>
  <?php endif; ?>

  <?php $i = 1; ?>
  <?php foreach($dataObat as $obat) : ?>
  <tr>  
    <td><?= $i++; ?></td>
    <?php $idSupplier = $obat['idsupplier']; ?>
    <?php $namaSupplier = query("SELECT perusahaan FROM tb_supplier WHERE idsupplier = $idSupplier"); ?>
    <?php foreach($namaSupplier as $sup) : ?>
    <td><?= $sup['perusahaan']; ?></td>
    <?php endforeach; ?>
    <td><?= $obat['namaobat']; ?></td>
    <td><?= $obat['kategoriobat']; ?></td>
    <td><?= $obat['hargajual']; ?></td>
    <td><?= $obat['hargabeli']; ?></td>
    <td><?= $obat['stok']; ?></td>
    <td><?= $obat['keterangan']; ?></td>
    <td class="print">
      <a href="./obat/obatUpdate.php?idobat=<?= $obat['idobat']; ?>">Update</a> |
      <a href="./obat/obatDelete.php?idobat=<?= $obat['idobat']; ?>">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>