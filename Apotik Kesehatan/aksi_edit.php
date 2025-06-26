<?php
include('koneksi.php');

// Aktifkan error reporting saat pengembangan
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama_admin'];
$obat = $_POST['nama_obat'];
$jenis = $_POST['jenis'];
$id_supplier = $_POST['id_supplier'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];

// Update ke database
$query = $koneksi->query("UPDATE pasokan SET 
    nama_obat = '$obat',
    nama_admin = '$nama',
    jenis = '$jenis',
    id_supplier = '$id_supplier',
    jumlah = '$jumlah',
    tanggal = '$tanggal'
    WHERE id_pasokan = '$id'
");

if ($query) {
    echo "Data berhasil diperbarui.";
} else {
    echo "Gagal memperbarui data: " . $koneksi->error;
}
?>
