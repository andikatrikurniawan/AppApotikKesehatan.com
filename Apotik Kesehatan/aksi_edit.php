<?php
include ('koneksi.php');

$id = $_POST['id_pasokan'];
$obat =$_POST['id_obat'];
$supplier =$_POST['id_supplier'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];

$koneksi->query("UPDATE pasokan SET id_obat='$obat',id_supplier='$supplier',jumlah='$jumlah', tanggal='$tanggal' 
        WHERE id_pasokan='$id'");
 echo "Data Berhasil Diperbarui";
?>
