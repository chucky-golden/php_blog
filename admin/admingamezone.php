<?php require_once('../includes/adminheader.php');?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="dashboard.php">Create Post</a></li>
					<li><a href="users.php">View Users</a></li>
					<li><a href="admincontact.php">Contact <span class="badge" style="background-color: #007bff; color: white;"><?php echo mysqli_num_rows($res); ?></span></a></li>
					<li><a href="adminprofile.php">Profile</a></li>
					<li><a href="viewpost.php">View Post</a></li>
					<li class="colorlib-active"><a href="admingamezone.php">GameZone</a></li>
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
	        <div class="col-md-12">
					<form action="../includes/gamesub.php" method="post" class="bg-light p-5 contact-form">
						<div class="form-group">
					<?php
						if (isset($_GET['error'])) {?>
							<div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
					<?php }elseif(isset($_GET['success'])){?>
							<div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
					 <?php } ?>
						</div>
						<div class="form-group">
							<label>Question</label>
							<textarea id="" cols="30" rows="4" required name="question" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Option A</label>
							<textarea id="" cols="30" rows="2" required name="option1" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Option B</label>
							<textarea id="" cols="30" rows="2" required name="option2" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Option C</label>
							<textarea id="" cols="30" rows="2" required name="option3" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Option D</label>
							<textarea id="" cols="30" rows="2" required name="option4" class="form-control"></textarea>
						</div>
						<div>
							<label>Answer</label>
							<select class="form-control" required name="answer">
						    	<option value="a">A</option>
						    	<option value="b">B</option>
						    	<option value="c">C</option>
						    	<option value="d">D</option>
						    </select>
						</div><br><br>
						<div class="form-group">
							<button name="create" class="btn btn-default btn-lg" style="background-color: #007bff; color: white;">Create</button>
						</div>
					</form>
			</div>
	      </div>
	      <div class="row d-flex mb-5 contact-info" style="padding: 10px;">	          
	      	  <p>click the button to update the winner of the game as face of phinix for this week...</p>
	      	  	<a  style="background-color: #007bff; color: white; padding: 10px; border-radius: 10px; margin-top: -10px;" href="../includes/updatewinner.php">Update</a>	      	  
	      </div>
	      <div class="row d-flex mb-5 contact-info" style="padding: 10px;">	          
	      	  <p>click the button to rest players table for next week...</p>
	      	  	<a  style="background-color: #007bff; color: white; padding: 10px; border-radius: 10px; margin-top: -10px;" href="../includes/resetgamers.php">Reset</a>	      	  
	      </div>
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