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
  echo "<script>
          alert('Berhasil Menghapus Data!');
          document.location.href = 'datasupplier.php';
        </script>";
} else {
  echo "<script>
          alert('Gagal Menghapus Data!');
          document.location.href = 'datasupplier.php';
        </script>";
}
