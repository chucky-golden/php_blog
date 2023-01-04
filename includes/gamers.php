<?php
  require_once('connection.php');
  require_once('function.php');
  $error = array();

   session_start();
  if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $current_user_id = $row['id'];

  } 

  $sql2 = "SELECT * FROM game";
  $result2 = mysqli_query($connect, $sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $id2 = $row2['id'];
  $answer = $row2['answer'];

  
  if (isset($_POST['play'])) {
    $option = isset($_POST['option'])?trim($_POST['option']):'';    

      $sql3 = "INSERT INTO gamers(winner_id,game_id)VALUES('$current_user_id','$id2')";
      $result3 = mysqli_query($connect, $sql3);

      if($result3){
         if ($option == $answer) {
            
            $sql4 = "SELECT * FROM players WHERE game_id = '$id2'";
            $result4 = mysqli_query($connect, $sql4);

            if (mysqli_num_rows($result4) > 0) {

              $success = "thanks for playing. we will review your answer later";
              header("location: ../public/gamezone.php?success=".$success);
              
            }else{
              $sql5 = "INSERT INTO players(winner_id,game_id)VALUES('$current_user_id','$id2')";
              $result5 = mysqli_query($connect, $sql5);

              if($result5){
                $success = "thanks for playing. we will review your answer later";
                header("location: ../public/gamezone.php?success=".$success);
              }else{
                $failed = "error completing task, please try again later";
                header("location: ../public/gamezone.php?error=".$failed);
              }
            }

          }else{
            $success = "thanks for playing. we will review your answer later";
            header("location: ../public/gamezone.php?success=".$success);
          }
      }
  
    
  }







if ($option == $answer) {
 
}














?>