<?php

include 'dbh.php';

$_SESSION['deleted'] = "no";
$_SESSION['deletedTask'] = "no";

if (mysqli_connect_errno()) {
    printf("Failed to connect to database: ", mysqli_connect_error());
    exit();

} else {

    if (isset($_POST['delete-project-btn']) && isset($_POST['delete-id'])) {
        
        $sqlUserProjects="DELETE FROM user_projects WHERE email ='". $_SESSION['email']. "' AND project_ID='". $_POST['delete-id']. "'"; 
        $userProjects= mysqli_query($mysqli, $sqlUserProjects);
     
        $sql = "DELETE FROM tasks WHERE project='" . $_POST['delete-id'] . "'";
        $res = mysqli_query($mysqli, $sql);

        $sql = "DELETE FROM projects WHERE project_ID='" . $_POST['delete-id'] . "'";
        $res = mysqli_query($mysqli, $sql);
        
        if ($res) {
            $_SESSION['deleted'] = "yes";

        }
    }

    if (isset($_POST['delete-task-btn']) && isset($_POST['delete-id'])) {

        $sql = "DELETE FROM tasks WHERE task_ID='" . $_POST['delete-id'] . "'";
        $res = mysqli_query($mysqli, $sql);

        if ($res) {
            $_SESSION['deletedTask'] = "yes";
        }
    }
}
mysqli_close($mysqli);
?>
