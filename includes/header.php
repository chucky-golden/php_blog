<?php
    require_once('connection.php');
    session_start();
  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $current_user_id = $row['id'];
    $name = $row['username'];
    $image = $row['photo'];
    $email = $row['email'];

  }//else{
  //   $error = "Please Login First";
  //   header("location: ../public/login.php?error=".$error);
  // }


$limit = 5;

  $offset = isset($_GET['page']) ? $_GET['page'] : 0;

  $sql2 = "SELECT COUNT(*) AS row FROM created_post";
  $rows2 = mysqli_fetch_array(mysqli_query($connect, $sql2));
  if ($offset == 0 || $offset == 1) {
    $offset = 0;
  }elseif($offset > 1){
    if (($limit * $offset) < $rows2['row']){
      $offset = $limit * ($offset - 1);
    }else{
      $rate = $limit * $offset;

      $offset = ($limit * $offset) - $limit;
    }
  }

  if ($rows2['row'] > $limit) {
    $pagination = $rows2['row'] / $limit;
    if (gettype($pagination) != 'integer') {
      $break = explode('.', $pagination);
      $pagination = $break[0] + 1;
    }
  }
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
