<?php
include ('koneksi.php');
$id = $_POST['id'];
mysqli_query($koneksi, "DELETE FROM pasokan WHERE id_pasokan='$id'");
echo "Data Pasokan Berhasil DiHapus";
?>