<?php

function connection() {
  return mysqli_connect('localhost', 'root', '', 'proyek_apotiku');
}

function query($query) {
  $conn = connection();
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function search($keyword) {
  $conn = connection();

  $query = "SELECT * FROM tb_transaksi
            INNER JOIN tb_pelanggan USING(idpelanggan)
            INNER JOIN tb_karyawan USING(idkaryawan)
            WHERE namapelanggan LIKE '%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function umum() {
  $conn = connection();

  $idPel = 3;
  $idKrywn = $_SESSION['idkaryawan'];
  $tglTrans = date('Y-m-d');
  $kategPel = 'Umum';

  mysqli_query($conn, "INSERT INTO tb_transaksi VALUES (
    null, $idPel, $idKrywn, '$tglTrans', '$kategPel', 0, 0, 0
  )") or die(mysqli_error($conn));
  
  $idTrans = mysqli_query($conn, "SELECT LAST_INSERT_ID()");
  $hasilIdTrans = mysqli_fetch_row($idTrans);
  $_SESSION['idtransaksi'] = $hasilIdTrans[0];

  if (!$hasilIdTrans) {
    die('Gagal' . mysqli_error($conn));
  } else {
    return mysqli_affected_rows($conn);
  }
}

function member($data) {
  $conn = connection();

  $namaPel = htmlspecialchars($data['namaPelanggan']);
  $queryIdPel = query("SELECT idpelanggan FROM tb_pelanggan WHERE namapelanggan = '$namaPel'")[0];

  $idPel = $queryIdPel['idpelanggan'];
  $idKrywn = $_SESSION['idkaryawan'];
  $tglTrans = date('Y-m-d');
  $kategori = 'member';

  mysqli_query($conn, "INSERT INTO tb_transaksi VALUES (
    null, $idPel, $idKrywn, '$tglTrans', '$kategori', 0, 0, 0
  )") or die(mysqli_error($conn));

  $idTrans = mysqli_query($conn, "SELECT LAST_INSERT_ID()");
  $hasilIdTrans = mysqli_fetch_row($idTrans);
  $_SESSION['idtransaksi'] = $hasilIdTrans[0];

  return mysqli_affected_rows($conn);
}

function more($data) {
  $conn = connection();

  $namaObat = $data['obat'];
  $queryObat = query("SELECT idobat, hargajual FROM tb_obat WHERE namaobat = '$namaObat'")[0];

  $idTrans = $_SESSION['idtransaksi'];
  $idObat = $queryObat['idobat'];
  $jumlah = $data['jumlah'];
  $hargaSatuan = $queryObat['hargajual'];
  $totalHarga = $jumlah * $hargaSatuan;

  mysqli_query($conn, "INSERT INTO tb_detail_transaksi VALUES (
    null, $idTrans, $idObat, $jumlah, $hargaSatuan, $totalHarga
  )") or die(mysqli_error($conn));
}

function saveTrans($data) {
  $conn = connection();

  $idTrans = $_SESSION['idtransaksi'];
  $totalBayar = mysqli_fetch_row(mysqli_query($conn, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi = $idTrans"))[0];
  $bayar = $data['bayar'];
  $kembali = $bayar - $totalBayar;

  mysqli_query($conn, "UPDATE tb_transaksi SET 
                        totalbayar = $totalBayar, 
                        bayar = $bayar, 
                        kembali = $kembali
                        WHERE idtransaksi = $idTrans") 
                        or die(mysqli_error($conn));

  return query("SELECT * FROM tb_transaksi WHERE idtransaksi = $idTrans")[0];
}

function delete($idtrans) {
  $conn = connection();
  mysqli_query($conn, "DELETE FROM tb_transaksi WHERE idtransaksi = $idtrans");
  return mysqli_affected_rows($conn);
}
