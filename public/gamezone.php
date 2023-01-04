<?php require_once('../includes/header2.php');?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="lifestyle.php">Life Style</a></li>
					<li><a href="sports.php">Sports</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li class="colorlib-active"><a href="gamezone.php">GameZone</a></li>
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
	        <div class="form-group">
					<?php
						if (isset($_GET['error'])) {?>
							<div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
					<?php }elseif(isset($_GET['success'])){?>
							<div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
					 <?php } ?>
						</div>
	        <div id="flip">
	        	<p>Welcome to PHINIX GameZone platform...</p>
	        <p>Click on the PLAY button and answer the question before the time runs out to stand a chance to be on PHINIX face of the week...</p>
	        <p>Game is updateded every sunday and elaspes after 30minutes of upload. Goodluck!!!</p>
				<button name="edit" id="edit1" class="btn btn-default btn-lg" style="background-color: #007bff; color: white;">Play</button>
	        </div><br>
	        <div id="panel2">
	        	<?php
					require_once("../includes/connection.php");	
					$today_time = date("Y-m-d h:i:sa");				
					$sql = "SELECT * FROM game";
					$result = mysqli_query($connect, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
						$id = $row['id'];
						$question = $row['question'];
						$option1 = $row['option_a'];
						$option2 = $row['option_b'];
						$option3 = $row['option_c'];
						$option4 = $row['option_d'];
						$answer = $row['answer'];
						$created_time = $row['created_time'];
						$expires = $row['expires'];
						if($today_time >= $created_time && $today_time < $expires){

						$sql2 = "SELECT * FROM gamers WHERE game_id = '$id' AND winner_id = '$current_user_id'";
						$result2 = mysqli_query($connect, $sql2);
						if (mysqli_num_rows($result2) > 0) {	?>
						<div class="form-group">
							<p>you have already played game before...</p>
						</div>	        	
						<?php } else{ ?>

						<form action="../includes/gamers.php" method="post" class="bg-light p-5 contact-form">
					<h3><?php echo $question?></h3><br>
					<div class="form-group">
						<b><input type="radio" name="option" value="a" checked><?php echo $option1?></b><br><br>
						<b><input type="radio" name="option" value="b"><?php echo $option2?></b><br><br>
						<b><input type="radio" name="option" value="c"><?php echo $option3?></b><br><br>
						<b><input type="radio" name="option" value="d"><?php echo $option4?></b><br>
					</div>
					<div class="form-group">
						<button name="play" class="btn btn-default btn-lg" style="background-color: #007bff; color: white;">Save</button>
					</div>
				</form>
						<?php } ?>
					<?php } ?>
				<?php } ?>
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
  <script>
  	$(document).ready(function(){
	  $("#flip").click(function(){
	    $("#panel2").slideDown(650);
	  });
	});
  </script>
  </body>
</html>