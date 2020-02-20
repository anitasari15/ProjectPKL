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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed">
      <div class="container">
        <?php echo anchor('home','PT. Terminal Petikemas Surabaya', array('class' => 'navbar-brand')); ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto" id="nav">
            <li class="nav-item">
              <?php echo anchor('home','Beranda', array('class' => 'nav-link')); ?>
            </li>
            <li class="nav-item">
              <?php if($this->session->userdata('logged_in')) : ?>
              <?php echo anchor('pesan/list','Reservasi', array('class' => 'nav-link')); ?>
              <?php endif; ?>
            </li>
            <li>
              <?php if($this->session->userdata('level') == 1) { ?>
              <?php echo anchor('admin/admin','Halaman Admin', array('class' => 'nav-link')); ?>
              <?php } ?>
            </li>
            <li class="nav-item">
              <?php if(!$this->session->userdata('logged_in')) : ?>
              <?php echo anchor('login/cek_login','Login', array('class' => 'nav-link')); ?>
              <?php endif; ?>
              <?php if($this->session->userdata('logged_in')) : ?>
              <?php echo anchor('login/logout','Logout', array('class' => 'nav-link')); ?>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>