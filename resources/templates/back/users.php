<?php require_once("../../resources/config.php");?>
    <div class="col-lg-12">
        <h1 class="page-header">
            Users
        </h1>
            <p class="bg-success">
        </p>
        <div class="row p-3">
                
            
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
    









