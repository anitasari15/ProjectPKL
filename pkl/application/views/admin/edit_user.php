<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php foreach ($anggota as $key): ?>
      <?php echo form_open('admin/user/edit/'.$key->id, array('enctype'=>'multipart/form-data')); ?>

      <div class="container" style="padding-top: 80px; text-align: center;">
        <div style="padding-left: 100px;">
          <ul class="breadcrumb">
          <li><?php echo anchor('admin/admin','Beranda'); ?></li>
          <li><?php echo anchor('admin/user','User'); ?></li>
          <li>Edit User</li>
        </ul>
        </div>
        <h1>Edit User</h1>
      </div>>

      <div style="padding-top: 100px; padding-left: 250px">

      	<table>
        <input type="hidden" class="form-control" name="id_user" readonly value="<?php echo $key->id; ?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" value="<?php echo $key->nama; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Divisi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="divisi" value="<?php echo $key->divisi; ?>">
          </div>
        </div>
        <br>
        <br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" value="<?php echo $key->username; ?>">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        <br></br>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" value="<?php echo $key->email; ?>">
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
          <div style="padding-top: 100px; padding-left: 250px">
          <input id="submitBtn" type="submit" name="edit" value="Edit" class="btn btn-primary">
          <?php echo anchor('admin/user','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
          </div>
      </table>
      	
      </div>
      <?php endforeach;?>

</body>
</html>