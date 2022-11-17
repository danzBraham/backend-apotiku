<?php
session_start();
require 'pelFunctions.php';

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
          alert('Anda Karyawan!');
          document.location.href = '../dashboard.php';
        </script>";
}

$idPel = $_GET["idpelanggan"];

if (delete($idPel) > 0) {
  echo "<script>
          alert('Deleted');
          document.location.href = 'datapelanggan.php';
        </script>";
} else {
  echo "<script>
          alert('Failed Delete');
          document.location.href = 'datapelanggan.php';
        </script>";
}
