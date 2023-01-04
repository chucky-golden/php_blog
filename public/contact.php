<?php require_once('../includes/header.php');?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
				<?php 
					if (isset($_SESSION['id'])) { ?>
					<li><a href="index.php">Home</a></li>
					<li><a href="lifestyle.php">Life Style</a></li>
					<li><a href="sports.php">Sports</a></li>
					<li><a href="about.php">About</a></li>
					<li class="colorlib-active"><a href="contact.php">Contact</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="gamezone.php">GameZone</a></li>
					<?php } else { ?>
					<li><a href="index.php">Home</a></li>
					<li><a href="lifestyle.php">Life Style</a></li>
					<li><a href="sports.php">Sports</a></li>
					<li><a href="about.php">About</a></li>
					<li class="colorlib-active"><a href="contact.php">Contact</a></li>
					<li><a href="login.php">Login / Register</a></li>
					<?php } ?>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<?php require_once('../includes/side2.php');?>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section contact-section px-md-4">
	      <div class="container">
	        <div class="row d-flex mb-5 contact-info">
	          <div class="col-md-12 mb-4">
	            <h2 class="h3">Contact Information</h2>
	          </div>
	          <div class="w-100"></div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
		          </div>
	          </div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
		          </div>
	          </div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
		          </div>
	          </div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Website</span> <a href="#">yoursite.com</a></p>
		          </div>
	          </div>
	        </div>
	        <?php 
					if (isset($_SESSION['id'])) { ?>
	        <div class="row block-9">	        
	          <div class="col-lg-6 d-flex">
	            <form action="../includes/contact.php" method="post" class="bg-light p-5 contact-form">
	            <div class="form-group">
			<?php
			if (isset($_GET['error'])) {?>
				<div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
			<?php }elseif(isset($_GET['success'])){?>
				<div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
			<?php } ?>
			</div>
	              <div class="form-group">
	                <input type="text" class="form-control" name="username" value="<?php echo $name?>">
	              </div>
	              <div class="form-group">
	                <input type="email" class="form-control" name="email" value="<?php echo $email?>">
	              </div>
	              <div class="form-group">
	                <input type="text" class="form-control" name="subject" placeholder="Subject">
	              </div>
	              <div class="form-group">
	                <textarea id="" cols="30" rows="7" name="message" class="form-control" placeholder="Message"></textarea>
	              </div>
	              <div class="form-group">
	                <input type="submit" value="Send Message" name="send" class="btn btn-primary py-3 px-5">
	              </div>
	            </form>
	          
	          </div>

	          <div class="col-lg-6 d-flex">
	          	<div id="map" class="bg-light"></div>
	          </div>
	        </div>
	        <?php } ?>

	      </div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.easing.1.3.js"></script>
  <script src="../assets/js/jquery.waypoints.min.js"></script>
  <script src="../assets/js/jquery.stellar.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../assets/js/aos.js"></script>
  <script src="../assets/js/jquery.animateNumber.min.js"></script>
  <script src="../assets/js/scrollax.min.js"></script>
  <script src="../assets/js/google-map.js"></script>
  <script src="../assets/js/main.js"></script>
    
  </body>
</html>