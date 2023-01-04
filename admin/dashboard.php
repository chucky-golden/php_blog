<?php require_once('../includes/adminheader.php');?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="dashboard.php">Create Post</a></li>
					<li><a href="users.php">View Users</a></li>
					<li><a href="admincontact.php">Contact <span class="badge" style="background-color: #007bff; color: white;"><?php echo mysqli_num_rows($res); ?></span></a></li>
					<li class="colorlib-active"><a href="adminprofile.php">Profile</a></li>
					<li><a href="viewpost.php">View Post</a></li>
					<li><a href="admingamezone.php">GameZone</a></li>
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
					<form action="../includes/createsub.php" method="post" class="bg-light p-5 contact-form" enctype="multipart/form-data">
						<div class="form-group">
					<?php
						if (isset($_GET['error'])) {?>
							<div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
					<?php }elseif(isset($_GET['success'])){?>
							<div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
					 <?php } ?>
						</div>

						<div class="form-group">
							<img src="" class="img img-circle img-responsive" id="profile_img_tag" width="200" height="200">
						</div>
						<div class="form-group">
							<label>Topic</label>
							<input type="text" name="topic" required class="form-control">
						</div>
						<div class="form-group">
							<label>Subject</label>
							<textarea id="" cols="30" rows="7" required name="message" class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							 <label>Upload file</label><br>
							 <input type="file" required id="uploadFile" name="file">
						</div>
						<div class="form-group">
							<label>Post continuation</label>
							<textarea id="" cols="30" rows="7" required name="secmessage" class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group">
							 <label>Porpular article</label>
							 <input type="checkbox" name="popular">
						</div>
						<div><br>
							<select class="form-control" required name="category">
						    	<option value="Entertainment">ENTERTAINMENT</option>
						    	<option value="Gist">GIST</option>
						    	<option value="Lifestyle">LIFESTYLE</option>
						    	<option value="News">NEWS</option>
						    	<option value="Sports">SPORTS</option>
						    </select>
						</div><br><br>
						<div class="form-group">
							<button name="create" class="btn btn-default btn-lg" style="background-color: #007bff; color: white;">Create</button>
						</div>
					</form>
			</div>
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
  <script>
	$(document).ready(function(){
		function readURL(input){
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e){
					$('#profile_img_tag').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$('#uploadFile').change(function(){
			readURL(this);
		})
	})
</script>
  </body>
</html>