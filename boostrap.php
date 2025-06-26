<?php
include('Apotik Kesehatan/Koneksi.php');

// Ambil data pasokan + supplier
$sql = "SELECT pasokan.*, supplier.nama_supplier 
        FROM pasokan 
        JOIN supplier ON pasokan.id_supplier = supplier.id_supplier";
$query = mysqli_query($koneksi, $sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pasokan Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

    <h2>Data Pasokan Obat</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-white">
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
            <?php while ($row = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?= $row['nama_admin'] ?></td>
                    <td><?= $row['nama_obat'] ?></td>
                    <td><?= $row['jenis'] ?></td>
                    <td><?= $row['nama_supplier'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['tanggal'] ?></td>
                    <td>
                        <!-- Tombol Edit -->
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id_pasokan'] ?>">
                            Edit
                        </button>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalEdit<?= $row['id_pasokan'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $row['id_pasokan'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="aksi_edit.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel<?= $row['id_pasokan'] ?>">Edit Data Pasokan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $row['id_pasokan'] ?>">

                                            <div class="mb-3">
                                                <label>Nama Admin</label>
                                                <input type="text" name="nama_admin" class="form-control" value="<?= $row['nama_admin'] ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Nama Obat</label>
                                                <input type="text" name="nama_obat" class="form-control" value="<?= $row['nama_obat'] ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Jenis</label>
                                                <input type="text" name="jenis" class="form-control" value="<?= $row['jenis'] ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Supplier</label>
                                                <select name="id_supplier" class="form-select" required>
                                                    <?php
                                                    $sup = mysqli_query($koneksi, "SELECT * FROM supplier");
                                                    while ($s = mysqli_fetch_assoc($sup)) {
                                                        $selected = ($s['id_supplier'] == $row['id_supplier']) ? 'selected' : '';
                                                        echo "<option value='{$s['id_supplier']}' $selected>{$s['nama_supplier']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label>Jumlah</label>
                                                <input type="number" name="jumlah" class="form-control" value="<?= $row['jumlah'] ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" value="<?= $row['tanggal'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Hapus -->
                        <button class="btn btn-danger btn-sm" onclick="hapusApotik(<?= $row['id_pasokan'] ?>)">Hapus</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>