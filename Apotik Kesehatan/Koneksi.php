<?php
$koneksi = new mysqli("localhost", "root", "", "apotek");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
