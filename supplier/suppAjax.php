<?php
require 'suppFunctions.php';
$dataSupp = search($_GET['keyword']);
?>

<h2>Daftar Supplier</h2>
<table>
  <thead>
    <td>Nama Supplier</td>
    <td>No Tlp.</td>
    <td>Alamat</td>
    <td>Keterangan</td>
    <td>Aksi</td>
  </thead>

  <?php if (empty($dataSupp)) : ?>
    <tbody>
      <td>Supplier Tidak Ditemukan</td>
    </tbody>
  <?php endif; ?>

  <?php foreach ($dataSupp as $supp) : ?>
    <tbody>
      <td><?= $supp['perusahaan']; ?></td>
      <td><?= $supp['telp']; ?></td>
      <td><?= $supp['alamat']; ?></td>
      <td><?= $supp['keterangan']; ?></td>
      <td class="btn">
        <a href="suppDelete.php?idsupplier=<?= $supp['idsupplier']; ?>"><button id="del">Hapus</button></a>
        <button class="update">Update</button>
      </td>
    </tbody>
  <?php endforeach; ?>
</table>