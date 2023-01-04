<?php

require_once('connection.php');
require_once('function.php');
  
  $error = array();

   if(isset($_POST['create'])) {

    $question = isset($_POST['question'])?trim($_POST['question']): '';
    $option1 = isset($_POST['option1'])?trim($_POST['option1']): '';
    $option2 = isset($_POST['option2'])?trim($_POST['option2']): '';
    $option3 = isset($_POST['option3'])?trim($_POST['option3']): '';
    $option4 = isset($_POST['option4'])?trim($_POST['option4']): '';
    $answer = isset($_POST['answer'])?trim($_POST['answer']): '';

    if ($question == '' || $option1 == '' || $option2 == '' || $option3 == '' || $option4 == '' || $answer == '') {
			$error[] = urlencode("ALL FIELDS ARE REQUIRED");
	}else{
		$question = TrimData($_POST['question']);
        $option1 = TrimData($_POST['option1']);
        $option2 = TrimData($_POST['option2']);     
        $option3 = TrimData($_POST['option3']);
        $option4 = TrimData($_POST['option4']);
        $answer = TrimData($_POST['answer']);
	}

    if(empty($error)){
    	
        $question = mysql_prep($connect, $question);
        $option1 = mysql_prep($connect, $option1);
        $option2 = mysql_prep($connect, $option2);
        $option3 = mysql_prep($connect, $option3);
        $option4 = mysql_prep($connect, $option4);
        $answer = mysql_prep($connect, $answer);

        $created_time = date("Y-m-d h:i:sa");

		$expires = date('Y-m-d h:i:sa', strtotime($created_time. ' + 30 minutes'));

		$sql = "SELECT * FROM game";
		$result = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result) > 0) { 
			$sql3 = "UPDATE `game` SET `question` = '$question', `option_a` = '$option1', `option_b` = '$option2', `option_c` = '$option3', `option_d` = '$option4', `answer` = '$answer', `created_time` = '$created_time', `expires` = '$expires'";
			$result3 = mysqli_query($connect, $sql3);

			if($result3){
	          $success = "game created";
			  header("location: ../admin/admingamezone.php?success=".$success);
	        }else{
	        	$failed = "error creating game";
				header("location: ../admin/admingamezone.php?error=".$failed);
	        }
		}else{

	        $sql2 = "INSERT INTO game(question, option_a, option_b, option_c, option_d, answer, created_time, expires)VALUES('$question', '$option1', '$option2', '$option3', '$option4', '$answer', '$created_time', '$expires')";
	        $result2 = mysqli_query($connect, $sql2);

	        if($result2){
	          $success = "game created";
			  header("location: ../admin/admingamezone.php?success=".$success);
	        }else{
	        	$failed = "error creating game";
				header("location: ../admin/admingamezone.php?error=".$failed);
	        }
    	}

   }else{
      header("location: ../admin/dashboard.php?error=".join($error, urlencode('<br>')));
    }
  }

?>