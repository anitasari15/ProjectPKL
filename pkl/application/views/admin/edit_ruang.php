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

	<?php foreach ($ruang as $key): ?>
      <?php echo form_open('admin/ruangan/edit/'.$key->id_ruangan, array('enctype'=>'multipart/form-data')); ?>

      <div class="container" style="padding-top: 80px; text-align: center;">
        <div style="padding-left: 100px;">
          <ul class="breadcrumb">
          <li><?php echo anchor('admin/admin','Beranda'); ?></li>
          <li><?php echo anchor('admin/Ruangan','Ruangan'); ?></li>
          <li>Edit Ruangan</li>
        </ul>
        </div>
        <h1>Edit Ruangan</h1>
      </div>

      <div style="padding-top: 100px; padding-left: 250px">

      	<table>
        <input type="hidden" class="form-control" name="id_ruangan" readonly value="<?php echo $key->id_ruangan; ?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama Ruangan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_ruangan" value="<?php echo $key->nama_ruangan; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Klasifikasi</label>
            <div class="col-sm-10">
              <select name="klasifikasi" class="form-control">
              <option value="reguler">Reguler</option>
              <option value="eksekutif">Eksekutif</option>
              <option value="bisnis">Bisnis</option>
            </select>
            </div>
          </div>
        </div>
        <br>
        <br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Letak</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="letak" value="<?php echo $key->letak; ?>">
          </div>
        </div>
        <br><br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Fasilitas</label>
          <div class="col-sm-10">
          <textarea class="form-control" name="fasilitas"><?php echo $key->fasilitas; ?></textarea>
          <br>
          </div>
        </div>
        <br><br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Kapasitas</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="kapasitas" value="<?php echo $key->kapasitas; ?>">
          </div>
        </div>
        <br><br><br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Gambar Ruangan*</label>
          <div class="col-sm-10">
          <input type="file" class="form-control" name="gambar" id="preview_gambar" >
          <img src="<?php echo base_url() .'upload/'. $key->gambar ?>" id="gambar_nodin" width="300">
          <p class="text1"><b>*Gambar Ekstensi .jpg (max size 2MB)</b></p>
          </div>
        </div>
        <br>
          <div class="col-sm-10">
          <input id="submitBtn" type="submit" name="edit" value="Edit" class="btn btn-primary">
          <?php echo anchor('admin/ruangan','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
          </div>
      </table>
      	
      </div>
      <?php endforeach;?>

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