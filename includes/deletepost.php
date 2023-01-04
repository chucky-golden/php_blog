<?php
require_once('connection.php');

	if (isset($_GET['id'])) {
		$user_id = base64_decode($_GET['id']);

		$sql = "UPDATE `created_post` SET `deleted` = 0 WHERE `id` = '$user_id'";
			$result = mysqli_query($connect, $sql);

			if ($result) {
				$success = "post deleted";
				header("location: ../admin/viewpost.php?success=".$success);
			}else{
				$failed = "Error completing task";
				header("location: ../admin/viewpost.php?error=".$failed);
			}
	}


?>