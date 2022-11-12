<?php
require './obatFunctions.php';

$idobat = $_GET["idobat"];

if (delete($idobat) > 0) {
    echo "
        <script>
            alert('Deleted');
            document.location.href = './obatView.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Failed Delete');
            document.location.href = './obatView.php';
        </script>
    ";
}