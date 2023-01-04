<?php require_once('../includes/adminheader.php');?>
<?php
	require_once('../includes/connection.php');
	if (isset($_GET['id'])) {
		$id = base64_decode($_GET['id']);
		$sql = "SELECT * FROM created_post WHERE id = '$id'";
		$result = mysqli_query($connect, $sql);
		$row = mysqli_fetch_assoc($result);
		$topic = $row['topic'];
		$firstparagraph = $row['firstparagraph'];
		$secondparagraph = $row['secondparagraph'];
		$category = $row['category'];

		if($result){
			$sql2 = "SELECT * FROM post_media WHERE post_id = '$id'";
			$result2 = mysqli_query($connect, $sql2);
			$row2 = mysqli_fetch_assoc($result2);
			$photo = $row2['post_file'];
		}
	}



?>
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
	        <div class="col-md-6">
					<form action="../includes/editpost.php" method="POST" class="bg-light p-5 contact-form">
						<div class="form-group">
					<?php
						if (isset($_GET['error'])) {?>
							<div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
					<?php }elseif(isset($_GET['success'])){?>
							<div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
					 <?php } ?>
						</div>
						<div class="form-group">
							<label>Topic</label>
							<input type="text" name="topic" required class="form-control" value="<?php echo $topic?>">
							<input type="hidden" name="id" value="<?=$id?>">
						</div>
						<div class="form-group">
							<label>First paragraph</label>
							<textarea id="" cols="30" rows="7" required name="message" class="form-control" placeholder="Message"><?php echo $firstparagraph?></textarea>
						</div>
						<div class="form-group">
							<label>Post continuation</label>
							<textarea id="" cols="30" rows="7" required name="secmessage" class="form-control" placeholder="Message"><?php echo $secondparagraph?></textarea>
						</div>
						<div class="form-group">
							 <label>Porpular article</label>
							 <input type="checkbox" name="popular">
						</div>
						<div><br>
							<select class="form-control" required name="category">
								<option value="<?php echo $category?>"><?php echo $category?></option>
						    	<option value="Entertainment">ENTERTAINMENT</option>
						    	<option value="Gist">GIST</option>
						    	<option value="Lifestyle">LIFESTYLE</option>
						    	<option value="News">NEWS</option>
						    	<option value="Sports">SPORTS</option>
						    </select>
						</div><br><br>
						<div class="form-group">
							<button name="edit" class="btn btn-default btn-lg" style="background-color: #007bff; color: white;">Edit post</button>
						</div>
					</form>
			</div>
			<div class="col-md-6">
					<form action="../includes/editpost.php" method="POST" class="bg-light p-5 contact-form" enctype="multipart/form-data">
						<div class="form-group">
							<img src="../includes/postfile/<?php echo $photo;?>" class="img img-circle img-responsive" id="profile_img_tag" width="200" height="200">
						</div>
						<div class="form-group">
							 <label>Upload file</label><br>
							 <input type="file" name="file" id="uploadFile">
							 <input type="hidden" name="id" value="<?=$id?>">
						</div>
						<div class="form-group">
							<button name="editfile" class="btn btn-default btn-lg" style="background-color: #007bff; color: white;">Edit file</button>
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