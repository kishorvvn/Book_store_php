<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php") ?>
<?php include("cart.php") ?>
        
                <h1 class="text-center">Checkout</h1>
                <h4 class="text-center text-warning"><?php echo display_message();?></h4>
            <div class="row">
                <form action="" class="col-md-8 text-center mt-5 mb-5">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub-total</th>
                        <th></th>
                    
                        </tr>
                        </thead>
                        <tbody>
                            <?php cart(); ?>
                        </tbody>
                    </table>
                </form>
                <div class="float-right">
                    <h2 class="">Cart Totals</h2>

                    <table class="table table-bordered" cellspacing="0">
                        <tbody>
                            <tr class="cart-subtotal">
                                <th>Items:</th>
                                <td><span class="amount">
                                            <?php 
                                                echo (isset($_SESSION['item_quantity'])) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";
                                            ?>
                                    </span></td>
                            </tr>
                            <tr class="shipping">
                                <th>Shipping and Handling</th>
                                <td>Free Shipping</td>
                            </tr>

                            <tr class="order-total">
                                <th>Order Total</th>
                                <td><strong><span class="amount"> &#36;
                                            <?php 
                                                echo (isset($_SESSION['item_total'])) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";
                                            ?>
                                            </span></strong> </td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            <!-- CART TOTALS-->
            </div>
            <div class="clear:both"></div>
<?php include(TEMPLATE_FRONT.DS."footer.php");?>   

 <!--Main Content-->
