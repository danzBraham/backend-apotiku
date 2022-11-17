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

  $query = "SELECT * FROM tb_obat WHERE namaobat LIKE '%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function insert($data) {
  $conn = connection();

  $idSupp = htmlspecialchars($data['idsupplier']);
  $obat = htmlspecialchars($data['obat']);
  $kateg = htmlspecialchars($data['kategori']);
  $jual = htmlspecialchars($data['jual']);
  $beli = htmlspecialchars($data['beli']);
  $stok = htmlspecialchars($data['stok']);
  $ket = htmlspecialchars($data['ket']);

  $query = "INSERT INTO tb_obat VALUES (
    null, '$idSupp', '$obat', '$kateg', '$jual', '$beli', '$stok', '$ket'
  )";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function update($data) {
  $conn = connection();

  $idObat = htmlspecialchars($data['idobat']);
  $idSupp = htmlspecialchars($data['idsupplier']);
  $obat = htmlspecialchars($data['obat']);
  $kateg = htmlspecialchars($data['kategori']);
  $jual = htmlspecialchars($data['jual']);
  $beli = htmlspecialchars($data['beli']);
  $stok = htmlspecialchars($data['stok']);
  $ket = htmlspecialchars($data['ket']);

  $query = "UPDATE tb_obat SET
            idsupplier = '$idSupp',
            namaobat = '$obat',
            kategoriobat = '$kateg',
            hargajual = '$jual',
            hargabeli = '$beli',
            stok = '$stok',
            keterangan = '$ket'
            WHERE idobat = '$idObat'";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function delete($idobat) {
  $conn = connection();
  mysqli_query($conn, "DELETE FROM tb_obat WHERE idobat = $idobat");
  return mysqli_affected_rows($conn);
}
