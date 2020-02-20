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
      <li>Reservasi</li>
      </ul>
          <?php if($this->session->flashdata('notif_reservasi_buat')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_reservasi_buat').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_reservasi_edit')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_reservasi_edit').'</div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('notif_reservasi_hapus')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_reservasi_hapus').'</div>'; ?>
          <?php endif; ?>
    </div>
	   <center> 
     <h1>List Reservasi</h1><br> 
     </center>
     <br>
      <div class="container" style="padding-left: 150px">
        <div class="row">

          <?php echo anchor('admin/reservasi/create','Tambah Data', array('class' => 'btn btn-sm bts')); ?>

	 <div class="card-content table-responsive">
            <br>          
            <table id="myTable" class="display" border="1">
                <thead>
                    <th>No</th>
                    <th>Tanggal Reservasi</th>
                  	<th>Waktu Mulai Meeting</th>
                    <th>Waktu Selesai Meeting</th>
                  	<th>Keterangan</th>
                    <th>Ruang Meeting</th>
                    <th>PIC</th>
                    <th>Jumlah Tamu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>

                <tbody>
                        <?php
                        $b = 1;
                        foreach($results as $i):
                        ?>
                  <tr> 
                        <td><?php echo $b++; ?></td>
                        <td><?php echo $i->tanggal;?> </td>
                        <td><?php echo $i->waktu_mulai;?> </td>
                        <td><?php echo $i->waktu_selesai;?> </td>
                        <td><?php echo $i->keterangan;?></td>
                        <td><?php echo $i->nama_ruangan;?></td>
                        <td><?php echo $i->nama;?></td>
                        <td><?php echo $i->tamu;?></td>
                        <td><?php 
                        if($i->status == 'Disetujui'){
                        echo "<h3 id='text1'><b>".$i->status."</b></h3>"; }
                        else {
                          echo "<h3 id='text2'><b>".$i->status."</b></h3>";
                          } ?>
                          </td>
                        <td>
                          <?php echo anchor('admin/reservasi/edit/'.$i->id_reservasi,'Edit Data', array('class' => 'btn btn-sm btn-info')); ?>
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
            if (confirm("Hapus Reservasi?"))
                 location.href='reservasi/delete/<?php echo $i->id_reservasi?>';
            else
                 location.href='reservasi';
      }
</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>