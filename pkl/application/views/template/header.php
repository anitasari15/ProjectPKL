<?php
    if ($this->session->userdata('level') != 1) {
        redirect('login');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url() ?>ssets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/style-responsive.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>assets/js/chart-master/Chart.js"></script>
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/pe-icon-7-filled.css">


    <link href="<?php echo base_url(); ?>assets/assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets/calendar/fullcalendar.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/style.css">
    <link href="<?php echo base_url(); ?>assets/assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="<?php echo base_url(); ?>assets/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/dt/datatables.min.css"/> 

    <link href="<?php echo base_url().'/assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url().'/assets/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css'?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart { 
            min-height: 335px; 
        }
        #flotPie1  {
            height: 150px;
        } 
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        } 

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

        #text1 {
      color:green;
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    #text2 {
      color:red;
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    }

    ul.breadcrumb {
      padding: 10px 16px;
      list-style: none;
      background-color: #eee;
    }
    ul.breadcrumb li {
      display: inline;
      font-size: 18px;
    }
    ul.breadcrumb li+li:before {
      padding: 8px;
      color: black;
      content: "/\00a0";
    }
    ul.breadcrumb li a {
      color: #0275d8;
      text-decoration: none;
    }
    ul.breadcrumb li a:hover {
      color: #01447e;
      text-decoration: underline;
    }

    .warnas{
      background-color: #f07968;
      padding-top: 50px;
    }

    #nav li.active a {
        background-color: #90c5f6;
        color: white;
      }

    </style>
    <link href="<?php echo base_url().'/assets/image/tps_logo_XY0_icon.ico" rel="icon" type="image/ico'?>">
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <?php echo anchor('home',"<b>".'PT. TERMINAL PETIKEMAS SURABAYA'."</b>", array('class' => 'logo')); ?>
            
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <br>
                    <li>
                        <?php echo anchor('login/logout','Logout', array('class' => 'logout')); ?>
                    </li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!-- isi anchor luurrr

      anchor('admin/admin','Beranda', array('class' => 'nav-link'));
      anchor('admin/user','User', array('class' => 'nav-link'));
      anchor('admin/ruangan','Ruangan', array('class' => 'nav-link'));
      anchor('admin/reservasi','Reservasi', array('class' => 'nav-link'));

      date_default_timezone_set('Asia/Jakarta');
                          $date = date('h:i:s', time());
                          echo $date; 
       -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav">
              
              	  <p class="centered"><a href="profile.html"><img src="<?php echo site_url() ?>assets/image/user.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Hi, <?php echo $this->session->userdata('nama') ;?></h5>
              	  	
                  <li class="mt">
                      <a class="<?=(current_url()==base_url('admin/admin')) ? 'active':''?>" href="<?=base_url('admin/admin')?>">
                      <span>Beranda</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                     <a href="<?php echo site_url('admin/user') ?>" class="nav-link <?php echo ($this->uri->segment(2) == "user") ? "active" : "" ?>">User
                     </a>
                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo site_url('admin/ruangan') ?>" class="nav-link <?php echo ($this->uri->segment(2) == "ruangan") ? "active" : "" ?>">Ruangan
                      </a>
                  </li>
             
                   <li class="sub-menu">
                       <a href="<?php echo site_url('admin/reservasi') ?>" class="nav-link <?php echo ($this->uri->segment(2) == "reservasi") ? "active" : "" ?>">Reservasi
                       </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
       <!-- js placed at the end of the document so the pages load faster -->
    <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.sparkline.js"></script>
 <!--common script for all pages-->
    <script src="<?php echo base_url() ?>assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?php echo base_url() ?>assets/js/sparkline-chart.js"></script>    
    <script src="<?php echo base_url() ?>assets/js/zabuto_calendar.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
    $(function() {
    $('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
    });
    </script>