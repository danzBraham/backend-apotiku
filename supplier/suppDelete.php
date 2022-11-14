<?php
session_start();
require 'suppFunctions.php';

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
      alert('Anda Karyawan!');
      document.location.href = '../dashboard.php';
    </script>";
}

$idsupp = $_GET["idsupplier"];

if (delete($idsupp) > 0) {
  echo "
    <script>
      alert('Deleted');
      document.location.href = 'datasupplier.php';
    </script>
  ";
} else {
  echo "
    <script>
      alert('Failed Delete');
      document.location.href = 'datasupplier.php';
    </script>
  ";
}
