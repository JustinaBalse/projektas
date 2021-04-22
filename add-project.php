<?php
  include 'dbh.php';

$_SESSION['added'] = "no";

  if (mysqli_connect_errno()) {
      printf("Failed to connect to database: ", mysqli_connect_error());
      exit();


  } else {

      if(isset($_POST['submit-project-btn'])){

        $sql = "INSERT INTO projects (project_name, status, description) VALUES ('".$_POST['project-title-input']."', '1', '".$_POST['comment-area']."')";
        $res = mysqli_query($mysqli, $sql);

        if($res){
          $_SESSION['added']='yes';
        }

      }

  }

  mysqli_close($mysqli);

?>
