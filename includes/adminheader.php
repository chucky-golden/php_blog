<?php
    require_once('connection.php');
    session_start();
  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $sql = "SELECT * FROM admin WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $admin_id = $row['id'];
    $name = $row['username'];
    $image = $row['photo'];
    $email = $row['email'];

  }//else{
  //   $error = "Please Login First";
  //   header("location: ../public/login.php?error=".$error);
  // }

    $query = "SELECT * FROM contact WHERE newmessage = 1";
    $res = mysqli_query($connect, $query);
    $following = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PHINIX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">

    <link rel="stylesheet" href="../assets/css/aos.css">

    <link rel="stylesheet" href="../assets/css/ionicons.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../assets/css/jquery.timepicker.css">
    
    
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome/css/font-awesome.css">
  </head>
  <body>
