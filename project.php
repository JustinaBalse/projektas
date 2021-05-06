<!DOCTYPE html>
<?php
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

  <title>Tasks Management</title>
  <meta name="description" content="a">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/utilities.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/setUpdatableTaskId.js?n=1"></script>
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



<!--Add Task Modal-->

<?php
include_once 'add-task.php';
 ?>

<div class='modal fade bd-add-project-lg' id='open-back-modal2' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Task was created!</p>
            <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>

            <form id='open-back-form' method='post'>

                <div class='d-flex justify-content-center mt-4'>
                    <button class='btn bg-primary text-white m-1' id='add-back-btn' data-dismiss='modal'>Back to the list</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
if($_SESSION['added2'] == "yes"){
    ?>

    <script>
        $(function(){
            $('#open-back-modal2').modal('show');
        });
    </script>
    <?php

    $_SESSION['added2'] = "no";

}
?>


<div class="modal fade bd-add-task-lg" id="add-task-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content p-5">

          <form id="add-task-form" method="post">

                   <div class="form-group">
                   <label for="task-title-input">Enter Task Title</label>
                   <input type="text" class="form-control border" id="task-title-input" name="task-title-input" placeholder="" required maxlength="70"  pattern=".*\S.*\S.*\S.*" oninvalid="this.setCustomValidity('Invalid format')" oninput="this.setCustomValidity('')">
                    <p style="color:grey; font-size: 12px; ">Title must include minimum 3 characters</p>
                   </div>

                    <div class="form-group">
                        <label for="description">Enter Task Description</label>
                        <textarea class="form-control bg-light" id="task-description" name="comment-area" maxlength="210"></textarea>
                    </div>

                    <div class="mt-4">
                        <label for="priority-selection">Select Priority</label>
                            <select id="priority-selection" name="priority-selection" class="form-select rounded border" aria-label="Default select example">

                            <option selected value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>

                        </select>

                        <label for="status-selection">Select Status</label>
                         <select id="status-selection" name="status-selection" class="form-select rounded border" aria-label="Default select example">
                            <option selected value="1">To Do</option>
                            <option value="2">In Progress</option>
                            <option value="3">Done</option>
                        </select>
                     </div>

          <div class="d-flex justify-content-center mt-5">
            <button class="btn bg-success text-white m-1" id="submit-task-btn2" name="submit-task-btn2"><i class="fas fa-check"></i> Submit</button>
            <button class="btn bg-danger text-white m-1" id="close-modal-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
          </div>

         </form>

      </div>
    </div>
  </div>



  <!--Edit Project Modal-->

<?php
 include_once 'editTask.php';
?>

<!--Notification of updated changes. Opens modal with button to return to project.php-->

<div class='modal fade bd-add-project-lg' id='open-back-modal3' tabindex='-1' role='dialog'
     aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Task was edited!</p>
            <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>

            <form id='open-back-form' method='post' action='
            <?php
//            Nustatomas puslapis į kurį bus keliamasi po mygtuko atgal paspaudimo.
//            TO-DO Jei redagavimas buvo atliktas statusų lentoje turi nuvesti į statusų lentelę.

            if ($_SESSION['statusTableEdit'] == "yes") {
                echo "project.php#stat-1";
            }else {
                echo "project.php";
            }
            ?>'>

                <div class='d-flex justify-content-center mt-4'>
                    <button class='btn bg-primary text-white m-1' id='back-btn' data-dismiss='modal'>Back to task list
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script from preventing resubmitting edit form, prevents pop up after page refresh.-->

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!--If data was edited - opens modal-->

<?php
if ($_SESSION['editedTask'] == "yes") {
    ?>

    <script>
        $(function () {
            $('#open-back-modal3').modal('show');
        });
    </script>


    <?php

    $_SESSION['editedTask'] = "no";
}
?>

<!-- Main modal after pushing edit task button on a row -->

<div class="modal fade bd-edit-task-lg" id="edit-task-modal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content p-5">

            <form id="edit-task-form" method="post">
                <input type="hidden" id="edit-task-id" name="edit-task-id" value="">

                <div class="form-group">
                    <label for="task-title-input">Edit Task Title</label>
                    <input required type="text" class="form-control border" id="edit-task-title-input" name="edit-task-title-input"
                           value="" maxlength="70" pattern=".*\S.*\S.*\S.*" oninvalid="this.setCustomValidity('Invalid format')" oninput="this.setCustomValidity('')">
                    <p style="color:grey; font-size: 12px; ">Title must include minimum 3 characters</p>
                </div>


                <div class="form-group">
                    <label for="description">Edit Task Description</label>
                    <textarea class="form-control bg-light" id="edit-task-description-area" name="edit-task-description-area" maxlength="210"></textarea>
                </div>


                <div class="mt-5">
                    <label for="priority-select">Select Priority</label>
                    <select id="edit-priority-select" name="edit-priority-select" class="form-select rounded border">

                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>

                    </select>

                    <label for="priority-select">Select Status</label>
                    <select id="edit-status-select" name="edit-status-select" class="form-select rounded border" aria-label="Default select example">
                        <option value="1">To Do</option>
                        <option value="2">In Progress</option>
                        <option value="3">Done</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center mt-4">

                    <input type="hidden" name="status-table-item-click" id="status-table-item-click" value="false"/>
                    <button class="btn bg-success text-white m-1" value="yes" id="submit-task-btn" name="submit-task-btn"><i class="fas fa-check"></i>Submit
                    </button>
                    <button class="btn bg-danger text-white m-1" id="close-modal-btn" data-dismiss="modal"><i
                                class="fas fa-times"></i> Cancel
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<!--Modal to delete task-->
<div class='modal fade bd-delete-task-lg' id='open-back-modal3' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Delete task?</p>
            <i class='fas fa-question fa-5x text-primary d-flex justify-content-center'></i>
            <form id='open-back-form' method='post' action=''>
                <input type="hidden" id="delete-id" name="delete-id" value="">
                <div class='d-flex justify-content-center mt-4'>
                    <button class="btn bg-success text-white m-1" value="yes" id="delete-yes-btn" name="delete-task-btn"><i class="fas fa-check"></i> Delete</button>
                    <button class="btn bg-danger text-white m-1" id="delete-no-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'delete.php';
?>
<div class='modal fade bd-delete-task-lg' id='deleted-modal' tabindex='-1' role='dialog'
     aria-labelledby='myLargeModalLabel' aria-hidden='true' data-keyboard='false' data-backdrop='static'>
    <div class='modal-dialog modal-md'>
        <div class='modal-content p-5'>
            <p class='d-flex justify-content-center mt-10'>Task was deleted!</p>
            <i class='fas fa-check fa-5x text-success d-flex justify-content-center'></i>
            <form id='open-back-form' method='post' action=''>
                <div class='d-flex justify-content-center mt-4'>
                    <button class='btn bg-primary text-white m-1' id='deleted-back-btn' data-dismiss='modal'>Back to task list
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--If data was deleted - opens modal-->
<?php
if ($_SESSION['deletedTask'] == "yes") {
    ?>
    <script>
        $(function () {
            $('#deleted-modal').modal('show');
        });
    </script>
    <?php
    $_SESSION['deletedTask'] = "no";
}
?>

<?php
include 'dbh.php';

$sqlAllTasks = "SELECT * FROM tasks WHERE project='" . $_GET['projectIndex'] . "'";
$resultAllTasks = mysqli_query($mysqli, $sqlAllTasks);
$queryResultAllTasks = mysqli_num_rows($resultAllTasks);

$sqlCompletedTasks = "SELECT * FROM tasks WHERE project='" . $_GET['projectIndex'] . "' AND status='3' ";
$resultCompletedTasks = mysqli_query($mysqli, $sqlCompletedTasks);
$queryResultCompletedTasks = mysqli_num_rows($resultCompletedTasks);

$sqlPendingTasks = $queryResultAllTasks - $queryResultCompletedTasks;

if ($queryResultAllTasks === 0) {
    $roundedPercentage = 0;
}else {
    $completedPercentage = ($queryResultCompletedTasks / $queryResultAllTasks) * 100;
    $roundedPercentage = round($completedPercentage, 0, PHP_ROUND_HALF_UP);
}

?>

    <div class="container">

                <div class="row">

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-pattern">
                            <div class="card-body border rounded">
                                <div class="float-right">

                                        <div class="svg-item">
                                            <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
                                                <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="8"></circle>
                                                <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="8" stroke-dasharray="<?php echo $roundedPercentage; echo " " . (100 - $roundedPercentage); ?>" stroke-dashoffset="25"></circle>
                                                <g class="donut-text donut-text-1">

                                                    <text y="52%" transform="translate(0, 2)">
                                                        <tspan x="50%" text-anchor="middle" class="donut-percent"><?php echo $roundedPercentage;?>%</tspan>
                                                    </text>
                                                </g>
                                            </svg>
                                        </div>
                                </div>
                                <h5 class="font-size-20 mt-0 pt-1"><?php echo $roundedPercentage; ?>%</h5>
                                <p class="text-muted mb-0">Progress</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-pattern">
                            <div class="card-body border rounded">
                                <div class="float-right">
                                    <i class="fas fa-archive text-primary"></i>
                                </div>
                                <h5 class="font-size-20 mt-0 pt-1"><?php echo $queryResultAllTasks ?></h5>
                                <p class="text-muted mb-0">Total tasks</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-pattern">
                            <div class="card-body border rounded">
                                <div class="float-right">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                                <h5 class="font-size-20 mt-0 pt-1"><?php echo $queryResultCompletedTasks ?></h5>
                                <p class="text-muted mb-0">Completed Tasks</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-pattern">
                            <div class="card-body border rounded">
                                <div class="float-right">
                                    <i class="fa fa-file text-primary h4 ml-3"></i>
                                </div>
                                <h5 class="font-size-20 mt-0 pt-1"><?php echo $sqlPendingTasks ?></h5>
                                <p class="text-muted mb-0">Uncompleted</p>
                            </div>
                        </div>
                    </div>
                </div>

              <div class="row status-table">
                  <div class="col-md-12">
                      <div style="height: 2em"></div>
                      <div class="card">
                          <div class="card-header">

                              <h4 class="pb-3"><b><?php echo htmlentities($_GET['projectTitle']); ?></b></h4>
                              <ul class="nav nav-tabs card-header-tabs">

                                <li class="nav-item">
                                    <a class="nav-link
                                    <?php
//                                    Nustatomas rodymas kuris tabas yra aktyvus.

                                    if ($_SESSION['statusTableEdit'] == "no") {
                                        echo "active";
                                    }
                                    ?>" id="tasks-tab" data-toggle="tab" href="#task-1" role="tab" aria-controls="task-1" aria-selected="true">Tasks</a>
                                </li>

                                  <li class="nav-item">
                                      <a class="nav-link
                                      <?php
//                                      Nustatomas rodymas kuris tabas yra aktyvus.

                                      if ($_SESSION['statusTableEdit'] == "yes") {
                                          echo "active";

                                          $_SESSION['statusTableEdit'] = "no";
                                      }
                                      ?>" id="statistics-tab" data-toggle="tab" href="#stat-1" role="tab" aria-controls="stat-1" aria-selected="true">Status table</a>
                                  </li>


                              </ul>

<!--Statusų lenta-->

                          </div>
                          <div class="card-body">
                              <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade" id="stat-1" role="tabpanel" aria-labelledby="statistics-tab">


                      <div class="container mx-0 px-0 ">
                          <div class="row" id="status-table">
                              <h4 class="col-xl-4 pl-3 text-danger" id="status-table-header-todo">TO-DO</h4>
                              <h4 class="col-xl-4 pl-3 text-primary">IN PROGRESS</h4>
                              <h4 class="col-xl-4 pl-3 text-success">DONE</h4>

<?php
include 'dbh.php';

if ($mysqli->connect_error) {
    die("Connection failed:" . $mysqli->connect_error);
}

$index=$_GET['projectIndex'];

if(isset($_GET['projectIndex'])){
    $sqlTaskTable = "SELECT tasks.project, tasks.task_ID, tasks.title, tasks.description, priorities.priority, tasks.status, statuses.status_ID, priorities.priority_ID,
    tasks.start_date, tasks.update_date,
    ROW_NUMBER() OVER (ORDER BY tasks.task_ID) AS row_number
    FROM tasks, priorities, statuses
    WHERE tasks.project=$index AND tasks.priority=priorities.priority_ID AND tasks.status=statuses.status_ID";
}

$resultTaskTable = mysqli_query($mysqli, $sqlTaskTable);

$tasksData = [];    // CREATING ARRAY FOR 'STATUS' VALUES OF TASKS

if (!$resultTaskTable) {
    die("Database access failed: " . mysqli_error($mysqli));
}else {

    $rows = mysqli_num_rows($resultTaskTable);
    if ($rows) {
        while ($rowTaskTable= mysqli_fetch_assoc($resultTaskTable)) {
        $tasksData[] = $rowTaskTable;
        }
    }
}


mysqli_close($mysqli);

//Suskaičiuojame kurios būsenos užduočių yra daugiausia kad pagal tai galima būtų išspausdinti tuščias eilutes lentelėje.
$countToDo = 0;
$countInProgress = 0;
$countDone = 0;

for ($i = 0; $i < count($tasksData); $i++) {

    if ($tasksData[$i]["status_ID"] == 1) {
        $countToDo++;
    }elseif ($tasksData[$i]["status_ID"] == 2) {
        $countInProgress++;
    }else {
        $countDone++;
    }
}

$max = max($countToDo, $countInProgress, $countDone);
?>

                              <div class="col-xl-4 col-md-6 pl-0 pr-3">
                                  <div class="card bg-pattern">
                                      <div class="card-body border rounded d-flex flex-column status-card pt-0 h-100">
                                          <script>
                                              function changeHiddenButtonAttribute() {

                                              }
                                          </script>

                                            <?php
                                                    $count = 0;

                                                    for ($i = 0; $i < count($tasksData); $i++) {
                                                        if ($tasksData[$i]["status_ID"] == 1) {
                                                            echo "<a href='#' data-edit-task-button='" . $tasksData[$i]["task_ID"] . "'
                                                             data-edit-button-name='" . $tasksData[$i]["title"] . "'
                                                             data-edit-button-comment='" . $tasksData[$i]["description"] . "'
                                                             data-edit-select-priority = '" . $tasksData[$i]["priority_ID"] . "'
                                                             data-edit-select-status = '" . $tasksData[$i]["status_ID"] . "'
                                                             data-toggle='modal' data-target='.bd-edit-task-lg' class='text-dark mr-1 edit-row border-bottom py-3 status-table-item' data-placement='top' title='' data-original-title='.bd-edit-project-lg' onclick='changeHiddenButtonAttribute()'>" . htmlentities($tasksData[$i]["title"]) . "</a>";
                                                             $count++;
                                                        }
                                                    }
//                                                    Tuščių eilučių spausdinimas
                                                    for ($i = 0; $i < ($max - $count); $i++) {
                                                        echo "<a class='border-bottom py-3 text-white'> .</a>";
                                                    }
                                            ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-4 col-md-6 pl-0 pr-3">
                                  <div class="card bg-pattern">
                                      <div class="card-body border rounded d-flex flex-column status-card pt-0 h-100">

                                              <?php
                                                    $count = 0;

                                                    for ($i = 0; $i < count($tasksData); $i++) {
                                                        if ($tasksData[$i]["status_ID"] == 2) {
                                                            echo "<a href='#' data-edit-task-button='" . $tasksData[$i]["task_ID"] . "'
                                                           data-edit-button-name='" . $tasksData[$i]["title"] . "'
                                                           data-edit-button-comment='" . $tasksData[$i]["description"] . "'
                                                           data-edit-select-priority = '" . $tasksData[$i]["priority_ID"] . "'
                                                           data-edit-select-status = '" . $tasksData[$i]["status_ID"] . "'
                                                           data-toggle='modal' data-target='.bd-edit-task-lg' class='text-dark mr-1 edit-row border-bottom py-3 status-table-item' data-placement='top' title='' data-original-title='.bd-edit-project-lg'>" . htmlentities($tasksData[$i]["title"]) . "</a>";
                                                           $count++;
                                                        }
                                                    }
//                                                    Tuščių eilučių spausdinimas
                                                    for ($i = 0; $i < ($max - $count); $i++) {
                                                        echo "<a class='border-bottom py-3 text-white'> .</a>";
                                                    }
                                              ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-4 col-md-6 pl-0 pr-3 h-100">
                                  <div class="card bg-pattern h-100">
                                      <div class="card-body border rounded d-flex flex-column status-card pt-0 h-100">

                                              <?php
                                                    $count = 0;

                                                    for ($i = 0; $i < count($tasksData); $i++) {
                                                        if ($tasksData[$i]["status_ID"] == 3) {
                                                            echo "<a href='#' data-edit-task-button='" . $tasksData[$i]["task_ID"] . "'
                                                             data-edit-button-name='" . $tasksData[$i]["title"] . "'
                                                             data-edit-button-comment='" . $tasksData[$i]["description"] . "'
                                                             data-edit-select-priority = '" . $tasksData[$i]["priority_ID"] . "'
                                                             data-edit-select-status = '" . $tasksData[$i]["status_ID"] . "'
                                                             data-toggle='modal' data-target='.bd-edit-task-lg' class='text-dark mr-1 edit-row border-bottom py-3 status-table-item' data-placement='top' title='' data-original-title='.bd-edit-project-lg'>" . htmlentities($tasksData[$i]["title"]) . "</a>";
                                                             $count++;
                                                        }
                                                    }
//                                                    Tuščių eilučių spausdinimas
                                                    for ($i = 0; $i < ($max - $count); $i++) {
                                                        echo "<a class='border-bottom py-3 text-white'> .</a>";
                                                    }
                                              ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>

<!--Užduočių sąrašas                                  -->

                              <div class="tab-pane fade show active" id="task-1" role="tabpanel" aria-labelledby="task-1-tab">
                                  <table class="table">

                                    <thead>
                                        <tr>
                                            <div class="d-flex justify-content-between">

                                                <div>
                                                    <?php $getTaskID=$_GET["projectIndex"]; ?>
                                                    <button id="add-new-task-btn" type="button" class="btn bg-success pr-4 text-white" data-toggle="modal" data-target=".bd-add-task-lg"><i class="fas fa-plus"></i> Add new task</button>
                                                    <a href='exportCSVTasks.php?projectTitle=&projectIndex=<?php echo $getTaskID; ?> ' id="export-csv-tasks" class="btn bg-success text-white " ><i class='fas fa-file-download'></i></a>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group mb-1">
                                                        <input type="text" class="form-control" placeholder="Search..." aria-describedby="project-search-addon" />
                                                        <div class="input-group-append">
                                                            <button class="btn bg-primary text-white mt-1" type="button" id="project-search-addon"><i class="fa fa-search search-icon font-1"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    </thead>

                                      <table class="table project-table table-centered table-nowrap">
                                      <thead>
                                          <tr class="text-center">
                                              <th class="align-middle" id="rowID2" scope="col">#</th>
                                              <th class="align-middle" id="title2" scope="col">Task name</th>
                                              <th class="align-middle" id="description2" scope="col">Description</th>
                                              <th class="align-middle" id="priorities" scope="col">Priority</th>
                                              <th class="align-middle" id="status2" scope="col">Status</th>
                                              <th class="align-middle" id="created" scope="col">Created</th>
                                              <th class="align-middle" id="updated" scope="col">Updated</th>
                                              <th class="align-middle" id="actions2" scope="col">Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                              <?php
                    include 'dbh.php';
                    if ($mysqli->connect_error) {
                        die("Connection failed:" . $mysqli->connect_error);
                    }

                  $index=$_GET['projectIndex'];

                    if(isset($_GET['projectIndex'])){
                        $sqlTaskTable = "SELECT tasks.project, tasks.task_ID, tasks.title, tasks.description, priorities.priority, statuses.status, statuses.status_ID, priorities.priority_ID,
                        tasks.start_date, tasks.update_date,
                            ROW_NUMBER() OVER (ORDER BY tasks.task_ID) AS row_number
                            FROM tasks, priorities, statuses
                            WHERE tasks.project=$index AND tasks.priority=priorities.priority_ID AND tasks.status=statuses.status_ID";
                    }

                        $resultTaskTable = mysqli_query($mysqli, $sqlTaskTable);

                        $tasksStatus = array();    // CREATING ARRAY FOR 'STATUS' VALUES OF TASKS

                        if (!$resultTaskTable)
                         die("Database access failed: " . mysqli_error($mysqli));

                        $rows = mysqli_num_rows($resultTaskTable);
                        if ($rows) {
                           while ($rowTaskTable= mysqli_fetch_assoc($resultTaskTable)) {

                               array_push($tasksStatus, $rowTaskTable["status"]); // FILLING ARRAY OF 'STATUS' VALUES OF TASKS

                            echo " <tr class='text-center'>
                        <th class='align-middle' scope='row'style='text-align: left !important;'><span style='white-space:nowrap;'>" . $rowTaskTable["row_number"] . "</span></th>
                        <td class='text-left align-middle'>" . htmlentities($rowTaskTable["title"]) . "</td>
                        <td class='text-left align-middle'>" . htmlentities($rowTaskTable["description"]) . "</td>
                        <td class='align-middle'>" . $rowTaskTable["priority"] . "</td>
                        <td class='align-middle'>
                            <span class='font-12 task'><i class='mdi mdi-checkbox-blank-circle mr-1'></i><b>" . $rowTaskTable["status"] . "</b></span>
                        </td>
                         <td class='align-middle'>" . $rowTaskTable["start_date"] . "</td>
                              <td class='align-middle'>" . $rowTaskTable["update_date"] . "</td>
                         <td class= 'align-middle' style='text-align:right';>
                            <div class='action m-1'>
                                <a href='#' data-edit-task-button='" . $rowTaskTable["task_ID"] . "'
                                 data-edit-button-name='" . $rowTaskTable["title"] . "'
                                 data-edit-button-comment='" . $rowTaskTable["description"] . "'
                                 data-edit-select-priority = '".$rowTaskTable["priority_ID"]."'
                                 data-edit-select-status = '".$rowTaskTable["status_ID"]."'
                                 data-toggle='modal' data-target='.bd-edit-task-lg' class='text-success mr-1 edit-row' data-toggle='tooltip' data-placement='top' title='' data-original-title='.bd-edit-project-lg'><i class='far fa-edit text-primary'></i></a>
                                <a href='#' class='text-danger delete-row' data-delete-button='" . $rowTaskTable["task_ID"] . "' data-target='.bd-delete-task-lg' data-toggle='modal' data-placement='top' title='' data-original-title='.bd-delete-task-lg'><i class='fas fa-trash'></i></a>                            </div>
                        </td>
                    </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>There was no results found!</td></tr>";
                    }

                    if (count(array_unique($tasksStatus)) === 1 && end($tasksStatus) === 'DONE') { // CHECKING IF ALL TASKS ARE 'DONE'

                     $statusUpdDone = "UPDATE projects SET status=3 WHERE project_ID='$index'";  // IF YES, UPDATE DATABASE STATUS TO 'DONE'
                     $statusUpdDoneRes = mysqli_query($mysqli, $statusUpdDone);
                    }
                     else {
                          $statusUpdUndone = "UPDATE projects SET status=2 WHERE project_ID='$index'";  // IF NO, UPDATE DATABASE STATUS TO 'IN PROGRESS'
                     $statusUpdUndoneRes = mysqli_query($mysqli, $statusUpdUndone);
                     }

                   mysqli_close($mysqli);
                    ?>
                    <script type="text/javascript">                      
                  
                    var tasks = document.getElementsByClassName('task')

                    for (let i = 0; i < tasks.length; i++) {
                            var task = tasks[i];

                      var taskStatus = task.querySelector('b').innerHTML

                      if (taskStatus === "TO DO") {
                            task.style.color="#c02c2c";
                      }

                      if (taskStatus === "IN PROGRESS") {
                            task.style.color="#0275d8";
                      }

                      if (taskStatus === "DONE") { 
                            task.style.color="#3ea556";
                       }
                   }
                        </script>
                    </tbody>
                </table>
            </div>
                                   <div class="text-left">
                                  <a href="index.php" class="btn btn-primary float-end" role="button" aria-pressed="true" >
                                      <i class="fas fa-chevron-left mr-1"></i>Back to projects</a>
                                   </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>

  <script src="js/scripts.js"></script>
  <script src="js/emoji.js"></script>
  <script src='js/spaces.js'></script>
  <script src='js/setDeletableId.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
