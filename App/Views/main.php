<!--  MAIN.PHP -->
<?php  include 'includes/header.php'; ?>
    

    <div class="container">

     	<!--   App/Views/main.php -->
	      <?php Core\Messages::display(); ?>
	     	<?php 

	      require($viewPath); 
	      ?>

    </div><!-- /.container -->
    
    
<?php  include 'includes/footer.php'; ?>