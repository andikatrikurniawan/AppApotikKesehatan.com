<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APOTIK</title>

  <!-- ✅ Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- ✅ jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

  <!-- ✅ Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Optional: jQuery UI untuk datepicker -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body class="bg-light">

  <!-- ✅ Header -->
  <div class="container-fluid bg-success py-4 text-center text-white w-100">
    <h2 class="mb-0">Apotik Kesehatan</h2>
  </div>

  <!-- ✅ Isi -->
  <div class="container mb-5">

    <!-- Form -->
    <div class="mb-3 mt-4" id="formArea"></div>

    <!-- Tombol -->
    <div class="mb-4">
      <button class="btn btn-outline-primary" onclick="loadFormInsert()">+ Pasokan Obat</button>
    </div>

    <!-- Data -->
    <div id="dataApotik"></div>
  </div>

  <script>
    function loadFormInsert() {
      $('#formArea').load('form_insert.php');
    }

    function loadApotik() {
      $('#dataApotik').hide().load('tampil_Data.php').fadeIn();
    }

    function hapusApotik(id) {
      if (confirm("Yakin ingin menghapus?")) {
        $.post('aksi_hapus.php', { id: id }, function(res) {
          alert(res);
          loadApotik();
        });
      }
    }

    function editApotik(id) {
      $('#formArea').load('aksi_edit.php?id=' + id);
    }

    $(document).ready(function() {
      loadApotik();
    });
  </script>

</body>
</html>
