<?php

require_once('connection.php');
require_once('function.php');

  $allow = array('jpg', 'jpeg', 'png', 'webm', 'mpg', 'mp2', 'mpeg', 'mpe', 'mpv', 'mp4', 'avi', 'm4p', 'm4v', 'mkv');
  
  $error = array();
  $uploadPath = "postfile/";

   if(isset($_POST['create'])) {

	    if ($_FILES['file']['size'] == [' ']) {
	      $invalid = "please you must upload a picture/video file";
	      header("location: ../admin/dashboard.php?error=".$invalid);
	    }else{

	       if (isset($_FILES['file'])) {
	      //getting total number of file uploaded      
	                      
	            $filename = $_FILES['file']['name'];
	            $fileSize = $_FILES['file']['size'];
	            $fileExt = explode('.', $filename);
	            $fileActualExt = strtolower(end($fileExt));

	            //checking if right type and size of file is uploaded
	            if (!in_array($fileActualExt, $allow) && $fileSize > 400000) {

	              $invalid = "invalid file format or file is too large";
	              header("location: ../admin/dashboard.php?error=".$invalid);         
	            }
	      	}
	    }


    $topic = isset($_POST['topic'])?trim($_POST['topic']): '';
    $message = isset($_POST['message'])?trim($_POST['message']): '';
    $secmessage = isset($_POST['secmessage'])?trim($_POST['secmessage']): '';
    $category = isset($_POST['category'])?trim($_POST['category']): '';

    if(empty($error)){

        $topic = TrimData($_POST['topic']);
        $message = TrimData($_POST['message']);
        $secmessage = TrimData($_POST['secmessage']);     
        $category = TrimData($_POST['category']);


        $topic = mysql_prep($connect, $topic);
        $message = mysql_prep($connect, $message);
        $secmessage = mysql_prep($connect, $secmessage);
        $category = mysql_prep($connect, $category);

        $main_date =  date("Y-m-d h:i:sa");

        $sql2 = "INSERT INTO created_post(topic, firstparagraph, secondparagraph, category, createddate)VALUES('$topic', '$message', '$secmessage', '$category', '$main_date')";
        $result2 = mysqli_query($connect, $sql2);

        if($result2){
          $sql5= "SELECT * FROM created_post WHERE createddate = '$main_date'";
          $result5 = mysqli_query($connect, $sql5);

          if (mysqli_num_rows($result5) > 0) {
            while ($row5 = mysqli_fetch_assoc($result5)) {
                $post_id = $row5['id'];
            }
          }
        //setting popular event
        if (isset($_POST['popular'])) {
          $sql9 = "INSERT INTO popular_post(post_id)VALUES('$post_id')";
          $result9 = mysqli_query($connect, $sql9);
             
          }

        if (isset($_FILES['file'])) {

		    //file info
		    $filename = $_FILES['file']['name'];
		    $fileExt = explode('.', $filename);
		    $fileActualExt = strtolower(end($fileExt));

		    $pic = uniqid('',true).'.'.$fileActualExt;


		    $imageuploadpath = $uploadPath . $pic;
		    $filetype = pathinfo($imageuploadpath, PATHINFO_EXTENSION);

		    //allow certain file format
		    $allowtypes = array('jpg', 'jpeg', 'png', 'gif');
		    $allowtypes2 = array('mp4', 'mp3', 'mkv', 'avi', 'mpeg');
		    if(in_array($filetype, $allowtypes)){
		        //image temp source and size
		        $imagetemp = $_FILES['file']['tmp_name'];
		        $imagesize = $_FILES['file']['size'];
		        if ($imagesize < 400000) {
		            //compress size and upload image
		            $compressedimage = compressImage($imagetemp, $imageuploadpath, 35);

		           if($compressedimage){
		             	//$compressedimagesize = filesize($compressedimage);
		             	$sql = "INSERT INTO post_media(post_id,post_file)VALUES('$post_id','$pic')";
		            	$result = mysqli_query($connect, $sql);

			            if($result){  
			              $success = "post uploaded successfully";
			              header('location: ../admin/dashboard.php?success='.$success);
			            }
		          	}
		        }else{
		        	$invalid = "Please enter an event name or caption.";
      				header("location: ../admin/dashboard.php?error=".$invalid);
		        }
		    }
                      
        }
      }
   }else{
      header("location: ../admin/dashboard.php?error=".join($error, urlencode('<br>')));
    }
  }

?>