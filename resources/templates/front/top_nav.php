<a class="navbar-brand" href="index.php">Pick-a-Book</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <!-- category -->
        <?php include(TEMPLATE_FRONT.DS."category.php") ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Checkout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <?php 
    if(isset($_SESSION['u_id'])){
      echo '<form class="loginForm form-inline" action="logout_action.php" method="POST">
                <button class="btn my-2 my-sm-0 text-white" type="submit" name="submit">Logout</button>
            </form>';
    } else {
      echo '<form class="loginForm form-inline" action="login_action.php" method="POST">
    
              <input class="form-control mr-sm-2" style="width:25%" type="text" placeholder="Username" name="username">
              <input class="form-control mr-sm-2 logform" style="width:25%" type="text" placeholder="Password" name="password" >
              <button class="btn my-2 my-sm-0 text-white" type="submit" name="submit">Login</button>
              <a href="signup.php"><button class="btn text-white" type="submit">Sign up</button></a>
            </form>'
            ;
    }
    
    ?>
    
  

    
    
  </div>