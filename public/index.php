<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php") ?>
<!-- Page Content -->
<h2> <?php display_message(); ?> </h2>
<div class="container">
    <div class="">
        <div class="">
            <!-- caroussel -->
            <?php include(TEMPLATE_FRONT.DS."caroussel.php") ?>
            <!-- all books -->
                <div class="row">
                    
                    <?php get_products();?>
                </div>
        </div>
    </div>
</div>
<!-- /.container -->
<?php include(TEMPLATE_FRONT.DS."footer.php");?>   