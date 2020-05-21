
    <form action="" method="post" enctype="multipart/form-data" class="row p-2">
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="book_title" placeholder="Book title" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="book_author" placeholder="Author" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="book_isbn" placeholder="ISBN number" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="book_publishedDate" placeholder="Date published" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="book_price" placeholder="Price" class="form-control">
            </div>
            
        </div><!--Main Content-->
        <!-- SIDEBAR-->
        <aside id="admin_sidebar" class="col-lg-6">
        <div class="form-group">
                <input type="text" name="book_quantity" placeholder="Quanitity" class="form-control">
            </div>

            <!-- Product Categories-->

            <div class="form-group">
                <select name="book_cat_id" id="" class="form-control">
                    <option value="0">Select Category</option>
                    <option value="1">Select Category</option>
                    <option value="2">Select Category</option>
                    <option value="3">Select Category</option>
                    <option value="4">Select Category</option>
                    <option value="5">Select Category</option>
                    <option value="6">Select Category</option>
                </select>
            </div>
            <!-- Product Brands-->
            
            <!-- Product Taauthor-->
            <!-- Product Image -->
            <div class="form-group">
                <label for="product-title">Book Image</label><br>
                <input type="file" name="file">
            </div>

            <div class="form-group">
            <input type="submit" name="draft" class="btn btn-warning" value="Draft">
                <input type="submit" name="publish" class="btn btn-success" value="Publish">
            </div>

        </aside><!--SIDEBAR-->
    </form>

