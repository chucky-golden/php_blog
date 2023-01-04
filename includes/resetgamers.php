<?php
require_once('connection.php');

	$sql = "DELETE FROM gamers";
	$result = mysqli_query($connect, $sql);

	if ($result) {
		$sql1 = "DELETE FROM players";
		$result1 = mysqli_query($connect, $sql1);

		if ($result1) {

		$success = "task completed successfully";
		header("location: ../admin/admingamezone.php?success=".$success);

		}
	}else{
		$failed = "Error completing task";
		header("location: ../admin/admingamezone.php?error=".$failed);
	}

?>