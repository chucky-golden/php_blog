<?php

	require_once('connection.php');
	require_once('function.php');

	session_start();
  if (isset($_SESSION['id'])) {
    $userid = $_SESSION['id'];
    
    $sql = "SELECT * FROM users WHERE id = '$userid'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $current_user_id = $row['id'];

  }

	$error = array();

	if (isset($_POST['save']) && isset($_GET['id'])) {

		$post_id = base64_decode($_GET['id']);
		$sql = "SELECT * FROM created_post WHERE id = '$post_id'";
		$result = mysqli_query($connect, $sql);
		$row = mysqli_fetch_assoc($result);
		$post_id = $row['id'];
		$commentcount = $row['commentcount'];


		$comment = isset($_POST['comment'])?trim($_POST['comment']):'';
		if ($comment == "") {
	      $error[] = urlencode("field required");
	    }else{
	      $comment = TrimData($_POST['comment']);
	    }

	    if (empty($error)) {
	      $comment = mysql_prep($connect, $comment);
	      $create_date =  date("Y-m-d");
	      $create_time =  date("h:i");

	      $sql = "INSERT INTO comment(user_id,post_id,comment,createddate,createdtime)VALUES('$current_user_id','$post_id','$comment','$create_date','$create_time')";
            $result = mysqli_query($connect, $sql);
         	if ($result) {
         		$commentcount += 1;
         		$sql2 = "UPDATE `created_post` SET `commentcount` = '$commentcount' WHERE `id` = '$post_id' AND deleted = 1";
        		$result2 = mysqli_query($connect, $sql2);

        		if($result2){
				$success = "you just commented";
				header("location: ../public/details.php?id=".base64_encode($post_id)."&success=".$success);
				}else{
					$failed = "Error completing task";
					header("location: ../public/details.php?id=".base64_encode($post_id)."&error=".$failed);
				}
			}

	    }else{
      		header("location: ../public/details.php?id=".base64_encode($post_id)."&error=".join($error, urlencode('<br>')));
    	}


	} 

