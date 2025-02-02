<!DOCTYPE html>

<?php
//Verification
session_start();
$_SESSION['added2']='';
$_SESSION['editedTask']='';
$_SESSION['addedUser']='';
$_SESSION['addedUsersArray']='';
$_SESSION['addedUserTask']='';
$_SESSION['addedUsersTask']='';
$_SESSION['addedUserEditTask']='';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--    <script src="js/validateEditForm.js"></script>-->
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

                    <div id="user" class="text-white d-flex username">
                        <div class="row">
                            <a href="#" class=" text-white " id="username"><?php echo $greetingName ?><i
                                        class="fas fa-user mt-2 ml-2"></i></a>
                        </div>
                    </div>
                </div>

                <div>
                    <form action="" method="POST">

                        <button type="submit" name="logout" id="logout-btn" class="btn"><h3><i
                                        class="fas fa-sign-out-alt text-white"></i></h3></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</header>


<!-- Add new project modal -->

<?php
include 'add-project.php';
 ?>

<div class='modal fade bd-add-project-lg' id='open-back-modal2' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Project was created!</p>
            <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>

            <?php echo "<form id='open-back-form' method='post' action='project.php?projectTitle=".$_SESSION['project-name']." &projectIndex=".$_SESSION['project-id']."'>"; ?>

                <div class='d-flex justify-content-center mt-4'>
                    <button class='btn bg-primary text-white m-1 mb-4' id='add-back-btn' data-dismiss='modal'">Back to project list</button>
                    <button class='btn bg-primary text-white m-1 mb-4' id='open-project-btn' name='open-project-btn' >Open project</button>
                </div>
            <?php
            if (!empty($_SESSION['not-registered-users'])) {

                echo "<p class='d-flex justify-content-center text-center mt-10'>These are not registered users and was not added to project.</p>";

                for ($i = 0; $i < count($_SESSION['not-registered-users']); $i++) {
                    echo "<p class='d-flex text-secondary justify-content-left mt-10'>" . $_SESSION['not-registered-users'][$i] . "</p>";
                }
            }

            unset ($_SESSION['not-registered-users']);
            ?>
            </form>
        </div>
    </div>
</div>

<script>
    $('#add-back-btn').click(function() {
      <?php if(isset($_GET['page']) && !isset($_GET['search'])){ ?>
      window.location.href ='index.php?page=<?php echo $_GET['page'] ?>';
      <?php }else{ ?>
        window.history.back();
        <?php } ?>
        return false;
    });
</script>

<?php
if($_SESSION['added'] == "yes"){
  include 'log-journal.php';
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

            <form id="add-project-form" method="post" action="index.php">

                <div class="form-group">
                    <label for="project-title-input">Enter Project Title</label>
                  <input type="text" class="form-control pl-3 text-left border" id="project-title-input" placeholder="" name="project-title-input" maxlength="70" pattern=".*\S.*\S.*\S.*" oninvalid="this.setCustomValidity('Invalid format')" oninput="this.setCustomValidity('')"  required>
                  <p class="h6 small text-secondary" style="color:grey; font-size: 12px; margin-top: 5px;">Title must include minimum 3 characters</p>
                </div>

                <div class="form-group">

                    <label for="description">Enter Project Description</label>
                    <textarea class="form-control pl-3 bg-light" id="comment-area" name="comment-area" maxlength="210"></textarea>
                </div>

                <div class="form-group participants-form">
                    <input type="hidden" name="add-project-hidden-email" id="add-project-hidden-email" value="<?php echo $_SESSION['login']; ?>"/>
                    <button name="add-project-participants" class="btn bg-success text-white"
                            type="button"><i class="fas fa-plus"></i> Add project participants</button>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn bg-success text-white m-1" id="submit-project-btn2" name="submit-project-btn2"><i class="fas fa-check"></i> Submit
                    </button>
                    <button class="btn bg-danger text-white m-1" id="close-modal-btn" name="close-modal-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit project modal -->
<?php

include 'edit.php';
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
                    <button class='btn bg-primary text-white m-1' id='back-btn' data-dismiss='modal'">Back to project list
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


<!-- Script from preventing resubmitting edit form, prevents pop up after page refresh.-->
<script>
    $('#back-btn').click(function() {
      <?php if(isset($_GET['page']) && !isset($_GET['search'])){ ?>
      window.location.href ='index.php?page=<?php echo $_GET['page'] ?>';
      <?php }else{ ?>
        window.history.back();
        <?php } ?>
        return false;
    });
</script>


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

//Main modal after pushing edit button on a table row

?>

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
                    <button name="add-project-participants-edit-modal" class="btn bg-success text-white"
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
      <?php if(isset($_GET['page']) && !isset($_GET['search'])){?>
        <?php
        include 'dbh.php';
        $sql="SELECT COUNT(*) AS howManyProjects FROM projects WHERE project_ID IN (SELECT project_ID FROM user_projects WHERE email='".$_SESSION['email']."') ";
       $result=mysqli_query($mysqli, $sql);
       $row=mysqli_fetch_assoc($result);
       if(($_GET['page']-1)*10==$row['howManyProjects']){
         ?>
        window.location.href ='index.php?page=<?php echo $_GET['page']-1 ?>';
        <?php }else{ ?>
          window.location.href ='index.php?page=<?php echo $_GET['page'] ?>';
          <?php } ?>
          <?php }else{ ?>
        window.history.back();
        <?php } ?>
        return false;
    });
</script>

<!--If data was deleted - opens modal-->

<?php
if ($_SESSION['deleted'] == "yes") {
  include 'log-journal.php';
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

$sqlAllProjects = "SELECT * FROM projects WHERE projects.project_ID IN (SELECT project_ID FROM user_projects WHERE email = '" . $_SESSION['login'] . "')";
$resultAllProjects = mysqli_query($mysqli, $sqlAllProjects);
$queryResultAllProjects = mysqli_num_rows($resultAllProjects);

$sqlCompletedProjects = "SELECT * FROM projects WHERE status='3' AND projects.project_ID IN (SELECT project_ID FROM user_projects WHERE email = '" . $_SESSION['login'] . "')";
$resultCompletedProjects = mysqli_query($mysqli, $sqlCompletedProjects);
$queryResultCompletedProjects = mysqli_num_rows($resultCompletedProjects);

$PendingProjects = $queryResultAllProjects - $queryResultCompletedProjects;

?>

<div class="container">
    <div class="project-info">
    <div class="row">

        <div class="col-xl-3  col-sm-12">
            <div class="card bg-pattern border rounded">
                <div class="card-body h-100 py-0">
                    <div class="logo-container">
                        <a href="index.php" title="Back to main page">
                        <img class="" id="proactLogo" src="images/proact-index-logo.png" alt="proact"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3  col-sm-12">
            <div class="card bg-pattern">
                <a href="?filter=TOTAL<?php if(isset($_GET['search'])) {echo '&search='.$_GET['search'];} ?>" title="Filter total projects" class="card-body border rounded underlineHover" id="totalProjectsTab">
                    <div class="float-right">
                        <i class="fas fa-archive text-primary"></i>
                    </div>
                    <h5 class="font-size-20 mt-0 pt-1"><?php echo $queryResultAllProjects ?></h5>
                    <p class="text-muted mb-0">Total Projects</p>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-12">
            <div class="card bg-pattern">
                <a href="?filter=DONE<?php if(isset($_GET['search'])) {echo '&search='.$_GET['search'];} ?>" title="Filter completed projects" class="card-body underlineHover border rounded " id="completedProjectsTab">
                    <div class="float-right">
                        <i class="fas fa-check text-primary"></i>
                    </div>
                    <h5 class="font-size-20 mt-0 pt-1"><?php echo $queryResultCompletedProjects ?></h5>
                    <p class="text-muted mb-0">Completed Projects</p>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-12">
            <div class="card bg-pattern">
                <a href="?filter=IN%20PROGRESS<?php if(isset($_GET['search'])) {echo '&search='.$_GET['search'];} ?>" title="Filter completed projects" class="card-body underlineHover border rounded " id="pendingProjectsTab">
                    <div class="float-right">
                        <i class="fa fa-file text-primary h4 ml-3"></i>
                    </div>
                    <h5 class="font-size-20 mt-0 pt-1"><?php echo $PendingProjects ?></h5>
                    <p class="text-muted mb-0">Pending Projects</p>
                </a>
            </div>
        </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Search Input -->
        <?php
    include_once 'search.php';
    include 'filter.php';

     ?>

    <div class="card table">
        <div class="card-body">
            <div class="project-table">

                <div class="project-list-top">
                     <form action="" method="GET">



                          <div class="table-top-buttons">

                            <div class="buttons">
                                <div>  <a href="exportCSV.php" id="export-csv-projects" class="btn bg-success text-white" type="submit" name="exportCSV" value="CSV export" style="background-color:#28a745"><i class='fas fa-file-download'></i></a> </div>


                                <div>  <button id="add-new-project-btn" type="button" class="btn bg-success text-white"
                                               data-toggle="modal" data-target="#add-project-modal"><i class="fas fa-plus"></i> Add project</button> </div>

                               <?php if($_SESSION['email']=='admin@admin.com'){ ?>
                                    <div> <a href="event-log.php" id="event-log-btn" type="button" class="btn bg-success text-white" style="background-color:#28a745"><i class="fas fa-history"></i></a></div>
                               <?php } ?>

                            </div>


                            <div class="form-group search">

                                <div class="input-group  ">

                                    <input name="search" id="project-search-input" type="text" value="<?php echo $searchKey; ?>"  class="form-control project-search-input rounded" placeholder="Search.. "
                                           aria-describedby="project-search-addon" required maxlength="70" pattern="\S(.*\S){2,70}" title="3 Chars minimum and no blank spaces" >

                                    <?php if (isset($_GET['filter'])) { ?>
                                        <input type="hidden" name="filter" value="<?php echo $_GET['filter']; ?>">
                                    <?php } ?>

                                    <div class="input-group-append  ">
                                        <button class="btn bg-primary text-white search-btn" type="submit" value="submit"  name="submit"
                                                id="project-search-addon" ><i
                                                    class="fa fa-search search-icon font-1"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>


                            <?php

              if((isset($_GET['search']))){
                  if (isset($_GET['filter'])) {
                      echo "<form action='' method='GET' id='project-search-form'> <div class='search-message-wrap d-flex justify-content-end'><p class=''>
             $message</p> <INPUT type='hidden' name='filter' value='".$_GET['filter']."'><button class=' reset text-black resetIcon' name='reset' type='submit'  ><i class='fas fa-times fa-xs'></i></button></div> </form>";

                  } else {


                      echo "<form action='' method='GET' id='project-search-form'> <div class='search-message-wrap  d-flex justify-content-end'><p class=''>
             $message</p> <button class='reset text-black resetIcon' name='reset' type='submit'  ><i class='fas fa-times fa-xs'></i></button></div> </form>";
                  }

                }



     ?>

                       <div>
                    </div>
                </div>


                     <div class="table-top ">

                        <p class="" id="rowID1" >#</p>
                        <p class="" id="project1">Projects</p>
                        <p class="" id="description1">Description</p>
                        <p class="text-center" id="status1">Status</p>
                        <p class="text-center" id="total1" >Tasks</p>
                        <p class="text-center" id="pending1">Pending</p>
                        <p class="text-right  action-header" id="actions1"><span>Actions</span></p>

                    </div>


                    <?php

                    $_POST['projectsNumber']=10;
                       include 'paginator.php';



                      if ($resultProjectTable->num_rows > 0) {
                        while ($rowProjectTable = $resultProjectTable->fetch_assoc()) {
                          if($rowProjectTable['row_number']<=$results_per_page*$page && $rowProjectTable['row_number']>$results_per_page*($page-1)){


//                          Sužinome projekto dalyvius. Ir siųsime į edit modalinį langą.

                              $sql ="SELECT email FROM user_projects WHERE project_ID='". $rowProjectTable["project_ID"] ."'";
                              $projectParticipants= mysqli_query($mysqli, $sql);
                              $participantsRows = mysqli_num_rows($projectParticipants);

                              $projectParticipantsArray = [];
                              while ($participantsRows= mysqli_fetch_assoc($projectParticipants)) {

                                  if ($_SESSION['login'] !== $participantsRows['email']) {
                                      $projectParticipantsArray[] = $participantsRows['email'];
                                  }
                              }

                            echo "

                        <div class='project-item'>
                       <div class='number-id'><p class='responsive-row-project'>Project number</p><b>". $rowProjectTable["row_number"] . "</b></div>

                       <div class='project-title'><p class='responsive-row-project'>Project:</p> <a id=  'project-" .($rowProjectTable["project_ID"] ) . "' href='project.php?projectTitle=" . htmlentities($rowProjectTable["project_name"]) . "&projectIndex=" . $rowProjectTable["project_ID"] . "' class='edit-row' data-project-name='" . $rowProjectTable["project_name"] . "'>" . htmlentities($rowProjectTable["project_name"]) . "</a></div>



                        <div class='description '> <p class='responsive-row-project'>Description:</p> " . htmlentities($rowProjectTable["description"]) . "</div>


                            <div class='status'><p class='text-black responsive-row-project'>Status</p> <span class='project'><i class='mdi mdi-checkbox-blank-circle mr-1 align-middle '></i><b>" . $rowProjectTable["status"] . "</b></span></div>

                        <div class=' tasks '><p class='responsive-row-project'>Total</p>" . $rowProjectTable["project_total"] . "</div>
                        <div class=' pending '><p class='responsive-row-project'>Pending</p>" . $rowProjectTable["pending_project"] . "</div>


                            <div class='action m-1 '>
                                <a href='exportCSVTasks.php?projectTitle=".htmlentities($rowProjectTable["project_name"])."&projectIndex=" . $rowProjectTable["project_ID"] . " ' id='export-csv-tasks' class='text-success mr-1' data-toggle='tooltip' data-placement='top' title='' data-original-title='Download' ><i class='fas fa-file-download'></i></a>
                                <a href='#' data-edit-button='" . $rowProjectTable["project_ID"] . "'
                                 data-edit-button-name='" . $rowProjectTable["project_name"] . "'
                                 data-edit-button-comment='" . $rowProjectTable["description"] . "'
                                 data-edit-button-project-participants='" . json_encode($projectParticipantsArray) . "'
                                 data-toggle='modal' data-target='.bd-edit-project-lg' class='text-primary mr-1 edit-row' data-toggle='tooltip' data-placement='top' title='' data-original-title='.bd-edit-project-lg'><i class='far fa-edit'></i></a>
                                <a href='#' class='text-danger delete-row' data-delete-button='" . $rowProjectTable["project_ID"] . "' data-target='.bd-delete-project-lg' data-toggle='modal' data-placement='top' title='' data-original-title='.bd-delete-project-lg'><i class='fas fa-trash'></i></a>
                            </div>
                         </div>



                   ";}
                        }
                    } else {
                        echo "<div class='m-2'>There was no results found!</div>";
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


                  <?php include 'page-logic.php'; ?>
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

<script src="js/addProjectParticipants.js"></script>
<script src="js/editProjectParticipants.js"></script>
<script src="js/scripts.js"></script>
<script src="js/emoji.js"></script>
<script src='js/spaces.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
<script src="js/borderedTabOnClick.js"></script>
</body>
</html>
