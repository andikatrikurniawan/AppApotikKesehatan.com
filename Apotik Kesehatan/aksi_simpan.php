<?php
include ('koneksi.php');

$id_obat = $_POST['id_obat'];
$nama    = $_POST['nama'];
$jenis   =$_POST['jenis'];
$id_supplier = $_POST['id_supplier'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];

$koneksi->query("INSERT INTO pasokan (nama_admin, id_obat, jenis , id_supplier, jumlah, tanggal) 
        VALUES ('$nama','$id_obat','$jenis','$id_supplier', '$jumlah','$tanggal')");
echo "Data berhasil disimpan!";
?>
