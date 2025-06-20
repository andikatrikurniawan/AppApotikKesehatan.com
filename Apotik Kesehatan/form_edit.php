<?php
include ('koneksi.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  echo "<div class='alert alert-danger'>ID pegawai tidak valid.</div>";
  exit;
}

$id = intval($_GET['id']);
$obat = $koneksi->query("SELECT * FROM obat");
$supplier = $koneksi->query("SELECT * FROM supplier");
$data = $koneksi->query("SELECT * FROM pasokan p 
                        JOIN obat pd ON p.id_obat = pd.id_obat
                        JOIN supplier sp ON p.id_supplier = sp.id_supplier 
                        WHERE p.id_pasokan = $id ")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pasokan Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2>Edit Data Pasokan Obat</h2>
<form id="formEdit">
    <input type="hidden" name="id" value="<?= $data['id_pasokan'] ?>">

        <label>Obat</label>
      <select name="id_obat" class="form-select">
        <?php while($O = $obat->fetch_assoc()): ?>
          <option value="<?= $O['id_obat'] ?>" <?= $data['id_obat'] == $O['id_obat'] ? 'selected' : '' ?>>
            <?= $O['nama_obat'] ?>
          </option>
        <?php endwhile ?>
      </select>
        </div>
        <div class="mb-3">
            <label>Jenis</label>
            <input type="text" name="jenis" class="form-control"  value="<?= $data['jenis'] ?>" required>
        </div>
        <div class="mb-2">
      <label>Supplier</label>
      <select name="id_supplier" class="form-select">
        <?php while($s = $supplier->fetch_assoc()): ?>
          <option value="<?= $s['id_supplier'] ?>" <?= $data['id_supplier'] == $s['id_supplier'] ? 'selected' : '' ?>>
            <?= $s['nama_supplier'] ?>
          </option>
        <?php endwhile ?>
      </select>
    </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="<?= $data['jumlah'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
        </div>
        <button class="btn btn-success" type="submit">Update</button>
        <a href="indexApotik.php" class="btn btn-secondary">Kembali</a>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI Datepicker (optional jika tetap ingin kalender input) -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
$('#formEdit').submit(function(e){
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: 'aksi_edit.php',
    data: $(this).serialize(),
    success: function(res){
        alert(res);
        $('#formArea').slideUp();
        $('#dataApotik').hide().load('tampil_Data.php').fadeIn();
    }
  });
});
 $(function(){
    $('input[type="date"]').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "1960:2025"
    });
    });
</script>

</body>
</html>