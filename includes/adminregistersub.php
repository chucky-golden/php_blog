<?php
  require_once('connection.php');
  require_once('function.php');

  $uploadPath = "adminimage/";
  $error = array();
  if (isset($_POST['reg'])) {
    $email = isset($_POST['email'])?trim($_POST['email']):'';
    $username = isset($_POST['username'])?trim($_POST['username']):'';
    $password = isset($_POST['password'])?trim($_POST['password']):'';

    if ($email == "" || $username == "" || $password == "") {
      $error[] = urlencode("All fields are required");
    }else{
      $username = TrimData($_POST['username']);
      $email = TrimData($_POST['email']);
      $password = TrimData($_POST['password']);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "invalid email format";
    }

    if (empty($error)) {
      $new_password = password_encrypt($password);
      $username = mysql_prep($connect, $username);
      $email = mysql_prep($connect, $email);
      $new_password = mysql_prep($connect, $new_password);

      //check if mail exist
      $check = "SELECT * FROM admin WHERE email = '$email'";
      $check_result = mysqli_query($connect, $check);
      if (mysqli_num_rows($check_result) == 1) {
        $exist = "User with Email Address Already Exits";
        header("location: ../admin/adminlogin.php?error=".$exist);
      }
      else{ 

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
            $sql = "INSERT INTO admin(email,username,photo,password)VALUES('$email','$username','$pic','$new_password')";
            $result = mysqli_query($connect, $sql);

            if($result){  
              header('location: ../admin/dashboard.php');
            }
          }
        }else{
          $failed = "your file is too big";
          header("location: ../admin/adminlogin.php?error=".$failed);
        }

      }else{
        $failed = "file is not an image";
        header("location: ../admin/adminlogin.php?error=".$failed);
      }
    }
  }
  
    }else{
      header("location: register.php?error=".join($error, urlencode('<br>')));
    }
  }






















?>