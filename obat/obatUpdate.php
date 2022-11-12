<?php 
require './obatFunctions.php';

if (!isset($_GET['idobat'])) {
  header("Location: ./obatView.php");
  exit;
}

$id = $_GET['idobat'];
$dataObat = query("SELECT * FROM tb_obat WHERE idobat = $id") [0];

$idSupply = $dataObat['idsupplier'];
$dataSupplierObat = query("SELECT idsupplier, perusahaan FROM tb_supplier WHERE idsupplier = $idSupply") [0];
$dataSupplier = query('SELECT idsupplier, perusahaan FROM tb_supplier');

if (@$_POST['submit']) {
  if (update($_POST) > 0) {
    echo "<script>
            alert('Data Succesfully Updated!');
            document.location.href = './obatView.php';
          </script>";
} else {
    echo "<script>
            alert('Data Failed to Update!');
</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Obat Update</title>
</head>
<body>

  <h1>Obat Update</h1>

  <form action="" method="POST">
    <table>
      <tr>
        <input type="hidden" name="idobat" value="<?= $dataObat['idobat']; ?>">
        <td>ID Supplier</td>
        <td>
          <select name="idsupplier">
            <option value="<?= $dataSupplierObat['idsupplier']; ?>"><?= $dataSupplierObat['perusahaan']; ?></option>
            <?php foreach($dataSupplier as $sup) : ?>
            <option value="<?= $sup['idsupplier']; ?>"><?= $sup['perusahaan']; ?></option>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Nama Obat</td>
        <td><input type="text" name="obat" value="<?= $dataObat['namaobat']; ?>"></td>
      </tr>
      <tr>
        <td>Kategori Obat</td>
        <td><input type="text" name="kategori" value="<?= $dataObat['kategoriobat']; ?>"></td>
      </tr>
      <tr>
        <td>Harga Jual</td>
        <td><input type="number" name="jual" value="<?= $dataObat['hargajual']; ?>"></td>
      </tr>
      <tr>
        <td>Harga Beli</td>
        <td><input type="number" name="beli" value="<?= $dataObat['hargabeli']; ?>"></td>
      </tr>
      <tr>
        <td>Stok</td>
        <td><input type="number" name="stok" value="<?= $dataObat['hargabeli']; ?>"></td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td><textarea name="ket" cols="30" rows="10"><?= $dataObat['keterangan']; ?></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit" name="submit">Update</button></td>
      </tr>
    </table>
  </form>

</body>
</html>