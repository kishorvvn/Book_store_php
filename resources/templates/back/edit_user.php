<?php 
// edit_product_inAdmin();
$query = query("SELECT * FROM users WHERE user_id = " . escape_string($_GET['id']) . "");
confirm($query);

while ($row = fetch_array($query)) {
        $user_first = escape_string($row['user_first']);
        $user_last = escape_string($row['user_last']);
        $user_email = escape_string($row['user_email']);
        $user_username = escape_string($row['user_username']);
        $user_role = escape_string($row['user_role']);
       
}

edit_user_inAdmin();


?>
    <form action="" method="post" enctype="multipart/form-data" class="row p-2">
    
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="user_first" value="<?php echo $user_first?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="user_last" value="<?php echo $user_last?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="user_email" value="<?php echo $user_email?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="user_username" value="<?php echo $user_username?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="user_role" value="<?php echo $user_role?>" class="form-control">
            </div>
            <div class="form-group">
           
                <input type="submit" name="update" class="btn btn-success" value="Update">
            </div>
            
        </div><!--Main Content-->
        <!-- SIDEBAR-->
        
            

      
    </form>

