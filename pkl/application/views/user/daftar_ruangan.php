<?php
    $this->load->view('template/header_user');
?>

<head>
	<style>
		div.gallery {
		  border: 1px solid #ccc;
		}

		div.gallery:hover {
		  border: 1px solid #777;
		}

		div.gallery img {
		  width: 100%;
		  height: auto;
		}

		div.desc {
		  padding: 15px;
		  text-align: center;
		}

		* {
		  box-sizing: border-box;
		}

		.responsive {
		  padding: 6px 6px;
		  float: left;
		  width: 20.99999%;
		}

		@media only screen and (max-width: 700px) {
		  .responsive {
		    width: 49.99999%;
		    margin: 6px 0;
		  }
		}

		@media only screen and (max-width: 500px) {
		  .responsive {
		    width: 100%;
		  }
		}

		.clearfix:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		.text{
			font-size:10px;
		}
		.text2{
			font-size: 11px;
			color: red;
		}
	</style>
</head>

    <!-- Page Content -->
    <section>
      <div class="container">
       <h1 align="center">Daftar Ruangan</h1>
       <p class="text" align="center">(Pilih Ruangan)</p>

       			<?php foreach ($data as $i): ?>
       			<div class="responsive">
				  <div class="gallery">
				    <a href="<?php echo base_url() ?>pesan/create/<?php echo $i->id_ruangan?>">
				      <img src="<?php echo base_url() .'upload/'. $i->gambar ?>">
				    </a>
				    <div class="desc">
				    	<?php echo $i->nama_ruangan;?>
				    	<p class="text2">
				    	( Kategori Ruangan : <?php echo $i->klasifikasi;?> )
				    	<br>
				    	( Letak Ruangan : <?php echo $i->letak;?> )
				    	</p>
				    </div>
				  </div>
				</div>
				<?php endforeach;?>

      </div>
    </section>


<?php
    $this->load->view('template/footer_user');
?>