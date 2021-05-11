<?php

      include 'dbh.php';
      
      
      if ($mysqli->connect_error) {
        die("Connection failed:" . $mysqli->connect_error);
      }
      
      if(($_SESSION['added']=='yes') && isset($_SESSION['project-name'] ) ){

        $sqlUserProjects="INSERT INTO user_projects VALUES ('".$_SESSION['email']."', '".$_SESSION['project-id']."')"; 
        $userProjects= mysqli_query($mysqli, $sqlUserProjects);

  }
  
    if($_SESSION['added2']=='yes'){

         $sqlUserProjects="INSERT INTO user_projects VALUES ('".$_SESSION['email']."', '".$_GET['projectIndex']."')"; 
         $userProjects= mysqli_query($mysqli, $sqlUserProjects);

  }
  
// DELETE



      
      
