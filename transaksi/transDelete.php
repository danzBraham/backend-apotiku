<?php
session_start();
require 'transFunctions.php';

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
          alert('Anda Karyawan!');
          document.location.href = '../dashboard.php';
        </script>";
}

$idTrans = $_GET['idtransaksi'];

if (delete($idTrans) > 0) {
  echo "<script>
          alert('Deleted');
          document.location.href = 'datatransaksi.php';
        </script>";
} else {
  echo "<script>
          alert('Failed Delete');
          document.location.href = 'datatransaksi.php';
        </script>";
}
