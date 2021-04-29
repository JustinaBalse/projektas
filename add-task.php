<?php
  include 'dbh.php';

$_SESSION['added2'] = "no";

  if (mysqli_connect_errno()) {
      printf("Failed to connect to database: ", mysqli_connect_error());
      exit();

  } else {

      if(isset($_POST['submit-task-btn2'])){

        $sql = "INSERT INTO tasks (title, description, priority, project, status, start_date, executant) VALUES (RTRIM('".$_POST['task-title-input']."'), RTRIM('".$_POST['comment-area']."'), '".$_POST['priority-selection']."', '".$_GET['projectIndex']."', '".$_POST['status-selection']."', now(), '".$_SESSION['email']."')";
        $res = mysqli_query($mysqli, $sql);

        if($res){
          $_SESSION['added2']='yes';
        }
      }
  }

  mysqli_close($mysqli);

?>
