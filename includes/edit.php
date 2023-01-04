<?php

	require_once('connection.php');
	require_once('function.php');

	$error = array();
	$uploadPath = "profilepic/";

	//editing username and password
	if (isset($_POST['edit'])) {
		$email = isset($_POST['email'])?trim($_POST['email']):'';
		$username = isset($_POST['username'])?trim($_POST['username']):'';
		$id = $_POST['id'];

		if ($username == '' || $email == '') {
			$error[] = urlencode("Please All Fields Are Required");
		}else{
			$username = TrimData($_POST['username']);
      		$email = TrimData($_POST['email']);
		}
		if (empty($error)) {

			$username = mysql_prep($connect, $username);
     		$email = mysql_prep($connect, $email);

			$sql = "UPDATE `users` SET `email` = '$email', `username` = '$username' WHERE `id` = '$id' AND deleted = 1";
			$result = mysqli_query($connect, $sql);

			if ($result) {
				$success = "user details Updated Sucessfully";
				header("location: ../public/profile.php?success=".$success);
			}else{
				$failed = "Error Updating user details";
				header("location: ../public/profile.php?error=".$failed);
			}
		}else{
			header('location: ../public/profile.php?error='.join($error, urlencode('<br>')));
		}
	}


	//editing password
	if (isset($_POST['edit2'])) {
		$password = isset($_POST['password'])?trim($_POST['password']):'';
		$id = $_POST['id'];

		if ($password == '') {
			$error[] = urlencode("Please All Fields Are Required");
		}else{
			$password = TrimData($_POST['password']);
		}
		if (empty($error)) {
			$new_password = password_encrypt($password);
      		$new_password = mysql_prep($connect, $new_password);

			$sql = "UPDATE `users` SET `password` = '$new_password' WHERE `id` = '$id' AND deleted = 1";
			$result = mysqli_query($connect, $sql);

			if ($result) {
				$success = "user details Updated Sucessfully";
				header("location: ../public/profile.php?success=".$success);
			}else{
				$failed = "Error Updating user details";
				header("location: ../public/profile.php?error=".$failed);
			}
		}else{
			header('location: ../public/profile.php?error='.join($error, urlencode('<br>')));
		}
	}



	//editing profilepics
	if (isset($_POST['edit3'])) {
		$id = $_POST['id'];
		if(isset($_FILES['image']['name'])){
		      //file info
		      $filename = $_FILES['image']['name'];
		      $fileExt = explode('.', $filename);
		      $fileActualExt = strtolower(end($fileExt));

		      $pic = uniqid('',true).'.'.$fileActualExt;


		      $imageuploadpath = $uploadPath . $pic;
		      $filetype = pathinfo($imageuploadpath, PATHINFO_EXTENSION);

		      //allow certain file format
		      $allowtypes = array('jpg', 'jpeg', 'png', 'gif');
		      if(in_array($filetype, $allowtypes)){
		        //image temp source and size
		        $imagetemp = $_FILES['image']['tmp_name'];
		        $imagesize = $_FILES['image']['size'];
		        if ($imagesize < 400000) {
		            //compress size and upload image
		          $compressedimage = compressImage($imagetemp, $imageuploadpath, 35);

		          if($compressedimage){
		            //$compressedimagesize = filesize($compressedimage);
		            $sql = "UPDATE `users` SET `photo` = '$pic' WHERE `id` = '$id' AND deleted = 1";
		            $result = mysqli_query($connect, $sql);

		            if($result){  
		              $success = "profile picture Updated Sucessfully";
					  header("location: ../public/profile.php?success=".$success);
		            }
		          }
		        }else{
		          $failed = "your file is too big";
		          header("location: ../public/profile.php?error=".$failed);
		        }

		      }else{
		        $failed = "file is not an image";
		        header("location: ../public/profile.php?error=".$failed);
		      }
    	}

	}



?>