<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reservasi Tempat Meeting - PT. Terminal Petikemas Surabaya</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/user/css/the-big-picture.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/user/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url().'/assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url().'/assets/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css'?>">

    <style>
    #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 200%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    #customers tr:nth-child(even){
      background-color: #f2f2f2;
      text-align: center;
    }

    #customers tr:hover {
      background-color: #ddd;
      text-align: center;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #90c5f6;
      color: black;
      height: 50px;
    }

    #text1 {
      color:green;
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    #text2 {
      color:red;
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    body{
    overflow: scroll !important;
    }

    #nav li.active a {
      color: white;
    }

    .warna1{
      color: red;
      font-size: 18px;
    }

    .warna2{
      color: green;
      font-size: 18px;
    }

    .warna3{
      font-size: 18px
    }

    </style>
    <link href="<?php echo base_url().'/assets/image/tps_logo_XY0_icon.ico" rel="icon" type="image/ico'?>">
    <!-- <meta http-equiv="refresh" content="5" > -->
  </head>

  <body>

  <!-- Isi anchor lurr
    anchor('home','Beranda', array('class' => 'nav-link'));
    echo anchor('pesan/list','Reservasi', array('class' => 'nav-link'));
   -->
   <br>
    <!-- Page Content -->
    <section>
      <div class="container">
      <table border="0" align="center">
            <tr>
              <td>
                <h1>Daftar Reservasi Ruang Meeting</h1>
              </td>
            </tr>
      </table>
        <div class="row">
          <div class="col-lg-6">
            <table id="customers">
              <tr>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Ruangan</th>
                <th>PIC</th>
                <th>Jumlah Tamu</th>
                <th>Info</th>
              </tr>
              <?php foreach ($results as $i): ?>
              <tr>
                        <td><?php echo $i->tanggal;?> </td>
                        <td><?php echo $i->waktu_mulai;?> </td>
                        <td><?php echo $i->waktu_selesai;?> </td>
                        <td><?php echo $i->nama_ruangan;?></td>
                        <td><?php echo $i->nama;?></td>
                        <td><?php echo $i->tamu;?></td>
                        <th>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $date = date('H:i:s', time()); 
                        if($date <= $i->waktu_selesai && $date >= $i->waktu_mulai){
                          echo '<p class="warna2"><u>'.'Sedang Digunakan'.'</u></p>';
                        } else if ($date >= $i->waktu_selesai) {
                          echo '<p class="warna1"><u>'.'Selesai Digunakan'.'</u></p>';
                        } else {
                          echo '<p class="warna3"><u>'.'Belum Digunakan'.'</u></p>';
                        }
                        ?>
                        </th>
              </tr>
              <?php endforeach;?>
            </table>
          </div>
        </div>
        <p align="center">
        <?php if (isset($links)) { ?>
                <?php echo $links ?>
        <?php } ?>
        </p>
      </div>
    </section>

<?php
    $this->load->view('template/footer_user');
?>