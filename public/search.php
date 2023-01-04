<?php require_once('../includes/header.php');?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
				<?php 
					if (isset($_SESSION['id'])) { ?>
					<li class="colorlib-active"><a href="index.php">Home</a></li>
					<li><a href="lifestyle.php">Life Style</a></li>
					<li><a href="sports.php">Sports</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="gamezone.php">GameZone</a></li>
					<?php } else { ?>
					<li class="colorlib-active"><a href="index.php">Home</a></li>
					<li><a href="lifestyle.php">Life Style</a></li>
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
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4">
			    			<div class="col-md-12">
									<div class="blog-entry ftco-animate d-md-flex">					
								<div class="text text-2 pl-md-4">
				              		<h3 class="mb-2">Your Search Results.....</h3>
				            	</div>
							</div>
								</div>
								<?php

								    if (isset($_GET['search'])) {

									$search = base64_decode($_GET['search']);

									$sql = "SELECT * FROM created_post WHERE topic LIKE '%".$search."%' AND deleted = 1";
									$result1 = mysqli_query($connect, $sql);
									if (mysqli_num_rows($result1) > 0) {
									while($row = mysqli_fetch_assoc($result1)){
										$commentcount = $row['commentcount'];	
										$id = $row['id'];	

										if($result1){
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
				              <h3 class="mb-2"><a href="details.php?id=<?php echo base64_encode($id);?>"><?php echo $row['topic']?></a></h3>
				              <div class="meta-wrap">
												<p class="meta">
				              		<span><i class="icon-calendar mr-2"></i><?php echo $row['createddate']?></span>
				            <span><a href="details.php?id=<?php echo base64_encode($id);?>"><i class="icon-folder-o mr-2"></i><?php echo $row['category']?></a></span>
				            <?php if($commentcount == 1){ ?>
				            <span><i class="icon-comment2 mr-2"></i><?php echo $commentcount; ?> Comment</span>
				            <?php }elseif($commentcount > 1){ ?>
				            <span><i class="icon-comment2 mr-2"></i><?php echo $commentcount; ?> Comments</span>
				            <?php } ?>
				              	</p>
			              	</div>
				              <p class="mb-4"><?php echo preg_replace("/[^ ]*$/", '', substr($row['firstparagraph'], 0, 100))."....";?></p>
				              <p><a href="details.php?id=<?php echo base64_encode($id);?>" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
				            </div>
									</div>
								</div>
								<?php } ?>
								<?php }else{ ?>
								<div class="col-md-12">
									<div class="blog-entry ftco-animate d-md-flex">
										<p>No result found,enter the right keyword...</p>
									</div>
								</div>
								<?php } ?>
							<?php } ?>

								
			    		</div><!-- END-->
			    		<div class="row">
			          <div class="col">
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
			    	<?php require_once('../includes/side.php');?><!-- END COL -->
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