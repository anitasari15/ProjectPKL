<!DOCTYPE html>
<html>
<head>
	<style>
  .text1 {
    color: red;
  }
  </style>
</head>
<body>

	<?php echo form_open('admin/ruangan/create', array('class' => 'needs-validation', 'novalidate' => '', 'enctype'=>'multipart/form-data')); ?>

	<div class="container" style="padding-top: 80px; text-align: center;">
    <div style="padding-left: 100px;">
      <ul class="breadcrumb">
      <li><?php echo anchor('admin/admin','Beranda'); ?></li>
      <li><?php echo anchor('admin/ruangan','Ruangan'); ?></li>
      <li>Tambah Ruangan</li>
    </ul>
    </div>
		<h1>Tambah Ruang Meeting</h1>
	</div>

	<div style="padding-top: 80px; padding-left: 250px">
		<table>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Ruangan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_ruangan" value="<?php echo set_value('nama_ruangan'); ?>">
          </div>
        </div>
        <br>
        <br>
        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Klasifikasi</label>
            <div class="col-sm-10">
              <select name="klasifikasi" class="form-control">
              <option value="Reguler">Reguler</option>
              <option value="Eksekutif">Eksekutif</option>
              <option value="Bisnis">Bisnis</option>
            </select>
            </div>
          </div>
        </div>
        <br><br>
        <div class="form-group">
      		<label class="col-sm-2 col-sm-2 control-label">Letak</label>
      		<div class="col-sm-10">
        	<input type="text" class="form-control" name="letak">
      		</div>
		    </div>
        <br><br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Fasilitas</label>
          <div class="col-sm-10">
          <textarea class="form-control" name="fasilitas"></textarea>
          <br>
          </div>
        </div>
        <br><br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Kapasitas</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="kapasitas">
          </div>
        </div>
        <br><br><br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Gambar Ruangan*</label>
          <div class="col-sm-10">
          <input type="file" class="form-control" name="gambar" id="preview_gambar" >
          <img id="gambar_nodin" width="300">
          <p class="text1"><b>*Gambar Ekstensi .jpg (max size 2MB)</b></p>
          </div>
        </div>
	       <br>
          <div class="col-sm-10">
          <input id="submitBtn" type="submit" name="simpan" value="simpan" class="btn btn-primary">
          <?php echo anchor('admin/ruangan','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
          </div>
    </table>

        <?php echo form_close(); ?>

      <script>
        function bacaGambar(input) {
      if (input.files && input.files[0]) {
      var reader = new FileReader();
 
      reader.onload = function (e) {
          $('#gambar_nodin').attr('src', e.target.result);
      }
 
      reader.readAsDataURL(input.files[0]);
         }
      }
      </script>
      <script>
        $("#preview_gambar").change(function(){
         bacaGambar(this);
      });
      </script>
</body>
</html>