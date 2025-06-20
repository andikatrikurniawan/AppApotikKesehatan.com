<?php include ('koneksi.php'); 
?>
<form id="formTambah">
  <div class="mb-3">
            <div class="mb-3">
            <label>Nama Admin</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
            <label>Obat</label>
            <select name="id_obat" class="form-control">
                <option value="">-- Pilih Obat --</option>
                <?php
                $obat = mysqli_query($koneksi, "SELECT * FROM obat");
                while ($o = mysqli_fetch_assoc($obat)) {
                    echo "<option value='{$o['id_obat']}'>{$o['nama_obat']}</option>";
                }
                ?>
            </select>
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
        <button class="btn btn-primary ms-3" type="submit">Simpan</button>
        <a href="indexApotik.html" class="btn btn-secondary ms-3">Kembali</a><br><br>
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
    $(function(){
    $('input[type="date"]').datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "1960:2025"
    });
    });
</script>
