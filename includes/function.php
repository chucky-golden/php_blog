<?php

	function TrimData($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripcslashes($data);

		return $data;
	}

	function password_encrypt($pass){
		$new_pass5 = sha1(md5(sha1(md5(sha1($pass)))));
		return $new_pass5;
	}

	function mysql_prep($connect, $string){
		$escaped_string = mysqli_real_escape_string($connect, $string);
		return $escaped_string;
	}

  function compressImage($source, $destination, $quality){
    //get image info
    $imginfo = getimagesize($source);
    $mime = $imginfo['mime'];

    //create a new image from file
    switch ($mime) {
      case 'image/jpeg':
        $image = imagecreatefromjpeg($source);
        break;
      case 'image/png':
        $image = imagecreatefrompng($source);
        break;
      case 'image/gif':
        $image = imagecreatefromgif($source);
        break;
      
      default:
        $image = imagecreatefromjpeg($source);
    }

    //save image
    imagejpeg($image, $destination, $quality);

    //return compressed image
    return $destination;
  }







	   // function get_user_details($id){
    //     global $connect,$user_image,$user_name;
    //     $sqlr8 = "SELECT * FROM users WHERE id = '$id'";
    //     $resultr8 = mysqli_query($connect, $sqlr8);
    //     $rowr8 = mysqli_fetch_assoc($resultr8);
    //     $user_name  = $rowr8['username']; 
    //     $user_image = $rowr8['image'];
    // }       







?>