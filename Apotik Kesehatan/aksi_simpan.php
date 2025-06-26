<?php
include ('koneksi.php');

$obat = $_POST['obat'];
$nama    = $_POST['nama'];
$jenis   =$_POST['jenis'];
$id_supplier = $_POST['id_supplier'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];

$koneksi->query("INSERT INTO pasokan (nama_admin, nama_obat, jenis , id_supplier, jumlah, tanggal) 
        VALUES ('$nama','$obat','$jenis','$id_supplier', '$jumlah','$tanggal')");
echo "Data berhasil disimpan!";
?>
