<?php

include 'dbh.php';

$_SESSION['edited'] = "no";

if (mysqli_connect_errno()) {
    printf("Failed to connect to database: ", mysqli_connect_error());
    exit();

} else {
    if (isset($_POST['submit-project-btn']) && isset($_POST['edit-id'])) {
        $sql = "UPDATE projects set project_name='" . htmlentities($_POST['edit-project-title-input']) . "', description='" . htmlentities($_POST['edit-comment-area']) . "' where project_ID=" . $_POST['edit-id'];
        $res = mysqli_query($mysqli, $sql);

        if ($res) {
            $_SESSION['edited'] = "yes";
        }
    }
}
mysqli_close($mysqli);
?>
