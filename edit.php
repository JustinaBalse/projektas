<?php

include 'dbh.php';

$_SESSION['edited'] = "no";

if (mysqli_connect_errno()) {
    printf("Failed to connect to database: ", mysqli_connect_error());
    exit();

} else {
    if (isset($_POST['submit-project-btn']) && isset($_POST['edit-id'])) {

//        Projekto dalyvių pridėjimas.

          if (isset($_POST['edit-project-hidden-email'])) {

              $addedUsersArray=array();

              $projectParticipants = $_POST['edit-project-hidden-email'];
              $projectParticipants = explode(',', $projectParticipants);

              $notRegisteredUsers = [];
              $addedProjectUsers = [];

              for ($i = 0; $i < count($projectParticipants); $i++) {

                  $projectParticipantsValidationSql ="SELECT email FROM users WHERE email='". $projectParticipants[$i] ."'";
                  $res= mysqli_fetch_assoc(mysqli_query($mysqli, $projectParticipantsValidationSql));

                  if (empty($res['email'])) {
                      $notRegisteredUsers[] = $projectParticipants[$i];

                  }elseif (!empty($res['email'])) {

                      $checkingProjectParticipantSql= "SELECT email FROM user_projects WHERE email='". $projectParticipants[$i] ."' AND project_ID='" . $_POST['edit-id'] . "'";
                      $resParticipant= mysqli_query($mysqli, $checkingProjectParticipantSql);

                      if ($resParticipant->num_rows == 0) {

                          $addedProjectUsers[] = $projectParticipants[$i];
                          $addingProjectParticipantSql = "INSERT INTO user_projects VALUES ('" . $projectParticipants[$i] . "', '" . $_POST['edit-id'] . "')";
                          $res = mysqli_query($mysqli, $addingProjectParticipantSql);
                          if($res){
                            $_SESSION['adddedUser']='yes';
                          }
                          if($i!=0){
                            $addedUsersArray[$i]=$projectParticipants[$i];
                          }
                      }
                  }
                  // Pridėtų vartotojų masyvas
                  $_SESSION['addedUsersArray']=$addedUsersArray;
              }

//              Neregistruotų vartotojų masyvas išsaugomas į SESSION.

              $_SESSION['not-registered-users'] = $notRegisteredUsers;
              $_SESSION['added-project-users'] = $addedProjectUsers;
          }

        $sql = "UPDATE projects set project_name='" . htmlentities(trim($_POST['edit-project-title-input'])) . "', description='" . htmlentities($_POST['edit-comment-area']) . "' where project_ID=" . $_POST['edit-id'];
        $res = mysqli_query($mysqli, $sql);

        if ($res) {
            $_SESSION['edited'] = "yes";
        }
    }
}
mysqli_close($mysqli);
?>
