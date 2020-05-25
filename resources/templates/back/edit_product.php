<?php 
// edit_product_inAdmin();
$query = query("SELECT * FROM books WHERE book_id = " . escape_string($_GET['id']) . "");
confirm($query);

while ($row = fetch_array($query)) {
        $book_title = escape_string($row['book_title']);
        $book_author = escape_string($row['book_author']);
        $book_isbn = escape_string($row['book_isbn']);
        $book_publishedDate = escape_string($row['book_publishedDate']);
        $book_price = escape_string($row['book_price']);
        $book_quantity = escape_string($row['book_quantity']);
        $book_cat_id = escape_string($row['book_cat_id']);
        $book_image = escape_string($row['book_image']);
}

edit_product_inAdmin();


?>
    <form action="" method="post" enctype="multipart/form-data" class="row p-2">
    
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="book_title" value="<?php echo $book_title?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="book_author" value="<?php echo $book_author?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="book_isbn" value="<?php echo $book_isbn?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="date" name="book_publishedDate" value="<?php echo $book_publishedDate?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="book_price" value="<?php echo $book_price?>" class="form-control">
            </div>
            
        </div><!--Main Content-->
        <!-- SIDEBAR-->
        <aside id="admin_sidebar" class="col-lg-6">
        <div class="form-group">
                <input type="number" min = "0" name="book_quantity" value="<?php echo $book_quantity?>" class="form-control">
            </div>

            <!-- Product Categories-->

            <div class="form-group">
                <select name="book_cat_id" id="" class="form-control">
                    <option value=""><?php  echo show_category_title_inAdmin($book_cat_id)?></option>
                    <!-- from functions to dynamically show categories -->
                    <?php show_categories_inAdmin();?>
                </select>
            </div>
            <!-- Product Brands-->
            
            <!-- Product Taauthor-->
            <!-- Product Image -->
            <div class="form-group">
                <img class="img img-thumbnail" style="height:125px;" src="../../resources/uploads/<?php echo $book_image?>" alt="<?php echo $book_title?>">
                <br>
                <label for="">Change Image</label><br>
                <input type="file" name="file">
            </div>

            <div class="form-group">
            <input type="submit" name="draft" class="btn btn-warning" value="Draft">
                <input type="submit" name="update" class="btn btn-success" value="Update">
            </div>

        </aside><!--SIDEBAR-->
    </form>

