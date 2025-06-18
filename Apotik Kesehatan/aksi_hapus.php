<?php
include ('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pasokan WHERE id_pasokan='$id'");
header("Location: indexApotik.php");
?>