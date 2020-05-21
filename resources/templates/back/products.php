<?php require_once("../../resources/config.php");?>


<h1 class="page-header">
   All Products
</h1>

<table class="table ">
    <thead>
      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Category</th>
           <th>Author</th>
           <th>ISBN</th>
           <th>Date published</th>
           <th>Price</th>
           <th>Quantity</th>
           
      </tr>
    </thead>
    <tbody>
    <?php get_admin_products(); ?>
    
    </tbody>
</table>


            