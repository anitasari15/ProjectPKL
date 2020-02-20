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
      <li>Ruangan</li>
    </ul>
          <?php if($this->session->flashdata('notif_ruangan_buat')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_ruangan_buat').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_ruangan_edit')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_ruangan_edit').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_ruangan_hapus')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_ruangan_hapus').'</div>'; ?>
          <?php endif; ?>
    </div>
	<center> <h1>List Ruang Meeting</h1><br> </center>
     <br>
      <div class="container" style="padding-left: 150px">
        <div class="row">
        	<?php echo anchor('admin/ruangan/create','Tambah Data', array('class' => 'btn btn-sm bts')); ?>

	 <div class="card-content table-responsive">          
            <br>
            <table id="myTable" class="display" border="1">
                <thead>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                  	<th>Klasifikasi</th>
                  	<th>Letak</th>
                    <th>Fasilitas</th>
                    <th>Kapasitas</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                        $b = 1;
                        foreach($results as $i):
                        ?>
                  <tr>
                        <td><?php echo $b++; ?></td>
                        <td><?php echo $i->nama_ruangan;?> </td>
                        <td><?php echo $i->klasifikasi;?> </td>
                        <td><?php echo $i->letak;?></td>
                        <td><?php echo $i->fasilitas;?></td>
                        <td><?php echo $i->kapasitas;?></td>
                        <td><img src="<?php echo base_url() .'upload/'. $i->gambar ?>" width="50"></td>
                        <td>
                          <?php echo anchor('admin/ruangan/edit/'.$i->id_ruangan,'Edit Data', array('class' => 'btn btn-sm btn-info')); ?>
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
            if (confirm("Hapus Ruangan?"))
                 location.href='ruangan/delete/<?php echo $i->id_ruangan?>';
            else
                 location.href='ruangan';
      }
</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>