<?php
session_start();
require 'functions.php';

if (isset($_POST['register'])) {
  if (register($_POST) > 0) {
    echo "<script>
            alert('User Berhasil Ditambah!');
            document.location.href = 'dashboard.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal Menambah User!');
          </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apotiku</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="CSS/style.php" />
  <!-- Link Fontawesome -->
  <script src="https://kit.fontawesome.com/1c6364f841.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Login Page -->
  <section class="wrapper">
    <section class="register-page">
      <div class="img-container"></div>

      <div class="input-container">
        <h2>
          Halo, Selamat <br />
          Datang di <span class="active">Apotiku!</span> <span>👋</span>
        </h2>
        <h1>Register</h1>
        <form action="" method="POST" autocomplete="off">
          <div class="input-box">
            <label for="karyawan">Nama Karyawan</label>
            <div class="content">
              <i class="fa-solid fa-user"></i>
              <select name="idkaryawan" id="karyawan">
                <?php $dataKaryawan = query('SELECT * FROM tb_karyawan WHERE idkaryawan NOT IN (SELECT idkaryawan from tb_users)'); ?>
                <?php foreach ($dataKaryawan as $kywn) : ?>
                  <?php if ($kywn['idkaryawan'] !== 0) : ?>
                    <option value="<?= $kywn['idkaryawan']; ?>"><?= $kywn['namakaryawan']; ?></option>
                  <?php else : ?>
                    <option value="">Semua Karyawan Sudah Terdaftar</option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="input-box">
            <label for="username">Username</label>
            <div class="content">
              <i class="fa-solid fa-user"></i>
              <input type="text" name="username" id="username" />
            </div>
          </div>

          <div class="input-box">
            <!-- <div class="valdi"><label for="password">Password</label> <span>*Invalid Password</span></div> -->
            <label for="password">Password</label>
            <div class="content">
              <i class="fa-solid fa-lock"></i>
              <input type="password" name="password" id="password"/>
            </div>
          </div>

          <div class="input-box">
            <label for="confirmPass">Confirm Password</label>
            <div class="content">
              <i class="fa-solid fa-circle-check"></i>
              <input type="password" name="confirmPass" id="confirmPass" />
            </div>
          </div>

          <div class="input-box">
            <label for="level">Level</label>
            <div class="content">
              <i class="fa-solid fa-user"></i>
              <select name="level" id="level">
                <option value="karyawan">Karyawan</option>
                <option value="admin">Admin</option>
              </select>
            </div>
          </div>

          <button type="submit" name="register">Register</button>
        </form>
      </div>
    </section>
  </section>
  <script src="JS/script.js"></script>
</body>

</html>