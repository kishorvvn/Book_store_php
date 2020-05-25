 <?php add_categories_inAdmin(); ?>    
<h1 class="page-header">
  Product Categories
</h1>
<?php display_message();?>
<div class="row ml-5 mt-5">
<div class="col-md-4 mr-5">
    <form action="" method="post">
        <div class="form-group">
            
            <input type="text" name="book_cat_title" placeholder="Category title" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
        </div>  
    </form>
</div>
<div class="col-md-4">
    <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                <?php show_categories_inAdminPage();?>
            </tbody>
    </table>
</div>
</div>

