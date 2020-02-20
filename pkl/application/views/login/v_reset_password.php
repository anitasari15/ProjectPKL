<?php
    $this->load->view('template/header_user');
?> 
 <head>   
   <title>   
     <?= $title;?>  
   </title>   
 </head>   
    <body>
      <section>
        <div class="container">   
        <h2 align="center">Reset Password</h2>   
        <h5>Hello <span><?php echo $nama; ?></span>, Silakan isi password baru anda.</h5>   
        <?php echo form_open('reset_pass/reset_password/token/'.$token); ?>  
            <p>Password Baru:</p>   
            <p>   
              <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>"/>   
            </p>   
            <p> <?php echo form_error('password'); ?> </p>   
            <p>Konfirmasi Password:</p>   
            <p>   
              <input type="password" class="form-control" name="passconf" value="<?php echo set_value('passconf'); ?>"/>   
            </p>   
            <p> <?php echo form_error('passconf'); ?> </p>   
            <p>   
              <input type="submit" name="btnSubmit" value="Reset" class="btn btn-primary">   
            </p>   
          </div>
        </section>
      </body>   
<?php
    $this->load->view('template/footer_user');
?>  