<?php

include 'dbh.php';

if (mysqli_connect_errno()) {
    printf("Failed to connect to database: ", mysqli_connect_error());
    exit();

} else {
date_default_timezone_set('Europe/Vilnius');

  if($_SESSION['added']=='yes'){

    $sql = "INSERT INTO log_journal (project, user, event_time, event) VALUES ('".$_SESSION['project-id']."', '".$_SESSION['email']."', '".date('Y-m-d H:i:s')."', 'Project was added')";
    $res = mysqli_query($mysqli, $sql);

  }

  if($_SESSION['edited']=='yes'){

    $sql = "INSERT INTO log_journal (project, user, event_time, event) VALUES ('".$_POST['edit-id']."', '".$_SESSION['email']."', '".date('Y-m-d H:i:s')."', 'Project was edited')";
    $res = mysqli_query($mysqli, $sql);

  }

  if($_SESSION['added2']=='yes'){

    $sql = "INSERT INTO log_journal (project, task, user, event_time, event) VALUES ('".$_GET['projectIndex']."', '".$_SESSION['task-id']."', '".$_SESSION['email']."', '".date('Y-m-d H:i:s')."', 'Task was added')";
    $res = mysqli_query($mysqli, $sql);

  }

  if($_SESSION['editedTask']=='yes'){
    $afterChange=$_POST['edit-status-select'];
    $beforeChange=$_SESSION['beforeChange'];
    if($beforeChange!=$afterChange){

      $row=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT status FROM statuses WHERE status_ID=".$afterChange.""));
      $status =$row['status'];

      $sql = "INSERT INTO log_journal (project, task, user, event_time, event) VALUES ('".$_GET['projectIndex']."', '".$_POST['edit-task-id']."', '".$_SESSION['email']."', '".date('Y-m-d H:i:s')."', 'Task was edited: status was changed to ".$status."')";
      $res = mysqli_query($mysqli, $sql);
    } else{
      $sql = "INSERT INTO log_journal (project, task, user, event_time, event) VALUES ('".$_GET['projectIndex']."', '".$_POST['edit-task-id']."', '".$_SESSION['email']."', '".date('Y-m-d H:i:s')."', 'Task was edited')";
      $res = mysqli_query($mysqli, $sql);
    }
  }

  if($_SESSION['deleted']=='yes'){

    $sql = "INSERT INTO log_journal (project, user, event_time, event) VALUES ('".$_POST['delete-id']."', '".$_SESSION['email']."','".date('Y-m-d H:i:s')."', 'Project was deleted')";
    $res = mysqli_query($mysqli, $sql);

  }

  if($_SESSION['deletedTask']=='yes'){

    $sql = "INSERT INTO log_journal (project, task, user, event_time, event) VALUES ('".$_GET['projectIndex']."', '".$_POST['delete-id']."', '".$_SESSION['email']."', '".date('Y-m-d H:i:s')."', 'Task was deleted')";
    $res = mysqli_query($mysqli, $sql);

  }

}

mysqli_close($mysqli);

 ?>
