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

function login($data) {
  $conn = connection();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if ($user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'"))) {
    if(password_verify($password, $user['password'])) {
      $_SESSION['login'] = true;
      $_SESSION['id'] = $user['id'];
      $_SESSION['level'] = $user['level'];
      $_SESSION['idkaryawan'] = $user['idkaryawan'];

      header('Location: dashboard.php');
      exit;
    }
  }

  return [
    'error' => true
  ];
}

function register($data) {
  $conn = connection();

  $idKywn = htmlspecialchars($data['idkaryawan']);
  $username = htmlspecialchars(strtolower($data['username']));
  $password = mysqli_real_escape_string($conn, $data['password']);
  $confirmPass = mysqli_real_escape_string($conn, $data['confirmPass']);
  $level = htmlspecialchars($data['level']);

  if (empty($idKywn) || empty($username) || empty($password) || empty($confirmPass)) {
    echo "<script>
              alert('Please fill in Username or Password');
              document.location.href = 'register.php';
          </script>";
    return false;
  }

  if (query("SELECT * FROM tb_users WHERE username = '$username'")) {
    echo "<script>
              alert('Username already exists');
              document.location.href = 'register.php';
          </script>";
    return false;
  }

  if ($password !== $confirmPass) {
    echo "<script>
            alert('your password invalid');
            document.location.href = 'register.php';
          </script>";
  }

  if (strlen($confirmPass) < 6) {
    echo "<script>
            alert('Your password is less than 5 digits');
            document.location.href = 'register.php';
          </script>";
    return false;
  }

  $pwsEncrypt = password_hash($confirmPass, PASSWORD_BCRYPT);

  $query = "INSERT INTO tb_users VALUES (
    null, '$username', '$pwsEncrypt', '$level', '$idKywn', 'jometal.jpg'
  )";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function upload() {
  $file_name = $_FILES['picture']['name'];
  $file_type = $_FILES['picture']['type'];
  $file_tmp = $_FILES['picture']['tmp_name'];
  $file_error = $_FILES['picture']['error'];
  $file_size = $_FILES['picture']['size'];
  if ($file_error == 4) {
    return 'pict.png';
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

  if ($file_type != 'image/jpeg' && $file_type != 'image/jpg' && $file_type != 'image/png') {
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
  move_uploaded_file($file_tmp, 'Assets/profilePict/' . $new_file_name);
  
  return $new_file_name;
}

function updateProfile($data) {
  $conn = connection();

  $idKar = htmlspecialchars($data['idkaryawan']);
  $username = htmlspecialchars($data['username']);
  $oldPict = htmlspecialchars($data['oldPicture']);

  $pict = upload();
    if (!$pict) {
      return false;
    }

    if ($pict == 'pict.png') {
      $pict = $oldPict;
    }

  $query = "UPDATE tb_users SET
            username = '$username',
            picture = '$pict'
            WHERE idkaryawan = '$idKar'";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
