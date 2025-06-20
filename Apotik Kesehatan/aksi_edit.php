<?php
include ('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id         = intval($_POST['id']);
    $nama       = intval($_POST['id_obat']);
    $jenis       = $koneksi->real_escape_string($_POST['jenis']);
    $id_supplier = intval($_POST['id_supplier']);
    $jumlah    = $koneksi->real_escape_string($_POST['jumlah']);
    $tggl       = $koneksi->real_escape_string($_POST['tggl']);

    // Update tabel obat
    $updateObat = $koneksi->query("
        UPDATE pasokan SET 
                id_obat = '$nama',
                jenis  = '$jenis',
                id_supplier = '$id_supplier',
                jumlah = '$jumlah',
                tanggal = '$tggl'
                WHERE id_pasokan = '$id'
            ");
        
    if ($updateObat) {
        echo "Data Berhasil Diperbarui";
    } else {
        echo "Gagal memperbarui data: " . $koneksi->error;
    }
} else {
    echo "Permintaan tidak valid.";
}
?>

