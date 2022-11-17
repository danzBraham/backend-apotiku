<?php
session_start();
require 'kywnFunctions.php';

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
          alert('Anda Karyawan!');
          document.location.href = '../dashboard.php';
        </script>";
}

$idKywn = $_GET["idkaryawan"];

if (delete($idKywn) > 0) {
  echo "<script>
          alert('Deleted');
          document.location.href = 'datakaryawan.php';
        </script>";
} else {
  echo "<script>
          alert('Failed Delete');
          document.location.href = 'datakaryawan.php';
        </script>";
}
