<?php
session_start();
require 'functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: ./index.php");
  exit;
}

if (isset($_POST['update'])) {
  if (updateProfile($_POST) > 0) {
    echo "<script>
            alert('Berhasil Mengupdate Profil');
            document.location.href = 'dashboard.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal Mengupdate Profil');
          </script>";
  }
}

if (isset($_POST['cancel'])) {
  echo "<script>
          document.location.href = 'dashboard.php';
        </script>";
}

$id = $_GET['idkaryawan'];
$dataUser = query("SELECT * FROM tb_users WHERE idkaryawan = '$id'")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apotiku</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="CSS/style.php">
  <!-- Link Fontawesome -->
  <script src="https://kit.fontawesome.com/1c6364f841.js" crossorigin="anonymous"></script>
</head>

<body>
  <a class="back-btn" href="dashboard.php"><i class="fa-solid fa-arrow-left"></i></a>
  <h1 class="tittle-detail">Pengaturan Profile</h1>

  <main class="content-detail">
    <form action="" method="POST" enctype="multipart/form-data" class="form-data">
      <input type="hidden" name="idkaryawan" value="<?= $dataUser['idkaryawan']; ?>">
      <img src="Assets/profilePict/<?= $dataUser['picture']; ?>" alt="Foto Profil" id="imgPreview" />
      <div class="input-box">
        <label for="pilihProf">Pilih Profile</label>
        <input type="file" name="picture" id="pilihProf" onchange="previewImage()" />
        <input type="hidden" name="oldPicture" value="<?= $dataUser['picture']; ?>">
      </div>
      <div class="input-box">
        <label for="namaUser">Nama User</label>
        <input type="text" name="username" id="namaUser" value="<?= $dataUser['username']; ?>" />
      </div>
      <div class="btn">
        <input type="submit" name="cancel" value="Batal">
        <input type="submit" name="update" value="Simpan" class="next-btn">
      </div>
    </form>
  </main>

  <script src="JS/detail.js"></script>
  <script>
    function previewImage() {
      const imgInput = document.querySelector('#pilihProf');
      const imgPreview = document.querySelector('#imgPreview');

      const ofReader = new FileReader();
      ofReader.readAsDataURL(imgInput.files[0]);

      ofReader.onload = (ofREvent) => {
        imgPreview.src = ofREvent.target.result;
      }
    }
  </script>
</body>

</html>