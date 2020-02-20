<?php
    $this->load->view('template/header_user');
?>   
  <head>   
   <meta charset="UTF-8">   
   <title>   
     <?= $title;?>  
   </title>   
   <style>
   .warna{
    color: red;
   }
   </style>
 </head>   
 <body>
      <section>
        <div class="container">   
           <h2 align="center">Lupa Password</h2>   
           <p>Untuk melakukan reset password, silakan masukkan alamat email anda. </p>   
           <?php echo form_open('reset_pass');?>   
           <p>Email: *</p>   
           <p>   
             <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>"/>   
           </p>
           <p class="warna"><b>*Tautan akan dikirimkan melalui email anda, pastikan setelah memasukan email untuk segera cek email anda dan melanjutkan proses penggantian password.</b></p>   
           <p> <?php echo form_error('email'); ?> </p>   
           <p>   
             <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">   
           </p>   
        </div>
      </section>
 </body>   
<?php
    $this->load->view('template/footer_user');
?> 