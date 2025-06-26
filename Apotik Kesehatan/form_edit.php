<?php
include('koneksi.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  echo "<div class='p-3 text-danger'>ID pasokan tidak valid.</div>";
  exit;
}

$id = intval($_GET['id']);
$row = $koneksi->query("SELECT * FROM pasokan p
                        JOIN supplier s ON p.id_supplier = s.id_supplier
                        WHERE p.id_pasokan = $id")->fetch_assoc();
$sup = $koneksi->query("SELECT * FROM supplier");
?>

<div class="modal-header">
  <h5 class="modal-title">Edit Data Pasokan</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<form id="formEdit">
  <input type="hidden" name="id" value="<?= $row['id_pasokan'] ?>">

  <div class="modal-body">
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
        <?php while($s = $sup->fetch_assoc()): ?>
          <option value="<?= $s['id_supplier'] ?>" <?= $s['id_supplier'] == $row['id_supplier'] ? 'selected' : '' ?>>
            <?= $s['nama_supplier'] ?>
          </option>
        <?php endwhile ?>
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
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
  </div>
</form>