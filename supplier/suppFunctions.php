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

  $query = "SELECT * FROM tb_supplier WHERE perusahaan LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function insert($data) {
  $conn = connection();

  $perusahaan = htmlspecialchars($data['perusahaan']);
  $telp = htmlspecialchars($data['telp']);
  $alamat = htmlspecialchars($data['alamat']);
  $ket = htmlspecialchars($data['ket']);

  $query = "INSERT INTO tb_supplier VALUES (
    null, '$perusahaan', '$telp', '$alamat', '$ket'
  )";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function update($data) {
  $conn = connection();

  $idSupp = htmlspecialchars($data['idsupplier']);
  $perusahaan = htmlspecialchars($data['perusahaan']);
  $telp = htmlspecialchars($data['telp']);
  $alamat = htmlspecialchars($data['alamat']);
  $ket = htmlspecialchars($data['ket']);

  $query = "UPDATE tb_supplier SET
            idsupplier = '$idSupp',
            perusahaan = '$perusahaan',
            telp = '$telp',
            alamat = '$alamat',
            keterangan = '$ket'
            WHERE idsupplier = '$idSupp'";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function delete($idsupp) {
  $conn = connection();
  mysqli_query($conn, "DELETE FROM tb_supplier WHERE idsupplier = $idsupp");
  return mysqli_affected_rows($conn);
}
