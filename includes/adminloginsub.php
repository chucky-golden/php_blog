<?php

 	require_once('connection.php');
  	require_once('function.php');


  	$error = array();

	if (isset($_POST['login'])) {
		$email = isset($_POST['email'])?trim($_POST['email']): '';
		$password = isset($_POST['password'])?trim($_POST['password']): '';

		if ($email == '' || $password == '') {
			$error[] = urlencode("ALL FIELDS ARE REQUIRED");
		}
		else{
			$email = TrimData($_POST['email']);
			$password = TrimData($_POST['password']);
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error[] = "invalid email format";
		}

		if (empty($error)) {
			// compare encrypted in database password with login password 
			$new_password = password_encrypt($password);
			$email = mysql_prep($connect, $email);
			$new_password = mysql_prep($connect, $new_password);

			$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$new_password' AND deleted = 1";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					session_start();
					$_SESSION['id'] = $row['id'];

					if (isset($_SESSION['id'])) {						
						header('location: ../admin/dashboard.php');
					}else{
						$errors = "email or password is empty";
						header('location: ../admin/adminlogin.php?error='.$errors);
					}
				}	

			}else{				
					$invalid = "email or password does not exist";
					header('location: ../admin/adminlogin.php?error='.$invalid);
			}	

		}else{
			header('location: ../admin/adminlogin.php?error='.join($error, urlencode('<br>')));
		}
	}












?>