<?php 
require './obatFunctions.php';

$dataSupplier = query('SELECT idsupplier, perusahaan FROM tb_supplier');

if (isset($_POST['add'])) {
  if (insert($_POST) > 0) {
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
  
  <h1>Obat Add</h1>

  <form action="" method="POST">
    <table>
      <tr>
        <td>ID Supplier</td>
        <td>
          <select name="idsupplier">
            <?php foreach($dataSupplier as $sup) : ?>
            <option value="<?= $sup['idsupplier']; ?>"><?= $sup['perusahaan'];?></option>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Nama Obat</td>
        <td><input type="text" name="obat"></td>
      </tr>
      <tr>
        <td>Kategori Obat</td>
        <td><input type="text" name="kategori"></td>
      </tr>
      <tr>
        <td>Harga Jual</td>
        <td><input type="number" name="jual"></td>
      </tr>
      <tr>
        <td>Harga Beli</td>
        <td><input type="number" name="beli"></td>
      </tr>
      <tr>
        <td>Stok</td>
        <td><input type="number" name="stok"></td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td><textarea name="ket" cols="30" rows="10"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit" name="add">Add</button></td>
      </tr>
    </table>
  </form>

</body>
</html>