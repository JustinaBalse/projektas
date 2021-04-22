<?php

include 'dbh.php';

$_SESSION['edited'] = "no";

if (mysqli_connect_errno()) {
    printf("Failed to connect to database: ", mysqli_connect_error());
    exit();


} else {

    if (isset($_POST['submit-project-btn']) && isset($_POST['edit-id'])) {

        $sql = "UPDATE projects set project_name='" . $_POST['edit-project-title-input'] . "', description='" . $_POST['edit-comment-area'] . "' where project_ID=" . $_POST['edit-id'];
        $res = mysqli_query($mysqli, $sql);

        if($res){
            $_SESSION['edited'] = "yes";
        }
    }

}

if ($_SESSION['edited'] == "yes") {

    echo "<div class='modal fade bd-add-project-lg' id='open-back-modal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>";
            echo "<div class='modal-dialog modal-md'>";
                echo "<div class='modal-content p-5'>";
                    echo "<p class='d-flex justify-content-center mt-10'>Project was edited!</p>";
                    echo "<i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>";

                    echo "<form id='open-back-form' method='post' action='templates/project.html'>";

                        echo "<div class='d-flex justify-content-center mt-4'>";
                            echo "<button class='btn bg-primary text-white m-1' id='back-btn' data-dismiss='modal'>Back to the list</button>";
                            echo "<button class='btn bg-primary text-white m-1' id='open-project-btn' name='open-project-btn'>Open project</button>";
                        echo "</div>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
        echo "</div>";

    $_SESSION['edited'] = "no";
}

mysqli_close($mysqli);


if (isset($_POST['open-project-btn'])) {
    header('Location: templates/project.html');
}

?>
