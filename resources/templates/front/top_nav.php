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
        <a class="nav-link" href="#">Contact</a>
      </li>
      
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <form class="loginForm form-inline" style="margin-right:-130px;">
      <input class="form-control mr-sm-2" style="width:25%" type="text" placeholder="Username" name="username" required >
      <input class="form-control mr-sm-2 logform" style="width:25%" type="text" placeholder="Password" name="password" required >
      <button class="btn my-2 my-sm-0 text-white" type="submit">Login</button>
    </form>
    <a href="signup.php"><button class="btn my-2 my-sm-0 text-white" type="submit">Sign up</button></a>
    
  </div>