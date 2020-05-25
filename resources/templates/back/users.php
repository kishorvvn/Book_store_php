<?php require_once("../../resources/config.php");?>
    <div class="col-lg-12">
        <h1 class="page-header">
            Users
        </h1>
            <p class="bg-success">
        </p>
        <div class="row p-3">
                <form action="" method="post" enctype="multipart/form-data" class="row col-md-5">
                    <div class="form-group mr-2">
                        <Select class="form-control" name="userRole">
                            <option value="">Select user role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </Select>
                    </div>
                    <div class="form-group">
                    <a href="index.php?edit_user&id={$row['user_id']}" class="text-black"><input type="submit" name="add" class="btn btn-success" value="Add role">
                    </div>
                </form>
            
            <div class="col-md-7">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>e-mail address</th>
                            <th>Username </th>
                            <th>Role </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php get_user_inAdmin();?>
                    </tbody>
                </table> <!--End of Table-->
            </div>
        </div>
    </div>
    









