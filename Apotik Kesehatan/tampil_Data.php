<?php
include ('koneksi.php');
        $sql = "SELECT pasokan.*,obat.nama_obat, obat.harga, supplier.nama_supplier
                FROM pasokan 
                JOIN obat ON pasokan.id_obat = obat.id_obat
                JOIN supplier ON pasokan.id_supplier = supplier.id_supplier";
        $query = mysqli_query($koneksi, $sql);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Apotik Kesehatan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h3 class="mb-3">Data Pasokan Obat</h3>
  <div class="table-responsive">
  <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Admin</th>
                <th>Nama Obat</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Supplier</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($query)) {?>
            <tr>
                <td><?= $row['nama_admin'] ?></td>
                <td><?= $row['nama_obat'] ?></td>
                <td><?= $row['jenis'] ?></td>
                <td><?= $row['harga'] ?></td>
                <td><?= $row['nama_supplier'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                    <a href="form_edit.php?id=<?= $row['id_pasokan'] ?>" class="btn btn-warning btn-sm ms-3">Edit</a>
                    <a href="aksi_hapus.php?id=<?= $row['id_pasokan'] ?>" class="btn btn-danger btn-sm ms-3" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>

