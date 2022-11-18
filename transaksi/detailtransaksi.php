<?php
session_start();
require 'transFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../CSS/style.php">
    <!-- Link FontAwesome -->
    <!-- Link Fontawesome -->
    <script src="https://kit.fontawesome.com/1c6364f841.js" crossorigin="anonymous"></script>
</head>

<body>
    <a class="back-btn" href="datatransaksi.php"><i class="fa-solid fa-arrow-left"></i></a>
    <h1 class="tittle-detail">Detail Transaksi</h1>

    <main class="content-detail">
        <div class="data-nota">
            <p class="head">Kategori Pelanggan</p>
            <p>Lansia</p>
            <p class="head">Pelanggan</p>
            <p>Suryadana</p>
            <p class="head">Tanggal Transaksi</p>
            <p>19-01-2022</p>
        </div>

        <table class="data-transaksi">
            <thead>
                <td>Nama Obat</td>
                <td>Jumlah</td>
                <td>Harga Satuan</td>
                <td>Total Harga</td>
            </thead>
            <tbody>
                <td>Sinovac</td>
                <td>2</td>
                <td>420.000</td>
                <td>840.000</td>
            </tbody>
            <tr>
                <td>Paracetamol</td>
                <td>1</td>
                <td>20.000</td>
                <td>20.000</td>
            </tr>
            <tr>
                <td colspan="3">Total Transaksi</td>
                <td>860.000</td>
            </tr>
        </table>

        <div class="data-nota">
            <p class="head">Bayar</p>
            <p>900.000</p>
            <p class="head">Total Bayar</p>
            <p>860.000</p>
            <p class="head">Kembali</p>
            <p>40.000</p>
        </div>

        <div class="btn">
            <button id="transBaru">Masukkan Transaksi Baru</button>
            <button id="lihatTrans">Lihat Semua Transaksi</button>
        </div>
    </main>

    <script src="JS/detail.js"></script>
</body>

</html>