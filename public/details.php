<?php require_once('../includes/header.php');?>
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
		$commentcount = $row['commentcount'];

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
				<?php 
					if (isset($_SESSION['id'])) { ?>
					<li><a href="index.php">Home</a></li>
					<li><a href="lifestyle.php">Life Style</a></li>
					<li><a href="sports.php">Sports</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="gamezone.php">GameZone</a></li>
					<?php } else { ?>
					<li><a href="index.php">Home</a></li>
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
	    			<div class="col-lg-8 px-md-5 py-5">
	    				<div class="row pt-md-4">
	    					<h1 class="mb-3"><?php echo $topic?></h1>
		            <p><?php echo $firstparagraph?></p>
		            <p>
		            <?php $fileExt = explode('.', $photo);
						$fileActExt = strtolower(end($fileExt));
				        if ($fileActExt == 'jpeg' || $fileActExt == 'jpg' || $fileActExt == 'png') {?>
		              <img src="../includes/postfile/<?php echo $photo;?>" alt="" class="img-fluid">
		            <?php }elseif($fileActExt == 'mp4' || $fileActExt == 'mkv') {?>
						<video width="50" height="50" controls loop> <source src="../includes/postfile/<?php echo $photo;?>" type="video/mp4">Your browser does not support the video tag.</video>
					<?php } ?>
		            </p>
		            <p><?php echo $secondparagraph?></p>

		            <div class="pt-5 mt-5" id="trial">
		            <?php if($commentcount == 1){ ?>
		             	<h3 class="mb-5 font-weight-bold"><?php echo $commentcount; ?> Comment</h3>
		            <?php }elseif($commentcount > 1){ ?>
		            	<h3 class="mb-5 font-weight-bold"><?php echo $commentcount; ?> Comments</h3>
		            <?php } ?>
		              <ul class="comment-list">
		               <?php 
		                  	$sql5 = "SELECT * FROM comment WHERE post_id = '$id' AND deleted = 1";
							$result5 = mysqli_query($connect, $sql5);
							while($row5 = mysqli_fetch_array($result5)){
	    						$com_id = $row5['id'];
	    						$user_id = $row5['user_id'];
	    						$comment = $row5['comment'];
	    						$createddate = $row5['createddate'];
	    						$createdtime = $row5['createdtime'];

	    						if($result5){
									$sql2 = "SELECT * FROM users WHERE id = '$user_id'";
									$result2 = mysqli_query($connect, $sql2);
									$row2 = mysqli_fetch_assoc($result2);
									$user_comm = $row2['username'];
									$photo_com = $row2['photo'];
								}
		                  ?>
		                <li class="comment">
		                  <div class="vcard bio">
		                    <img src="../includes/profilepic/<?php echo $photo_com;?>" alt="Image placeholder">
		                  </div>		                  
		                  <div class="comment-body">
		                    <h3><?php echo $user_comm; ?></h3>
		                    <div class="meta"><?php echo $createddate; ?> at <?php echo $createdtime; ?></div>
		                    <p><?php echo $comment; ?></p>
		                  </div>
		                  <div class="comment-body" id="commentbox">
		                  <?php if($user_id == $current_user_id){ ?>
		                  	<a href="../includes/deletecomment.php?id=<?php echo base64_encode($com_id).'&id2='.base64_encode($id).'&counter='.base64_encode($commentcount);?>"><span class="fa fa-trash-o"></span></a>		                  	 
		                  <?php } ?>
		                  </div>
		                </li>
		               <?php } ?>
		              </ul>
		              <!-- END comment-list -->
		              <?php 
						if (isset($_SESSION['id'])) { ?>
		              <div class="comment-form-wrap pt-5">
		                <h3 class="mb-5">Leave a comment</h3>
		                <form action="../includes/comment.php?id=<?php echo base64_encode($id);?>" method="post" class="p-3 p-md-5 bg-light">
		                  <div class="form-group">
		                    <label for="message">Message</label>
		                    <textarea required name="comment" id="message" cols="30" rows="5" class="form-control"></textarea>
		                  </div>
		                  <div class="form-group">
		                    <input type="submit" name="save" value="Post Comment" class="btn py-3 px-4 btn-primary">
		                  </div>
		                  <div class="form-group">
							<?php
							if (isset($_GET['error'])) {?>
								<div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
							<?php }elseif(isset($_GET['success'])){?>
								<div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
							 <?php } ?>
								</div>
		                </form>
		              </div>
		            <?php } ?>
		            </div>
			    		</div><!-- END-->
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