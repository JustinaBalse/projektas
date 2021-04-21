<?php
$host = "localhost";
$user = "root";
$userPassword = "";
$dbName = "proact";

$mysqli = mysqli_connect($host, $user, $userPassword, $dbName);

if (mysqli_connect_errno()) {
    printf("Failed to connect to database: ", mysqli_connect_error());
    exit();


} else {

    if (isset($_POST['submit-project-btn']) && isset($_POST['edit-id'])) {

        $sql = "UPDATE projects set project_name='" . $_POST['edit-project-title-input'] . "', description='" . $_POST['edit-comment-area'] . "' where project_ID=" . $_POST['edit-id'];
        $res = mysqli_query($mysqli, $sql);


        echo "<div class='modal fade bd-add-project-lg' id='open-back-modal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
            <div class='modal-dialog modal-md'>
                <div class='modal-content p-5'>
                    <p class='d-flex justify-content-center mt-10'>Project was edited!</p>
                    <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>

                    <form id='open-back-form' method='post' action='templates/project.html'>

                        <div class='d-flex justify-content-center mt-4'>
                            <button class='btn bg-primary text-white m-1' id='back-btn' data-dismiss='modal'>Back to the list</button>
                            <button class='btn bg-primary text-white m-1' id='open-project-btn' name='open-project-btn'>Open project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>";

    }

}

mysqli_close($mysqli);


?>
