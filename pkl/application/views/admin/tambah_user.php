<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php echo form_open('admin/User/create', array('class' => 'needs-validation', 'novalidate' => '')); ?>

	<div class="container" style="padding-top: 80px; text-align: center;">
    <div style="padding-left: 100px;">
      <ul class="breadcrumb">
      <li><?php echo anchor('admin/admin','Beranda'); ?></li>
      <li><?php echo anchor('admin/user','User'); ?></li>
      <li>Tambah User</li>
    </ul>
    </div>
		<h1>Tambah User</h1>
	</div>

	<div style="padding-top: 80px; padding-left: 250px">
		<table>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>">
          </div>
        </div>
        <br><br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Divisi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="divisi" value="<?php echo set_value('divisi') ?>">
           </div>
        </div>
        <br><br>
         <div class="form-group">
  		<label class="col-sm-2 col-sm-2 control-label">Username</label>
  		<div class="col-sm-10">
    	<input type="text" class="form-control" name="username" placeholder="Isi Username">
  		</div>
		 </div>
     <br><br>
 		<div class="form-group">
  		<label class="col-sm-2 col-sm-2 control-label">Password</label>
 		 <div class="col-sm-10">
      <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
    </div>
    </div>
    <br><br>
     <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Konfirmasi Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password2" placeholder="Ulangi Password">
      </div>
     </div>
     <br><br>
     <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email">
      </div>
     </div>
     <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Level User</label>
          <div class="col-sm-10">
            <select name="level" class="form-control" required="required">
                                            <option value="1">Super User (Admin)</option>
                                            <option value="2">User</option>
            </select>
          </div>
        </div>
	   </div>
	   <br><br>
          <div class="col-sm-10">
          <input id="submitBtn" type="submit" name="simpan" value="simpan" class="btn btn-primary">
          <?php echo anchor('admin/user','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
          </div>
        </table>

        <?php echo form_close(); ?>

</body>
</html>