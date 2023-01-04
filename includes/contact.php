<?php
  require_once('connection.php');
  require_once('function.php');
  
  $error = array();
  if (isset($_POST['send'])) {
    $username = isset($_POST['username'])?trim($_POST['username']):'';
    $email = isset($_POST['email'])?trim($_POST['email']):'';
    $subject = isset($_POST['subject'])?trim($_POST['subject']):'';
    $message = isset($_POST['message'])?trim($_POST['message']):'';

    if ($username == "" || $email == "" || $subject == "" || $message == "") {
      $error[] = urlencode("All fields are required");
    }else{
      $username = TrimData($_POST['username']);
      $email = TrimData($_POST['email']);
      $subject = TrimData($_POST['subject']);
      $message = TrimData($_POST['message']);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "invalid email format";
    }

    if (empty($error)) {
      $username = mysql_prep($connect, $username);
      $email = mysql_prep($connect, $email);
      $subject = mysql_prep($connect, $subject);
      $message = mysql_prep($connect, $message);

      $sql = "INSERT INTO contact(username,email,subject,message)VALUES('$username','$email','$subject','$message')";
      $result = mysqli_query($connect, $sql);

      if($result){
          $success = "your message has been sent, we will get back to you";  
          header('location: ../public/contact.php?success='.$success);
      }else{
        $failed = "unexpected error";
        header("location: ../public/contact.php?error=".$failed);
      }
  
    }else{
      header("location: ../public/contact.php?error=".join($error, urlencode('<br>')));
    }
  }






















?>