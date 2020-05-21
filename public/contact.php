
<!-- Configuration-->

<?php require_once("../resources/config.php"); ?>


<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>


   
         <!-- Contact Section -->

         <div id="section6" class="">
  <div class="container-fluid text-dark text-center">
    <h1 class="p-3">Contact</h1>
      <div class="row">
        <div class="col-md-6">
       	    <h5>Kishorkumar Chauhan</h5>
       	    <p>Phone:- 416 617 1424</p>
              <div class="sociallinks">
                  <a class="text-dark" href="https://www.linkedin.com/in/kishorkumar-chauhan-61a709128/" target="_blank">
                  <i class="fab fa-linkedin fa-2x"></i>
                  </a>
                  <a class="text-dark" href="https://github.com/kishorvvn" target="_blank">
                  <i class="fab fa-github-square fa-2x"></i>
                  </a>
                  <a class="text-dark" href="https://www.facebook.com/profile.php?id=100048896554362" target="_blank">
                  <i class="fab fa-facebook-square fa-2x"></i>
                  </a>
              </div>
            </div>
       <div class="col-md-6">
          <form name="sentMessage" id="contactForm" method="post">
          <?php send_message(); ?>
           	    <input type="text" name="name" placeholder="Your name" class="form form-control mb-1" required>
         	    <input type="text" name="email" placeholder="Your e-mail" class="form form-control mb-1" required>
              <input type="text" name="subject" placeholder="Subject" class="form form-control mb-1" required>
         	    <textarea  name="message" class="form form-control mb-1" placeholder="Your message" rows="7" required></textarea>
         	    <button type="submit" name="submit" class="form btn btn-warning m-3">Submit</button>
          </form>
          <h5 text-center text-success> <?php $result; ?></h5>
        </div>
      </div>
    </div>
  </div>
<div class="clear"></div>

    
    <!-- /.container -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>