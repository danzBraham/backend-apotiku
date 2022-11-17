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
        <form action="" method="">
          <div class="input-box">
            <label for="karyawan">Nama Karyawan</label>
            <div class="content">
              <i class="fa-solid fa-user"></i>
              <select name="" id="karyawan">
                <option value="">Owi Ngawi</option>
                <option value="">Owi Ngawi</option>
                <option value="">Owi Ngawi</option>
              </select>
            </div>
          </div>

          <div class="input-box">
            <label for="username">Username</label>
            <div class="content">
              <i class="fa-solid fa-user"></i>
              <input autocomplete="off" type="text" name="username" />
            </div>
          </div>

          <div class="input-box">
            <div class="valdi"><label for="password">Password</label> <span>*Invalid Password</span></div>
            <div class="content">
              <i class="fa-solid fa-lock"></i>
              <input autocomplete="off" type="password" name="password" />
            </div>
          </div>

          <div class="input-box">
            <label for="confirmPass">Confirm Password</label>
            <div class="content">
              <i class="fa-solid fa-circle-check"></i>
              <input autocomplete="off" type="password" name="confirmPass" />
            </div>
          </div>

          <div class="input-box">
            <label for="karyawan">Level</label>
            <div class="content">
              <i class="fa-solid fa-user"></i>
              <select name="" id="karyawan">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
              </select>
            </div>
          </div>

          <button type="submit">Register</button>
        </form>
      </div>
    </section>
  </section>
  <script src="JS/script.js"></script>
</body>

</html>