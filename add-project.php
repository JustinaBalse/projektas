<?php
  include 'dbh.php';

$_SESSION['added'] = "no";

  if (mysqli_connect_errno()) {
      printf("Failed to connect to database: ", mysqli_connect_error());
      exit();


  } else {

      if(isset($_POST['submit-project-btn2'])){

//          Projekto dalyvių pridėjimas.

          if (isset($_POST['add-project-hidden-email'])) {
              $projectParticipants = $_POST['add-project-hidden-email'];
              $projectParticipants = explode(',', $projectParticipants);

              $notRegisteredUsers = [];

              for ($i = 0; $i < count($projectParticipants); $i++) {

                  $projectParticipantsValidationSql ="SELECT email FROM users WHERE email='". $projectParticipants[$i] ."'";
                  $res= mysqli_fetch_assoc(mysqli_query($mysqli, $projectParticipantsValidationSql));

                  if (empty($res['email'])) {
                      $notRegisteredUsers[] = $projectParticipants[$i];
                  }else {
                      $addingProjectParticipantSql="INSERT INTO user_projects VALUES ('". $projectParticipants[$i]. "', '". $_SESSION['project-id']. "')";
                      $res= mysqli_query($mysqli, $addingProjectParticipantSql);
                  }
              }

//              Neregistruotų vartotojų masyvas išsaugomas į SESSION.

              $_SESSION['not-registered-users'] = $notRegisteredUsers;
          }

        $sql = "INSERT INTO projects (project_name, status, description) VALUES (RTRIM('".$_POST['project-title-input']."'), '2', RTRIM('".$_POST['comment-area']."'))";
        $res = mysqli_query($mysqli, $sql);
        
      
        if($res){
          $_SESSION['added']='yes';
        }

        $row=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT project_ID FROM projects ORDER BY project_ID DESC LIMIT 1"));
        $_SESSION['project-id'] =$row['project_ID'] ;
        $row=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT project_name FROM projects ORDER BY project_ID DESC LIMIT 1"));
        $_SESSION['project-name'] =$row['project_name'] ;
      
//       $sqlUserProjects="INSERT INTO user_projects VALUES ('". $_SESSION['email']. "', '". $_SESSION['project-id']. "')";
//       $userProjects= mysqli_query($mysqli, $sqlUserProjects);
      }

  }
  mysqli_close($mysqli);

?>
