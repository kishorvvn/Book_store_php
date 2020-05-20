<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php") ?>
    <!-- Page Content -->
    <div class="container">
    
        <!-- Title -->
      
        <!-- /.row -->
        <h3>Books in current category</h3>
        
        <div class="row">
        
<div class="card-deck row">
        <?php get_bookByCategory(); ?>
        </div>
        </div>
        <!-- /.row -->
        
        <?php include(TEMPLATE_FRONT.DS."footer.php");?>  