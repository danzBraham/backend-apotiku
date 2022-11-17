<?php
require 'kywnFunctions.php';
$dataKywn = search($_GET['keyword']);
?>

<h2>Daftar Karyawan</h2>
<table>
  <thead>
    <td>Nama Karyawan</td>
    <td>Alamat</td>
    <td>No Telp</td>
    <td>Aksi</td>
  </thead>

  <?php if (empty($dataKywn)) : ?>
    <tbody>
      <td colspan="4" align="center">Karyawan Tidak Ditemukan</td>
    </tbody>
  <?php endif; ?>

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