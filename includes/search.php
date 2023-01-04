<?php
require_once('function.php');
require_once('connection.php');


if (isset($_POST['search'])) {
		$search = isset($_POST['search'])?trim($_POST['search']):'';

		if ($search == "") {
			header("location: ../public/index.php");
		}
		else{
			$search = TrimData($_POST['search']);
			$search = mysql_prep($connect, $search);
			$search = base64_encode($search);
			header("location: ../public/search.php?search=".$search);
		}
		
}
?>