<?php
require 'pelFunctions.php';
$dataPel = search($_GET['keyword']);
?>

<h2>Daftar Pelanggan</h2>
<table>
  <thead>
    <td>Nama Pelanggan</td>
    <td>No Telp</td>
    <td>Alamat</td>
    <td>Usia</td>
    <td>Bukti Resep</td>
    <td>Aksi</td>
  </thead>

  <?php if (empty($dataPel)) : ?>
    <tbody>
      <td>Pelanggan Tidak Ditemukan</td=>
    </tbody>
  <?php endif; ?>

  <?php foreach ($dataPel as $pel) : ?>
    <?php if ($pel['idpelanggan'] != 3) : ?>
      <tbody>
        <td><?= $pel['namapelanggan']; ?></td>
        <td><?= $pel['telp']; ?></td>
        <td><?= $pel['alamat']; ?></td>
        <td><?= $pel['usia']; ?></td>
        <td><img src="buktifoto/<?= $pel['buktifotoresep']; ?>" alt="foto resep"></td>
        <td class="btn">
          <a href="pelDelete.php?idpelanggan=<?= $pel['idpelanggan']; ?>"><button id="del">Hapus</button></a>
          <a href="datapelanggan.php?idpelanggan=<?= $pel['idpelanggan']; ?>"><button class="update">Update</button></a>
        </td>
      </tbody>
    <?php endif; ?>
  <?php endforeach; ?>
</table>