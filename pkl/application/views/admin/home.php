<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="padding-top: 50px">
  <br>
    <div class="container" style="padding-left: 105px;">
      <ul class="breadcrumb">
      <li><?php echo anchor('admin/admin','Beranda'); ?></li>
      <li>Halaman Admin</li>
    </ul>
    </div>
	<center> <h1>Halaman Admin</h1><br> </center>
     <br>
      <div class="container" style="padding-left: 150px">
        <div class="row">

	 <div class="card-content table-responsive">          
            
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="menu-icon fa fa-group"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <div class="stat-text"><span class="count"><?php echo $jml_reservasi[0]->jumlah; ?></span></div>
                                        <div class="stat-heading">Reservasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="menu-icon fa fa-building-o"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count"><?php echo $jml_ruangan[0]->jumlah; ?></span></div>
                                        <div class="stat-heading">Ruangan</div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="menu-icon fa fa-user"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib"> 
                                        <div class="stat-text"><span class="count"><?php echo $jml_user[0]->jumlah; ?></span></div>
                                        <div class="stat-heading">User</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

</body>
</html>