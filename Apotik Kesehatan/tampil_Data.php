<?php
include('koneksi.php');
$sql = "SELECT pasokan.*,supplier.nama_supplier
                FROM pasokan 
                JOIN supplier ON pasokan.id_supplier = supplier.id_supplier";
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apotik Kesehatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?= $row['nama_admin'] ?></td>
                        <td><?= $row['nama_obat'] ?></td>
                        <td><?= $row['jenis'] ?></td>
                        <td><?= $row['nama_supplier'] ?></td>
                        <td><?= $row['jumlah'] ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm btnEdit" data-id="<?= $row['id_pasokan'] ?>"><i class="fas fa-edit"></i>  Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="hapusApotik(<?= $row['id_pasokan'] ?>)"><i class="fas fa-trash"></i>  Hapus</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Modal kosong -->
        <div class="modal fade" id="modalEdit" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" id="modalContent">
                    <!-- Konten akan diisi via AJAX -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>