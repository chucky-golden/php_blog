<?php require_once('../includes/adminheader.php');?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="../public/index.php">Home</a></li>
					<li class="colorlib-active"><a href="adminlogin.php">Login / Register</a></li>
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
						<div class="col-md-12">
							<div class="blog-entry ftco-animate d-md-flex">
							<div class="login-box">
								<form action="../includes/adminloginsub.php" method="post" class="bg-light p-5 contact-form">
								<div class="form-group">
							<?php
							if (isset($_GET['error'])) {?>
								<div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
							<?php }elseif(isset($_GET['sucess'])){?>
								<div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
							 <?php } ?>
								</div>
					              <div class="form-group">
					                <label>Email:</label>
					                <input type="email" required class="form-control" placeholder="Email" name="email">
					              </div><br>
					              <div class="form-group">
					                <label>Password:</label>
					                <input type="password" required class="form-control" placeholder="Password" name="password">
					              </div><br>
					              <div class="form-group">
					                <input type="submit" name="login" value="Login" class="btn btn-primary py-3 px-5">					                
					              </div><br>
					              <div class="form-group">
					              	<p><a href="" data-toggle="modal" data-target="#forgot" style="">Forgot Password ?</a></p>
					              </div>
					            </form>
					            <p>Not yet a member <span class="btn btn-link" id="show">Click Here...</span> to register</p>
					        </div>
					        <div class="register-box">
								<form action="../includes/adminregistersub.php" method="post" class="bg-light p-5 contact-form" enctype="multipart/form-data">
								<div class="form-group">
							<?php
							if (isset($_GET['error'])) {?>
								<div class="alert alert-danger"><?=urldecode($_GET['error'])?></div>
							<?php }elseif(isset($_GET['sucess'])){?>
								<div class="alert alert-success"><?=urldecode($_GET['success'])?></div>
							 <?php } ?>
								</div>
								  <div class="form-group">
								  	<img src="" class="img img-circle img-responsive" id="profile_img_tag" width="200" height="250">
								  </div>
								  <div class="form-group">
					                <input type="email" required class="form-control" placeholder="Email" name="email">
					              </div><br>
					              <div class="form-group">
					                <input type="text" required class="form-control" placeholder="Userame" name="username">
					              </div><br>
					              <div class="form-group">
					                <label>Upload Profile Picture</label><br>
					                <input type="file" required id="uploadFile" name="image">
					              </div><br>
					              <div class="form-group">
					                <input type="password" required class="form-control" placeholder="password" name="password">
					              </div><br>
					              <div class="form-group">
					                <input type="submit" name="reg" value="Login" class="btn btn-primary py-3 px-5">					                
					              </div><br>
					            </form>
					            <p>Already a member <span class="btn btn-link" id="hide">Click Here...</span> to login</p>
					        </div>    					            
							</div>						
						</div>						
					</div>
				</div>
			</section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

<!-- Modal -->
<div id="forgot" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="../include/checkmail.php" method="POST">
        	<div class="form-group">
        		<label>ENTER YOUR EMAIL</label>
      			<input name="email" class="form-control" type="email">
        	</div>
        	<div class="form-group text-center">
        		<button class="btn btn-default" name="submit" style="background-color: #007bff;color: white;">SEND</button>
        	</div>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




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
		$(".register-box").hide();
		$("#show").click(function(){
			$(".login-box").hide();
			$(".register-box").fadeIn(500);
		});
		$("#hide").click(function(){
			$(".login-box").fadeIn(500);
			$(".register-box").hide();
		});
	});
</script> 
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