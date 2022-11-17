<?php
session_start();
require 'obatFunctions.php';

if ($_SESSION['level'] !== 'admin') {
  echo "<script>
        alert('Anda Karyawan!');
        document.location.href = '../dashboard.php';
      </script>";
}

$idobat = $_GET["idobat"];

if (delete($idobat) > 0) {
  echo "<script>
          alert('Deleted');
          document.location.href = 'dataobat.php';
        </script>";
} else {
  echo "<script>
          alert('Failed Delete');
          document.location.href = 'dataobat.php';
        </script>";
}
