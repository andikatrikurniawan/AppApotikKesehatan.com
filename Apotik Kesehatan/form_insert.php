<?php include ('koneksi.php'); 
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<form id="formTambah">
  <div class="mb-3">
            <div class="mb-3">
            <label>Nama Admin</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
            <div class="mb-3">
            <label>Obat</label>
            <input type="text" name="obat" class="form-control" required>
        </div>
        </div>
        <div class="mb-3">
            <label>Jenis</label>
            <input type="text" name="jenis" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Supplier</label>
            <select name="id_supplier" class="form-control">
                <option value="">-- Pilih Supplier --</option>
                <?php
                $sup = mysqli_query($koneksi, "SELECT * FROM supplier");
                while ($s = mysqli_fetch_assoc($sup)) {
                    echo "<option value='{$s['id_supplier']}'>{$s['nama_supplier']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <button class="btn btn-primary ms-3" type="submit"><i class="fa-thin fa-floppy-disk"></i>  Simpan</button>
       <button type="button" class="btn btn-outline-secondary" id="btnKembali"><i class="fa-solid fa-rotate-left"></i>  Kembali</button> <br><br>
    </form>

<script>
$('#formTambah').submit(function(e){
  e.preventDefault();
  $.post('aksi_simpan.php', $(this).serialize(), function(res) {
    alert(res);
    $('#formArea').html('');
    $('#dataApotik').load('tampil_Data.php').fadeIn;
  });
});

$('#btnKembali').click(function(){
    $('#formArea').html('');
    $('#dataPegawai').load('tampil_pegawai.php').fadeIn();
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
