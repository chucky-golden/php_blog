<?php

require_once('connection.php');
require_once('function.php');

  $allow = array('jpg', 'jpeg', 'png', 'webm', 'mpg', 'mp2', 'mpeg', 'mpe', 'mpv', 'mp4', 'avi', 'm4p', 'm4v', 'mkv');
  
  $error = array();
  $uploadPath = "postfile/";

   if(isset($_POST['edit'])) {

    $topic = isset($_POST['topic'])?trim($_POST['topic']): '';
    $message = isset($_POST['message'])?trim($_POST['message']): '';
    $secmessage = isset($_POST['secmessage'])?trim($_POST['secmessage']): '';
    $category = isset($_POST['category'])?trim($_POST['category']): '';
    $id = $_POST['id'];

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

        $sql2 = "UPDATE `created_post` SET `topic` = '$topic', `firstparagraph` = '$message', `secondparagraph` = '$secmessage', `category` = '$category' WHERE `id` = '$id' AND deleted = 1";
        $result2 = mysqli_query($connect, $sql2);

        if($result2){
	        //setting popular event
	        if (isset($_POST['popular'])) {
	          $sql9 = "INSERT INTO popular_post(post_id)VALUES('$id')";
	          $result9 = mysqli_query($connect, $sql9);	             
	        }
	        $success = "post edited";
			header("location: ../admin/editpost.php?id=".base64_encode($id)."&success=".$success);
	    }else{
	    	$failed = "post edited";
			header("location: ../admin/editpost.php?id=".base64_encode($id)."&error=".$failed);
	    }        
      
   }else{
      header("location: ../admin/editpost.php?id=".base64_encode($id)."&error=".join($error, urlencode('<br>')));
    }
  }




































//editing post file
 if(isset($_POST['editfile'])) {
 	$id = $_POST['id'];

	       if (isset($_FILES['file'])) {    
	                      
	            $filename = $_FILES['file']['name'];
	            $fileSize = $_FILES['file']['size'];
	            $fileExt = explode('.', $filename);
	            $fileActualExt = strtolower(end($fileExt));

	            //checking if right type and size of file is uploaded
	            if (!in_array($fileActualExt, $allow) && $fileSize > 400000) {

	              $invalid = "invalid file format or file is too large";
	              header("location: ../admin/editpost.php?id=".base64_encode($id)."&error=".$invalid);         
	            }
	      	}

    if(empty($error)){	    

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

		        //compress size and upload image
		        $compressedimage = compressImage($imagetemp, $imageuploadpath, 35);

		        if($compressedimage){
		          	//$compressedimagesize = filesize($compressedimage);
		           	$sql = "UPDATE `post_media` SET `post_file` = '$pic' WHERE `post_id` = '$id'";
		           	$result = mysqli_query($connect, $sql);

			        if($result){  
			           $success = "post edited";
						header("location: ../admin/editpost.php?id=".base64_encode($id)."&success=".$success);
			        }
		        }		        
		    }
                      
        }
        
       
      
   }else{
      header("location: ../admin/editpost.php?id=".base64_encode($id)."&error=".join($error, urlencode('<br>')));
    }
  }




?>