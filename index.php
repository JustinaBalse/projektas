<!DOCTYPE html>

<?php

//Verification
session_start();

if (empty($_SESSION['login'])) {
    header('Location: login.php');
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>ProAct</title>
    <meta name="description" content="a">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--    <script src="js/validateEditForm.js"></script>-->
    <script src="js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="js/setUpdatableProjectId.js"></script>

</head>
<body>

<?php
$greetingName = "";

if (empty($_SESSION['name'])) {
    $greetingName = $_SESSION['login'];
} else {
    $greetingName = $_SESSION['name'];
}
?>

<!--Page top-->
<header class="bg-primary mb-4">
    <div class="container">
        <div class="navigation pt-1">
            <div class="row justify-content-between">


                <div class="col-1 col-sm-3">

                    <div id="user" class="text-white d-flex text-center username">
                        <div class="row">
                            <a href="#" class=" text-white " id="username"><?php echo $greetingName ?><i
                                        class="fas fa-user mt-2 ml-2"></i></a>
                        </div>
                    </div>
                </div>

                <div>
                    <form action="" method="POST">
                        <button type="submit" name="logout" id="logout-btn" class="btn mr-4"><h3><i
                                        class="fas fa-sign-out-alt text-white"></i></h3></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</header>


<!-- Add new project modal -->

<?php
include_once 'add-project.php';
 ?>

<div class='modal fade bd-add-project-lg' id='open-back-modal2' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Project was created!</p>
            <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>

            <?php echo "<form id='open-back-form' method='post' action='project.php?projectTitle=".$_SESSION['project-name']." &projectIndex=".$_SESSION['project-id']."'>"; ?>

                <div class='d-flex justify-content-center mt-4'>
                    <button class='btn bg-primary text-white m-1' id='add-back-btn' data-dismiss='modal'>Back to the list</button>
                    <button class='btn bg-primary text-white m-1' id='open-project-btn' name='open-project-btn' >Open project</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#add-back-btn').click(function() {
        window.location.href ='index.php';
        return false;
    });
</script>

<?php
if($_SESSION['added'] == "yes"){
    ?>

    <script>
        $(function(){
            $('#open-back-modal2').modal('show');
        });
    </script>
    <?php

    $_SESSION['added'] = "no";
}
?>

<div class="modal fade bd-add-project-lg" id="add-project-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content p-5">

            <form id="add-project-form" method="post">

                <div class="form-group">
                    <label for="project-title-input">Enter Project Title</label>
                  <input type="text" class="form-control border" id="project-title-input" placeholder="" name="project-title-input" maxlength="70" pattern=".*\S.*\S.*\S.*" oninvalid="this.setCustomValidity('Invalid format')" oninput="this.setCustomValidity('')"  required>
                  <p style="color:grey; font-size: 12px; ">Title must include minimum 3 characters</p>
                </div>

                <div class="form-group">

                    <label for="description">Enter Project Description</label>
                    <textarea class="form-control bg-light" id="comment-area" name="comment-area" maxlength="210"></textarea>
                </div>


                <div class="d-flex justify-content-center mt-5">
                    <button class="btn bg-success text-white m-1" id="submit-project-btn2" name="submit-project-btn2"><i class="fas fa-check"></i> Submit
                    </button>
                    <button class="btn bg-danger text-white m-1" id="close-modal-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit project modal -->
<?php

include_once 'edit.php';
?>


<!--Notification of updated changes. Opens modal with button to return to index.php-->

<div class='modal fade bd-add-project-lg' id='open-back-modal' tabindex='-1' role='dialog'
     aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Project was edited!</p>
            <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>

            <form id='open-back-form' method='post' action='project.php'>

                <div class='d-flex justify-content-center mt-4'>
                    <button class='btn bg-primary text-white m-1' id='back-btn' data-dismiss='modal'>Back to project list
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Script from preventing resubmitting edit form, prevents pop up after page refresh.-->
<script>
    $('#back-btn').click(function() {
        window.location.href = 'index.php';
        return false;
    });
</script>


<!--If data was edited - opens modal-->

<?php
if ($_SESSION['edited'] == "yes") {
    ?>

    <script>
        $(function (e) {
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
            <form id="edit-project-form" method="post">
                <input type="hidden" id="edit-id" name="edit-id" value="">
                <div class="form-group">
                    <label for="project-title-input">Edit Project Title</label>
                    <input required type="text" class="form-control border" id="edit-project-title-input" name="edit-project-title-input" value="" maxlength="70" pattern=".*\S.*\S.*\S.*" oninvalid="this.setCustomValidity('Invalid format')" oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label for="description">Edit Project Description</label>
                    <textarea class="form-control bg-light" id="edit-comment-area" name="edit-comment-area" maxlength="210"></textarea>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <input type="hidden" name="edit-project-hidden" value="false"/>
                    <button class="btn bg-success text-white m-1" value="yes" id="submit-project-btn" name="submit-project-btn"><i class="fas fa-check"></i>Submit</button>
                    <button class="btn bg-danger text-white m-1" id="close-modal-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Project delete modal-->

<div class='modal fade bd-delete-project-lg' id='open-back-modal3' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Delete project?</p>
            <i class='fas fa-question fa-5x text-primary d-flex justify-content-center'></i>
            <form id='open-back-form' method='post' action=''>
                <input type="hidden" id="delete-id" name="delete-id" value="">
                <div class='d-flex justify-content-center mt-4'>
                    <button class="btn bg-success text-white m-1" value="yes" id="delete-yes-btn" name="delete-project-btn"><i class="fas fa-check"></i> Delete</button>
                    <button class="btn bg-danger text-white m-1" id="delete-no-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'delete.php';
?>

<div class='modal fade bd-delete-project-lg' id='deleted-modal' tabindex='-1' role='dialog'
     aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Project was deleted!</p>
            <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>
            <form id='open-back-form' method='post' action='index.php'>
                <div class='d-flex justify-content-center mt-4'>
                    <button class='btn bg-primary text-white m-1' id='deleted-back-btn' data-dismiss='modal'>Back to project list
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#deleted-back-btn').click(function() {
        window.location.href = 'index.php';
        return false;
    });
</script>

<!--If data was deleted - opens modal-->

<?php
if ($_SESSION['deleted'] == "yes") {
    ?>
    <script>
        $(function () {
            $('#deleted-modal').modal('show');
        });
    </script>

    <?php
    $_SESSION['deleted'] = "no";
}
?>

<!--PROJECT INFO-->

<?php
include 'dbh.php';

$sqlAllProjects = "SELECT * FROM projects";
$resultAllProjects = mysqli_query($mysqli, $sqlAllProjects);
$queryResultAllProjects = mysqli_num_rows($resultAllProjects);

$sqlCompletedProjects = "SELECT * FROM projects WHERE status='3' ";
$resultCompletedProjects = mysqli_query($mysqli, $sqlCompletedProjects);
$queryResultCompletedProjects = mysqli_num_rows($resultCompletedProjects);

$PendingProjects = $queryResultAllProjects - $queryResultCompletedProjects;

?>

<div class="container">
    <div class="row">

        <div class="col-xl-4 col-md-6">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="float-right">
                        <i class="fas fa-archive text-primary"></i>
                    </div>
                    <h5 class="font-size-20 mt-0 pt-1"><?php echo $queryResultAllProjects ?></h5>
                    <p class="text-muted mb-0">Total Projects</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="float-right">
                        <i class="fas fa-check text-primary"></i>
                    </div>
                    <h5 class="font-size-20 mt-0 pt-1"><?php echo $queryResultCompletedProjects ?></h5>
                    <p class="text-muted mb-0">Completed Projects</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-pattern">
                <div class="card-body">
                    <div class="float-right">
                        <i class="fa fa-file text-primary h4 ml-3"></i>
                    </div>
                    <h5 class="font-size-20 mt-0 pt-1"><?php echo $PendingProjects ?></h5>
                    <p class="text-muted mb-0">Pending Projects</p>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

    <!-- Search Input -->
        <?php
    include_once 'search.php';

 
    if((isset($_GET['search'])) && (!strlen(trim($_GET['search'])) <=3) && (!empty($_GET['search']))){
      
    echo "<form action='' method='GET' id='project-table-form'> <div class='search-message-wrap  d-flex justify-content-end'><p class='mr-2'>
     $message</p> <button class='btn bg-primary text-white' name='reset' type='submit' value='submit' >Reset</button></div> </form>";
    }
                        
     ?> 

    <div class="card">
        <div class="card-body">
            <div class="table-responsive project-list">
                <div>
                     <form action="" method="GET">



                          <div class="d-flex justify-content-between"style="display: inline-flex">

                            <div>
                                <a href="exportCSV.php" id="export-csv-projects" class="btn bg-success text-white" type="submit" name="exportCSV" value="CSV export"><i class='fas fa-file-download'></i></a>
                              

                                <button id="add-new-project-btn" type="button" class="btn bg-success text-white"
                                        data-toggle="modal" data-target="#add-project-modal"><i class="fas fa-plus"></i> Add project</button>
                            </div>


                            <div class="form-group">

                                <div class="input-group  ">
                                    
                                    <input name="search" id="project-search-input" type="text"  class="form-control project-search-input rounded" placeholder="Search.. "
                                           aria-describedby="project-search-addon" required maxlength="70" pattern="\S(.*\S){2,70}" title="3 Chars minimum and no blank spaces" value=<?php echo @$_GET['search']; ?> >

                                    <div class="input-group-append  ">
                                        <button class="btn bg-primary text-white search-btn" type="submit" value="submit"  name="submit"
                                                id="project-search-addon" ><i
                                                    class="fa fa-search search-icon font-1"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div >


                    </div>

                </div>




                <table class="table project-table table-centered table-nowrap">


                    <thead>

                    </thead>
                    <thead>
                    <tr class="text-center">
                        <th class="align-middle" scope="col">#</th>
                        <th class="align-middle" id="title1" scope="col">Projects</th>
                        <th class="align-middle" id="description1" scope="col">Description</th>
                        <th class="align-middle" id="status1" scope="col">Status</th>
                        <th class="align-middle" id="total1" scope="col">Total tasks</th>
                        <th class="align-middle" id="pending1" scope="col">Tasks pending</th>
                        <th class="align-middle" id="actions1" scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                   

                    if ($resultProjectTable->num_rows > 0) {
                        while ($rowProjectTable = $resultProjectTable->fetch_assoc()) {
                            echo " <tr class='text-center'>
                        <th class='align-middle' scope='row'>" . $rowProjectTable["row_number"] . "</th>
                        <td class='text-left align-middle'><a href='project.php?projectTitle=" . htmlentities($rowProjectTable["project_name"]) . "&projectIndex=" . $rowProjectTable["project_ID"] . " ' class='edit-row' data-project-name='" . $rowProjectTable["project_name"] . "'>" . htmlentities($rowProjectTable["project_name"]) . "</a></td>
                        <td class='text-left align-middle w-10'>" . htmlentities($rowProjectTable["description"]) . "</td>

                        <td class='align-middle'>
                            <span class='font-12 project'><i class='mdi mdi-checkbox-blank-circle mr-1 align-middle'></i><b>" . $rowProjectTable["status"] . "</b></span>
                        </td>
                        <td class='align-middle'>" . $rowProjectTable["project_total"] . "</td>
                        <td class='align-middle'>" . $rowProjectTable["pending_project"] . "</td>
                        <td class= 'align-middle'>
                            <div class='action m-1'>
                                <a href='exportCSVTasks.php?projectTitle=" . htmlentities($rowProjectTable["project_name"]) . "&projectIndex=" . $rowProjectTable["project_ID"] . " ' id='export-csv-tasks' class='text-success mr-1' data-toggle='tooltip' data-placement='top' title='' data-original-title='Download' ><i class='fas fa-file-download'></i></a>
                                <a href='#' data-edit-button='" . $rowProjectTable["project_ID"] . "'
                                 data-edit-button-name='" . $rowProjectTable["project_name"] . "'
                                 data-edit-button-comment='" . $rowProjectTable["description"] . "'
                                 data-toggle='modal' data-target='.bd-edit-project-lg' class='text-success mr-1 edit-row' data-toggle='tooltip' data-placement='top' title='' data-original-title='.bd-edit-project-lg'><i class='far fa-edit text-primary'></i></a>
                                <a href='#' class='text-danger delete-row' data-delete-button='" . $rowProjectTable["project_ID"] . "' data-target='.bd-delete-project-lg' data-toggle='modal' data-placement='top' title='' data-original-title='.bd-delete-project-lg'><i class='fas fa-trash'></i></a>
                            </div>
                        </td>
                    </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>There was no results found!</td></tr>";
                    }
                    
                    mysqli_close($mysqli);
                    ?>  
                     <script type="text/javascript">                      

                    var projects = document.getElementsByClassName('project')

                    for (let i = 0; i < projects.length; i++) {
                            var project = projects[i];

                      var status = project.querySelector('b').innerHTML

                      if (status === "TO DO") {
                            project.style.color="#c02c2c";
                      }

                      if (status === "IN PROGRESS") {
                            project.style.color="#0275d8";
                      }

                      if (status === "DONE") { 
                            project.style.color="#3ea556";
                      }
                    }   
                        </script>
                    </tbody>
                </table>
            </div>
            <!-- end project-list -->

            <!--LIMIT AMOUNT OF PROJECT LINES ON ONE PAGE-->

            <!--            <div class="pt-3">-->
            <!--                <ul class="pagination justify-content-end mb-0">-->
            <!--                    <li class="page-item disabled">-->
            <!--                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>-->
            <!--                    </li>-->
            <!--                    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
            <!--                    <li class="page-item active"><a class="page-link" href="#">2</a></li>-->
            <!--                    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
            <!--                    <li class="page-item">-->
            <!--                        <a class="page-link" href="#">Next</a>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </div>-->
        </div>
    </div>
</div>

<!-- end row -->
</div>


<script src="js/scripts.js"></script>
<script src="js/emoji.js"></script>
<script src='js/spaces.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="js/setUpdatableProjectId.js"></script>
<script src="js/setDeletableId.js"></script>
</body>
</html>
