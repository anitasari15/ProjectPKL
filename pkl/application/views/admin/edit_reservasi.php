<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php foreach ($reservasi as $key): ?>
      <?php echo form_open('admin/reservasi/edit/'.$key->id_reservasi, array('enctype'=>'multipart/form-data')); ?>

      <div class="container" style="padding-top: 80px; text-align: center;">
        <div style="padding-left: 100px;">
          <ul class="breadcrumb">
          <li><?php echo anchor('admin/admin','Beranda'); ?></li>
          <li><?php echo anchor('admin/Reservasi','Reservasi'); ?></li>
          <li>Edit Reservasi</li>
        </ul>
        </div>
        <h1>Edit Reservasi</h1>
      </div>

      <div style="padding-top: 50px; padding-left: 250px">

      	<table>
        <input type="hidden" class="form-control" name="id_reservasi" readonly value="<?php echo $key->id_reservasi; ?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Tanggal Reservasi</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="tanggal" value="<?php echo $key->tanggal; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Waktu Mulai Meeting</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" name="waktu_mulai" value="<?php echo $key->waktu_mulai; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Waktu Selesai Meeting</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" name="waktu_selesai" value="<?php echo $key->waktu_selesai; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="keterangan" value="<?php echo $key->keterangan; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Ruangan Meeting</label>
          <div class="col-sm-10">
            <select name="id_ruangan" class="form-control">
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
            <select name="pic" class="form-control">
              <option value="">Pilih PIC</option>
              <?php foreach($anggota as $pic): ?>
              <option value="<?php echo $pic->id; ?>"><?php echo $pic->nama; ?></option>
              <?php endforeach; ?>
            </select>
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
        <br></br>
          <div class="col-sm-10">
          <input id="submitBtn" type="submit" name="edit" value="Edit" class="btn btn-primary">
          <?php echo anchor('admin/reservasi','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
          </div>
      </table>
      	
      </div>
      <?php endforeach;?>

</body>
</html>