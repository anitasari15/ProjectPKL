<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<?php echo form_open('admin/reservasi/create', array('class' => 'needs-validation', 'novalidate' => '')); ?>

	<div class="container" style="padding-top: 80px; text-align: center;">
		<div style="padding-left: 100px;">
      <ul class="breadcrumb">
      <li><?php echo anchor('admin/admin','Beranda'); ?></li>
      <li><?php echo anchor('admin/reservasi','Reservasi'); ?></li>
      <li>Tambah Reservasi</li>
    </ul>
    </div>
    <h1>Tambah Reservasi</h1>
	</div>

	<div style="padding-top: 80px; padding-left: 250px">
		<table>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Tanggal Reservasi</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="tanggal" value="<?php echo set_value('tanggal'); ?>">
          </div>
        </div>
        <br>
        <br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Waktu Mulai Meeting</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" name="waktu_mulai" value="<?php echo set_value('waktu_mulai'); ?>">
          </div>
        </div>
        <br>
        <br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Waktu Selesai Meeting</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" name="waktu_selesai" value="<?php echo set_value('waktu_selesai'); ?>">
          </div>
        </div>
        <br>
        <br>
      <div class="form-group">
  		<label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
  		<div class="col-sm-10">
    	<input type="text" class="form-control" name="keterangan" value="<?php echo set_value('keterangan'); ?>">
  		</div>
		 </div>
	   <br><br>
     <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Ruangan Meeting</label>
          <div class="col-sm-10">
            <select name="id_ruangan" class="form-control" required>
              <option value="">Pilih Ruangan Meeting</option>
              <?php foreach($data as $ruang): ?>
              <option value="<?php echo $ruang->id_ruangan; ?>"><?php echo $ruang->nama_ruangan; ?></option>
              <?php endforeach; ?>
            </select>
            </div>
      </div>
     <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">PIC</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="pic">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <select name="status" class="form-control" required="required">
                                            <option value="Disetujui">Disetujui</option>
                                            <option value="Tidak Disetujui">Tidak Disetujui</option>
            </select>
          </div>
        </div>
     <br><br>
          <div class="col-sm-10">
          <input id="submitBtn" type="submit" name="simpan" value="simpan" class="btn btn-primary">
          <?php echo anchor('admin/reservasi','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
          </div>
        </table>

        <?php echo form_close(); ?>

</body>
</html>