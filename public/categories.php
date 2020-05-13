<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php") ?>
    <!-- Page Content -->
    <div class="container">
    
        <!-- Title -->
      
        <!-- /.row -->
        
        <?php get_bookByCategory(); ?>
  
        <!-- /.row -->
        
        <?php include(TEMPLATE_FRONT.DS."footer.php");?>  