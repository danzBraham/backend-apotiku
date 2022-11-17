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

  $query = "SELECT * FROM tb_pelanggan WHERE namapelanggan LIKE '%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function upload() {
  $file_name = $_FILES['bukti']['name'];
  $file_type = $_FILES['bukti']['type'];
  $file_tmp = $_FILES['bukti']['tmp_name'];
  $file_error = $_FILES['bukti']['error'];
  $file_size = $_FILES['bukti']['size'];

  if ($file_error == 4) {
    return 'Tidak mengupload foto resep';
  }

  $extension_valid = ['jpg', 'jpeg', 'png'];
  $extension_file = explode('.', $file_name);
  $extension_file = strtolower(end($extension_file));

  if (!in_array($extension_file, $extension_valid)) {
  echo "<script>
          alert('You are not uploading an image');
        </script>";
  return false;
  }

  if ($file_type != 'image/jpeg' && $file_type != 'image/png') {
  echo "<script>
          alert('You are not uploading an image');
        </script>";
  return false;
  }

  if ($file_size > 5000000) {
  echo "<script>
          alert('The image size is too large');
        </script>";
  return false;
  }

  $new_file_name = uniqid() . '.' . $extension_file;
  move_uploaded_file($file_tmp, 'buktifoto/' . $new_file_name);
  
  return $new_file_name;
}

function insert($data) {
  $conn = connection();

  $nama = htmlspecialchars($data['namaPel']);
  $telp = htmlspecialchars($data['telp']);
  $alamat = htmlspecialchars($data['alamat']);
  $usia = htmlspecialchars($data['usia']);

  $bukti = upload();
  if (!$bukti) {
    return false;
  }

  $query = "INSERT INTO tb_pelanggan VALUES (
  null, '$nama', '$alamat', '$telp', '$usia', '$bukti'
  )";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function update($data) {
  $conn = connection();

  $idPel = htmlspecialchars($data['idpelanggan']);
  $nama = htmlspecialchars($data['namaPel']);
  $telp = htmlspecialchars($data['telp']);
  $alamat = htmlspecialchars($data['alamat']);
  $usia = htmlspecialchars($data['usia']);
  $buktiLama = htmlspecialchars($data['buktiLama']);

  $bukti = upload();
  if (!$bukti) {
    return false;
  }

  if ($bukti == 'Tidak mengupload foto resep') {
    $bukti = $buktiLama;
  }

  $query = "UPDATE tb_pelanggan SET
          namapelanggan = '$nama',
          telp = '$telp',
          alamat = '$alamat',
          usia = '$usia',
          buktifotoresep = '$bukti'
          WHERE idpelanggan = $idPel";

  mysqli_query($conn,$query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function delete($idPel) {
  $conn = connection();
  mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE idpelanggan = $idPel");
  return mysqli_affected_rows($conn);
}
