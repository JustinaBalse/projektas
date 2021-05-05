<?php

include 'dbh.php';

$_SESSION['editedTask'] = "no";

if (mysqli_connect_errno()) {
    printf("Failed to connect to database: ", mysqli_connect_error());
    exit();

} else {
    if (isset($_POST['submit-task-btn']) && isset($_POST['edit-task-id'])) {

        $row=mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT status FROM tasks WHERE task_ID=".$_POST['edit-task-id'].""));
        $_SESSION['beforeChange'] =$row['status'];

        $sql = "UPDATE tasks set title='" . htmlentities(trim($_POST['edit-task-title-input'])) . "', description='" . htmlentities($_POST['edit-task-description-area']) . "', update_date='" . date("Y-m-d") . "', status = '" . htmlentities($_POST['edit-status-select']) . "', priority = '" . htmlentities($_POST['edit-priority-select']) . "' where task_ID=" . $_POST['edit-task-id'];

        $res = mysqli_query($mysqli, $sql);

        if ($res) {
            $_SESSION['editedTask'] = "yes";
        }
    }
}
mysqli_close($mysqli);
