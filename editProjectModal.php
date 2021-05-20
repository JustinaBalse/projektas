<?php
?>

<!--Notification of updated changes. Opens modal with button to return to project.php-->

<div class='modal fade bd-add-project-lg' id='open-back-modal' tabindex='-1' role='dialog'
     aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Project was edited!</p>
            <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>

            <form id='open-back-form' method='post' action='project.php'>

                <div class='d-flex justify-content-center mt-4'>
                    <button class='btn bg-primary text-white m-1' id='back-btn2' data-dismiss='modal'>Back to task list
                    </button>
                </div>

                <?php
                if (!empty($_SESSION['not-registered-users'])) {

                    echo "<p class='d-flex justify-content-center text-center px-5 my-4'>These are not registered users and was not added to project:</p>";

                    for ($i = 0; $i < count($_SESSION['not-registered-users']); $i++) {
                        echo "<p class='d-flex text-secondary justify-content-center my-2'>" . $_SESSION['not-registered-users'][$i] . "</p>";
                    }
                }


                if (!empty($_SESSION['added-project-users'])) {

                    echo "<p class='d-flex justify-content-center text-center my-4'>Users added to project:</p>";

                    for ($i = 0; $i < count($_SESSION['added-project-users']); $i++) {
                        echo "<p class='d-flex text-secondary justify-content-center my-2'>" . $_SESSION['added-project-users'][$i] . "</p>";
                    }
                }

                if (!empty($_SESSION['deleted-project-users'])) {

                    echo "<p class='d-flex justify-content-center text-center my-4'>Users removed from project:</p>";

                    for ($i = 0; $i < count($_SESSION['deleted-project-users']); $i++) {
                        echo "<p class='d-flex text-secondary justify-content-center my-2'>" . $_SESSION['deleted-project-users'][$i] . "</p>";
                    }
                }

                unset ($_SESSION['added-project-users']);
                unset ($_SESSION['not-registered-users']);
                unset ($_SESSION['deleted-project-users']);
                ?>
            </form>
        </div>
    </div>
</div>

<!--If data was edited - opens modal-->

<?php
if ($_SESSION['edited'] == "yes") {
    include 'log-journal.php';
    ?>
    <script>
        $(function () {
            $('#open-back-modal').modal('show');
        });
    </script>


    <?php

    $_SESSION['edited'] = "no";
}
?>

<!--Main modal after pushing edit button on a table row-->

<div class="modal fade bd-edit-project-lg" id="edit-project-modal" tabindex="-1" role="dialog"
     aria-labelledby="edit-project-modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content p-5">
            <form id="edit-project-form participants-form-edit-modal" method="post">
                <input type="hidden" id="edit-id" name="edit-id" value="">
                <div class="form-group">
                    <label for="project-title-input">Edit Project Title</label>
                    <input required type="text" class="form-control text-left pl-3 border" id="edit-project-title-input" name="edit-project-title-input" value="" maxlength="70" pattern=".*\S.*\S.*\S.*" oninvalid="this.setCustomValidity('Invalid format')" oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label for="description">Edit Project Description</label>
                    <textarea class="form-control pl-3 bg-light" id="edit-comment-area" name="edit-comment-area" maxlength="210"></textarea>
                </div>

                <div class="form-group participants-form-edit-modal">
                    <input type="hidden" name="edit-project-hidden-email" id="edit-project-hidden-email" value="<?php echo $_SESSION['login']; ?>"/>
                    <input type="hidden" name="edit-project-hidden-project-participants" id="edit-project-hidden-project-participants" value=""/>
                    <input type="hidden" name="edit-project-hidden-deleted-participants" id="edit-project-hidden-deleted-participants" value=""/>
                    <button name="add-project-participants-edit-modal" id="add-project-participants-edit-modal" class="btn bg-success text-white"
                            type="button">Edit project participants</button>
                </div>


                <div class="d-flex justify-content-center mt-5">
                    <input type="hidden" name="edit-project-hidden" value="false"/>
                    <button class="btn bg-success text-white m-1" value="yes" id="submit-project-btn" name="submit-project-btn"><i class="fas fa-check"></i> Submit</button>
                    <button class="btn bg-danger text-white m-1" id="close-edit-modal-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
