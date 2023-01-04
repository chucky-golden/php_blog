	<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
	            <div class="sidebar-box pt-md-4">
	              <form action="../includes/search.php" method="post" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" name="search" class="form-control" placeholder="Type a keyword and hit enter">
	                </div>
	              </form>
	            </div>
	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Categories</h3>
	              <ul class="categories">
	                <li><a href="lifestyle.php">Life Style</a></li>
	                <li><a href="news.php">News</a></li>
	                <li><a href="sports.php">Sports</a></li>
	                <li><a href="entertainment.php">Entertainment</a></li>
	                <li><a href="gist.php">Gist</a></li>
	              </ul>
	            </div>

	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Popular Articles</h3>
	              <?php

	    			$sql3 = "SELECT * FROM popular_post limit 3";
	    			$result3 = mysqli_query($connect, $sql3);
	    			while($row3 = mysqli_fetch_array($result3)){
	    				$id = $row3['post_id'];

	    				if($result3){
							$sql4 = "SELECT * FROM created_post WHERE id = '$id'";
							$result4 = mysqli_query($connect, $sql4);
							$row4 = mysqli_fetch_assoc($result4);
							$commentcount2 = $row4['commentcount'];
						

		    				if($result4){
								$sql2 = "SELECT * FROM post_media WHERE post_id = '$id'";
								$result2 = mysqli_query($connect, $sql2);
								$row2 = mysqli_fetch_assoc($result2);
								$photo = $row2['post_file'];
							}
						}
	    			?>
	              <div class="block-21 mb-4 d-flex">
	              <?php 
	              		$fileExt = explode('.', $photo);
						$fileActExt = strtolower(end($fileExt));
				        if ($fileActExt == 'jpeg' || $fileActExt == 'jpg' || $fileActExt == 'png') {?>
	                <a href="details.php?id=<?php echo base64_encode($id);?>" class="blog-img mr-4" style="background-image: url(../includes/postfile/<?php echo $photo;?>);"></a>
	                <?php }elseif($fileActExt == 'mp4' || $fileActExt == 'mkv') {?>
					<a href="details.php?id=<?php echo base64_encode($id);?>"> <video width="50" height="50" controls loop> <source src="../includes/postfile/<?php echo $photo;?>" type="video/mp4">Your browser does not support the video tag.</video></a>
					<?php } ?>	
	                <div class="text">
	                  <h3 class="heading"><a href="details.php?id=<?php echo base64_encode($id);?>"><?php echo $row4['topic']?></a></h3>
	                  <div class="meta">
	                    <div><a href="details.php?id=<?php echo base64_encode($id);?>"><span class="icon-calendar"></span> <?php echo $row4['createddate']?></a></div>
	                    <div><a href="details.php?id=<?php echo base64_encode($id);?>"><span class="icon-folder-o"></span> <?php echo $row4['category']?></a></div>
	                    <div>
	                    <?php if($commentcount2 > 0){ ?>
	                    	<a href="details.php?id=<?php echo base64_encode($id);?>"><span class="icon-chat"></span> <?php echo $commentcount2; ?></a>
	                    <?php } ?>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <?php } ?>

	            </div>

				<div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">
					<div class="overlay"></div>
					<h3 class="mb-4 sidebar-heading">Face of <b>PHINIX</b></h3>
					<p class="mb-4">Be the lucky winner in the GAME ZONE to be face of PHINIX for the week...</p>	              
	                <div>
	                	<?php    
						    $sql = "SELECT * FROM faceofweek";
						    $result = mysqli_query($connect, $sql);
						    $row = mysqli_fetch_assoc($result);
						    $user_id = $row['user_id'];
						    if($result){
						    	$sql4 = "SELECT * FROM users where id = '$user_id'";
							    $result4 = mysqli_query($connect, $sql4);

							    if (mysqli_num_rows($result4) > 0) {

							    $row4 = mysqli_fetch_assoc($result4);
							    $winner_username = $row4['username'];
							    $winner_photo = $row4['photo']; ?>

	                  <img src="../includes/profilepic/<?php echo $winner_photo;?>" class="img img-responsive"><br><br>
	                  <p><b><?php echo $winner_username?></b></p>

	                  	  <?php }else { ?>
	                  <img src="../assets/images/image_12.jpg" class="img img-responsive"><br><br>
	                  <p><b>morgan</b></p>

	                  	  <?php } ?>
	              <?php } ?>


	                </div>
	              
	            </div>

	          </div>



	          
	          