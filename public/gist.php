<?php require_once('../includes/header.php');?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
				<?php 
					if (isset($_SESSION['id'])) { ?>
					<li><a href="index.php">Home</a></li>
					<li class="colorlib-active"><a href="gist.php">Gist</a></li>
					<li><a href="sports.php">Sports</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="gamezone.php">GameZone</a></li>
					<?php } else { ?>
					<li><a href="index.php">Home</a></li>
					<li class="colorlib-active"><a href="gist.php">Gist</a></li>
					<li><a href="sports.php">Sports</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="login.php">Login / Register</a></li>
					<?php } ?>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<?php require_once('../includes/side2.php');?>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section">
				<div class="container">
					<div class="row px-md-4">

					<?php

	    					$sql3 = "SELECT * FROM created_post WHERE category = 'Gist' limit $limit offset $offset";
	    					$result3 = mysqli_query($connect, $sql3);
	    					while($row3 = mysqli_fetch_array($result3)){
	    						$id = $row3['id'];
	    						$commentcount = $row3['commentcount'];

	    						if($result3){
									$sql2 = "SELECT * FROM post_media WHERE post_id = '$id'";
									$result2 = mysqli_query($connect, $sql2);
									$row2 = mysqli_fetch_assoc($result2);
									$photo = $row2['post_file'];
								}
	    				?>
	    				
						<div class="col-md-12">
							<div class="blog-entry ftco-animate d-md-flex">
							<?php $fileExt = explode('.', $photo);
									$fileActExt = strtolower(end($fileExt));
				          	    	if ($fileActExt == 'jpeg' || $fileActExt == 'jpg' || $fileActExt == 'png') {?>
								<a href="details.php?id=<?php echo base64_encode($id);?>" class="img img-2" style="background-image: url(../includes/postfile/<?php echo $photo;?>);"></a>
									<?php }elseif($fileActExt == 'mp4' || $fileActExt == 'mkv') {?>
										<a href="details.php?id=<?php echo base64_encode($id);?>"> <video width="50" height="50" controls loop> <source src="../includes/postfile/<?php echo $photo;?>" type="video/mp4">
		                                Your browser does not support the video tag.</video></a>
					               <?php } ?>
								<div class="text text-2 pl-md-4">
		              <h3 class="mb-2"><a href="details.php?id=<?php echo base64_encode($id);?>"><?php echo $row3['topic']?></a></h3>
		              <div class="meta-wrap">
										<p class="meta">
		              		<span><i class="icon-calendar mr-2"></i><?php echo $row3['createddate']?></span>
				            <span><a href="details.php?id=<?php echo base64_encode($id);?>"><i class="icon-folder-o mr-2"></i><?php echo $row3['category']?></a></span>
				            <?php if($commentcount == 1){ ?>
				            <span><i class="icon-comment2 mr-2"></i><?php echo $commentcount; ?> Comment</span>
				            <?php }elseif($commentcount > 1){ ?>
				            <span><i class="icon-comment2 mr-2"></i><?php echo $commentcount; ?> Comments</span>
				            <?php } ?>
		              	</p>
	              	</div>
		              <p class="mb-4"><?php echo preg_replace("/[^ ]*$/", '', substr($row3['firstparagraph'], 0, 100))."....";?></p>
				              <p><a href="details.php?id=<?php echo base64_encode($id);?>" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
		            </div>
							</div>
						</div>
					<?php } ?>

					</div>
					<div class="row">
	          <div class="col text-center text-md-left">
	            <div class="block-27">
	              <ul>
	                <li><a href="#">&lt;</a></li>
	                <li class="active"><span>1</span></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">4</a></li>
	                <li><a href="#">5</a></li>
	                <li><a href="#">&gt;</a></li>
	              </ul>
	            </div>
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
    
  </body>
</html>