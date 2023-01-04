<?php require_once('../includes/adminheader.php');?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="dashboard.php">Create Post</a></li>
					<li class="colorlib-active"><a href="users.php">View Users</a></li>
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
			<section class="ftco-section">
				<div class="container">
					<div class="row px-md-4">
						<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Email</th>
							<th>Username</th>
							<th>Date Registered</th>
							<th>actions</th>
						</tr>

						<?php
							require_once("../includes/connection.php");
							$sql = "SELECT * FROM users";
							$result = mysqli_query($connect, $sql);

							while ($row = mysqli_fetch_assoc($result)) {
								$deleted = $row['deleted'];
								?>
								<tr>
									<td><?php echo $row['email']?></td>
									<td><?php echo $row['username']?></td>
									<td><?php echo $row['date_created']?></td>
								<?php 
									if($deleted == 1){ ?>
									<td><a href="../includes/suspenduser.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-danger btn-sm" >block</a></td>
								<?php }else{ ?>
									<td><a href="../includes/unsuspenduser.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-primary btn-sm" >unblock</a></td>
								<?php } ?>
								</tr>
							<?php } ?>

					</table>
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