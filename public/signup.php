<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT.DS."header.php") ?>


<section class="container col-lg-10">
    <h2>Sign up</h2>
<form action="signup_action.php" method="POST">
  <div class="form-group">
    <input type="text" class="form-control" name="first" placeholder="First name">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="last" placeholder="Last name">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="email" placeholder="E mail">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  
  <button class="btn btn-warning my-2 my-sm-0 text-white" name="submit" type="submit">Sign up</button>
</form>
</section>

<?php include(TEMPLATE_FRONT.DS."footer.php");?>  