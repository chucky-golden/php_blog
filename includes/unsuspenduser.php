<?php
require_once('connection.php');

	if (isset($_GET['id'])) {
		$user_id = base64_decode($_GET['id']);

		$sql = "UPDATE `users` SET `deleted` = 1 WHERE `id` = '$user_id'";
			$result = mysqli_query($connect, $sql);

			if ($result) {
				$success = "user unsuspended";
				header("location: ../admin/users.php?success=".$success);
			}else{
				$failed = "Error completing task";
				header("location: ../admin/users.php?error=".$failed);
			}
	}


?>