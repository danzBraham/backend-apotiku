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

  $query = "SELECT * FROM tb_karyawan WHERE namakaryawan LIKE '%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function insert($data) {
  $conn = connection();

  $karyawan = htmlspecialchars($data['karyawan']);
  $alamat = htmlspecialchars($data['alamat']);
  $telp = htmlspecialchars($data['telp']);

  $query = "INSERT INTO tb_karyawan VALUES (
    null, '$karyawan', '$alamat', '$telp'
  )";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function update($data) {
  $conn = connection();

  $idKywn = htmlspecialchars($data['idkaryawan']);
  $karyawan = htmlspecialchars($data['karyawan']);
  $alamat = htmlspecialchars($data['alamat']);
  $telp = htmlspecialchars($data['telp']);

  $query = "UPDATE tb_karyawan SET
            namakaryawan = '$karyawan',
            alamat = '$alamat',
            telp = '$telp'
            WHERE idkaryawan = '$idKywn'";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function delete($idsupp) {
  $conn = connection();
  mysqli_query($conn, "DELETE FROM tb_supplier WHERE idsupplier = $idsupp");
  return mysqli_affected_rows($conn);
}
