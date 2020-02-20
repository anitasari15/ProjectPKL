    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url() ?>assets/user/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script>
    $(function() {
	$('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
	});
    </script>
    
  </body>

</html>