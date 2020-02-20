<!DOCTYPE html>
<html>
<head>
	<style>
  .bts{
    background-color: green;
    color: white;
  }
  </style>
</head>
<body>
	<div style="padding-top: 50px">
  <br>
  <div class="container" style="padding-left: 105px;">
      <ul class="breadcrumb">
      <li><?php echo anchor('admin/admin','Beranda'); ?></li>
      <li>User</li>
    </ul>
          <?php if($this->session->flashdata('notif_user_buat')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_user_buat').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_user_edit')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_user_edit').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_user_hapus')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_user_hapus').'</div>'; ?>
          <?php endif; ?>
    </div>
	  <center> 
        <h1>List User</h1><br> 
    </center>
     <br>
      <div class="container" style="padding-left: 150px">
        <div class="row">
        	<?php echo anchor('admin/user/create','Tambah Data', array('class' => 'btn btn-sm bts')); ?>

	 <div class="card-content table-responsive">          
            <br>
            <table id="myTable" class="display" border="1">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                  	<th>Divisi</th>
                  	<th>Username</th>
                  	<th>Password</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </thead>

                <tbody>
                  <?php
                        $b = 1;
                        foreach($results as $i):
                        ?>
                  <tr>  
                        <td><?php echo $b++; ?></td>
                        <td><?php echo $i->nama;?> </td>
                        <td><?php echo $i->divisi;?> </td>
                        <td><?php echo $i->username;?></td>
                        <td><?php echo $i->password ;?></td>
                        <td><?php echo $i->email ;?></td>
                        <td><?php echo $i->id_level; ?></td>
                        <td>
                          <?php echo anchor('admin/user/edit/'.$i->id,'Edit Data', array('class' => 'btn btn-sm btn-info')); ?>
                          <button location.href="" class='btn btn-sm btn-danger' onClick='ConfirmDelete()'>Delete</button>
                        </td>
                  </tr>
                  <?php endforeach;?>
            </tbody>
        </table>
    </div>

<script>
function ConfirmDelete()
      {
            if (confirm("Hapus User?"))
                 location.href='user/delete/<?php echo $i->id?>';
            else
                 location.href='user';
      }
</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>