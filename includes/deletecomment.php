<?php
require_once('connection.php');

	if (isset($_GET['id'])) {
		$com_id = base64_decode($_GET['id']);
		$post_id = base64_decode($_GET['id2']);
		$counter = base64_decode($_GET['id2']);

		$sql = "UPDATE `comment` SET `deleted` = 0 WHERE `id` = '$com_id'";
		$result = mysqli_query($connect, $sql);

		if ($result) {
			$counter -= 1;
			$sql2 = "UPDATE `created_post` SET `commentcount` = '$commentcount' WHERE `id` = '$post_id' AND deleted = 1";
        	$result2 = mysqli_query($connect, $sql2);
        	if (result2) {
        		header("location: ../public/details.php?id=".base64_encode($post_id));
        	}else{
				header("location: ../public/details.php?id=".base64_encode($post_id));
			}
		}
	}


?>