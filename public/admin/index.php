<?php require_once("../../resources/config.php");?>
<?php include(TEMPLATE_BACK . "/header.php");?>

<div class="container">
    <?php 
    if($_SERVER["REQUEST_URI"] == "/ecom/public/admin/"){

    }
    if(!isset($_SESSION['$username'])){
        redirect("../../public/index.php");
    }
    
    
    
    
    echo $_SERVER["REQUEST_URI"];?>
    <div class="card">
            <div class="row">
            <div class="col-lg-12 p-3">
                <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-products-tab" data-toggle="tab" href="#nav-products" role="tab" aria-controls="nav-products" aria-selected="true">Products</a>
                    <a class="nav-item nav-link" id="nav-addProduct-tab" data-toggle="tab" href="#nav-addProduct" role="tab" aria-controls="nav-addProduct" aria-selected="false">Add Product</a>
                    <a class="nav-item nav-link" id="nav-categories-tab" data-toggle="tab" href="#nav-categories" role="tab" aria-controls="nav-categories" aria-selected="false">Categories</a>
                    <a class="nav-item nav-link" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab" aria-controls="nav-users" aria-selected="false">Users</a>
                </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-products" role="tabpanel" aria-labelledby="nav-products-tab">
                    <?php include(TEMPLATE_BACK . "/products.php");?>
                </div>
                <div class="tab-pane fade" id="nav-addProduct" role="tabpanel" aria-labelledby="nav-addProduct-tab">
                    <?php include(TEMPLATE_BACK . "/add_product.php");?>
                </div>
                <div class="tab-pane fade" id="nav-categories" role="tabpanel" aria-labelledby="nav-categories-tab">
                <?php include(TEMPLATE_BACK . "/categories.php");?>
                </div>
                <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
                <?php include(TEMPLATE_BACK . "/users.php");?>
                </div>
                </div>
                
                </div>
              </div>
        </div>
      </div>
</div>
<div class="clear:both"></div>







<?php include(TEMPLATE_BACK . "/footer.php");?>
        
