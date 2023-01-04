<?php
	require_once('connection.php');

	$sql = "SELECT * FROM players";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $winner_id = $row['winner_id'];

    if($result){
    	$sql = "SELECT * FROM faceofweek";
		$result = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result) > 0) {
			$sql3 = "UPDATE `faceofweek` SET `user_id` = '$winner_id'";
			$result3 = mysqli_query($connect, $sql3);

			if($result3){
	          $success = "face of the week updated";
			  header("location: ../admin/admingamezone.php?success=".$success);
	        }else{
	        	$failed = "error completing task";
				header("location: ../admin/admingamezone.php?error=".$failed);
	        }
		}else{
			$sql4 = "INSERT INTO faceofweek(user_id)VALUES('$winner_id')";
			$result4 = mysqli_query($connect, $sql4);

			if($result4){
	          $success = "face of the week updated";
			  header("location: ../admin/admingamezone.php?success=".$success);
	        }else{
	        	$failed = "error completing task";
				header("location: ../admin/admingamezone.php?error=".$failed);
	        }
		}
    }


?>