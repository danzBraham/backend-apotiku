<?php
session_start();
require './functions.php';

if (isset($_SESSION['login'])) {
  header("Location: ./dashboard.php");
  exit;
}

if (isset($_POST['login'])) {
  $login = login($_POST);
}
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
  <!-- Login Page -->
  <section class="wrapper">
  <?php if (isset($login['error'])) : ?>
    <div class="pop-msg">
      <!--Ini Pop Up kalo Salah Username atau Password-->
      <p>Username atau Password Salah</p>
      <a href="">Oke</a>
    </div>
    <?php endif; ?>
    <section class="login-page">
      <div class="input-container">
        <h2>Halo, Selamat <br> Datang di <span class="active">Apotiku!</span> <span>👋</span></h2>
        <h1>Sign In</h1>
        <form action="" method="POST">
          <div class="input-box">
            <label for="username">Username</label>
            <div class="content">
              <i class="fa-solid fa-user"></i>
              <input autocomplete="off" type="text" name="username">
            </div>
          </div>
          <div class="input-box">
            <label for="password">Password</label>
            <div class="content">
              <i class="fa-solid fa-lock"></i>
              <input autocomplete="off" type="password" name="password">
            </div>
          </div>
          <button type="submit" name="login">Login</button>
        </form>
      </div>

      <div class="img-container"></div>
    </section>
  </section>
  <script src="JS/script.js"></script>
</body>

</html>