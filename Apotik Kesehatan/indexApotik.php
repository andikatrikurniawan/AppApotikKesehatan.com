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
    if (confirm('Yakin ingin menghapus data ini?')) {
      $.ajax({
        url: 'aksi_hapus.php',
        type: 'POST',
        data: { id: id },
        success: function(res) {
          alert(res);         // tampilkan alert respons
          loadApotik();      // reload data pegawai
        },
        error: function() {
          alert('Gagal menghapus data.');
        }
      });
    }
  }

  // AJAX EDIT
$(document).on('click', '.btnEdit', function () {
    var id = $(this).data('id');
    $.get('form_edit.php', { id: id }, function (res) {
      $('#modalContent').html(res);
      var modal = new bootstrap.Modal(document.getElementById('modalEdit'));
      modal.show();
    });
  });

  // Letakkan handler submit form di sini, agar selalu aktif meski form di-load dinamis
  $(document).on('submit', '#formEdit', function(e){
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'aksi_edit.php',
      data: $(this).serialize(),
      success: function(res) {
        alert(res);
        // tutup modal dan reload halaman
        $('#modalEdit').modal('hide');
        loadApotik();
      },
      error: function(xhr) {
        alert("Error: " + xhr.responseText);
      }
    });
  });
    $(document).ready(function() {
      loadApotik();
    });
  </script>

</body>
</html>
