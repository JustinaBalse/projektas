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

  <title>Tasks Managment</title>
  <meta name="description" content="a">
  <meta name="author" content="SitePoint">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/utilities.css">

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
    
    <!--Edit Task Modal-->
    <div class="modal fade bd-add-task-lg" id="add-task-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
          <div class="modal-content p-5">

              <form id="add-task-form">

                       <div class="form-group">
                       <label for="task-title-input">Enter Task Title</label>
                       <input type="text" class="form-control border" id="task-title-input" placeholder="" required maxlength="70">
                       </div>


                        <div class="form-group">
                            <label for="description">Enter Task Description</label>
                            <textarea class="form-control bg-light" id="task-description" name="comment-area" maxlength="210"></textarea>
                        </div>


                        <div class="mt-4">
                            <label for="priority-select">Select Priority</label>
                                <select id="priority-select"  class="form-select rounded border"  aria-label="Default select example">

                                <option selected value="1">Low</option>
                                <option value="2">Medium</option>
                                <option value="3">High</option>



                            </select>


                            <label for="priority-select">Select Status</label>
                            <select id="priority-select"  class="form-select rounded border"  aria-label="Default select example">
                                <option selected value="1">To Do</option>
                                <option value="2">In Progress</option>
                                <option value="3">Done</option>
                            </select>
                         </div>



              <div class="d-flex justify-content-center mt-5">
                <button class="btn bg-success text-white m-1" id="submit-project-btn"><i class="fas fa-check"></i>Submit</button>
                <button class="btn bg-danger text-white m-1" id="close-modal-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
              </div>

             </form>


          </div>
        </div>
      </div>


  <!--Edit Project Modal-->
      <div class="modal fade bd-edit-task-lg" id="edit-task-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
          <div class="modal-content p-5">

              <form id="edit-task-form">

                       <div class="form-group">
                       <label for="task-title-input">Edit Task Title</label>
                       <input type="text" class="form-control border" id="task-title-input" placeholder="" required maxlength="70">
                       </div>


                        <div class="form-group">
                            <label for="description">Edit Task Description</label>
                            <textarea class="form-control bg-light" id="task-description" name="comment-area" maxlength="210"></textarea>
                        </div>


                        <div class="mt-5">
                            <label for="priority-select">Select Priority</label>
                                <select id="priority-select"  class="form-select rounded border"  aria-label="Default select example">

                                <option selected value="1">Low</option>
                                <option value="2">Medium</option>
                                <option value="3">High</option>

                            </select>

                            <label for="priority-select">Select Status</label>
                            <select id="priority-select"  class="form-select rounded border"  aria-label="Default select example">
                                <option selected value="1">To Do</option>
                                <option value="2">In Progress</option>
                                <option value="3">Done</option>
                            </select>
                         </div>

              <div class="d-flex justify-content-center mt-4">
                <button class="btn bg-success text-white m-1" id="submit-project-btn"><i class="fas fa-check"></i>Submit</button>
                <button class="btn bg-danger text-white m-1" id="close-modal-btn" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
              </div>

             </form>

          </div>
        </div>
      </div>



    <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div style="height: 2em"></div>
                      <div class="card">
                          <div class="card-header">
                      
                              <h5><b><?php echo $_GET['projectTitle']?></b></h5>
                              <ul class="nav nav-tabs card-header-tabs">

                                <li class="nav-item">
                                    <a class="nav-link active" id="tasks-tab" data-toggle="tab" href="#task-1" role="tab" aria-controls="task-1" aria-selected="true">Tasks</a>
                                </li>

                                  <li class="nav-item">
                                      <a class="nav-link " id="statistics-tab" data-toggle="tab" href="#stat-1" role="tab" aria-controls="stat-1" aria-selected="true">Statistics</a>
                                  </li>


                              </ul>
                          </div>
                          <div class="card-body">
                              <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade" id="stat-1" role="tabpanel" aria-labelledby="statistics-tab">


                      <div class="container">
                          <div class="row">

                              <div class="col-xl-4 col-md-6">
                                  <div class="card bg-pattern">
                                      <div class="card-body border rounded">
                                          <div class="float-right">
                                          <i class="fas fa-archive text-primary"></i>
                                          </div>
                                          <h5 class="font-size-20 mt-0 pt-1">10</h5>
                                          <p class="text-muted mb-0">Total tasks</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-4 col-md-6">
                                  <div class="card bg-pattern">
                                      <div class="card-body border rounded">
                                          <div class="float-right">
                                          <i class="fas fa-check text-primary"></i>
                                          </div>
                                          <h5 class="font-size-20 mt-0 pt-1">6</h5>
                                          <p class="text-muted mb-0">Completed Tasks</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-4 col-md-6">
                                  <div class="card bg-pattern">
                                      <div class="card-body border rounded">
                                          <div class="float-right">
                                              <i class="fa fa-file text-primary h4 ml-3"></i>
                                          </div>
                                          <h5 class="font-size-20 mt-0 pt-1">4</h5>
                                          <p class="text-muted mb-0">Uncompleted</p>
                                      </div>
                                  </div>
                                </div>
                              </div>
                           </div>

                              <div class="spacer"></div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <label><h3>Progress</h3></label>
                                      <div class="progress">
                                          <div class="progress-bar bg-success text-center" id="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                      </div>
                                  </div>
                              </div>

                              </div>
                              <div class="tab-pane fade show active" id="task-1" role="tabpanel" aria-labelledby="task-1-tab">
                                  <table class="table">

                                    <thead>
                                        <tr>
                                            <div class="d-flex justify-content-between">

                                                <div>
                                                     <button id="add-new-task-btn" type="button" class="btn bg-success text-white" data-toggle="modal" data-target=".bd-add-task-lg"><i class="fas fa-plus"></i> Add new task</button>
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

                                      <thead>
                                          <tr>
                                              <th scope="col" class="text-center">#</th>
                                              <th scope="col" class="text-center">Task name</th>
                                              <th scope="col" class="text-center">Description</th>
                                              <th scope="col" class="text-center">Priority</th>
                                              <th scope="col" class="text-center">Status</th>
                                              <th scope="col" class="text-center">Created</th>
                                              <th scope="col" class="text-center">Updated</th>
                                              <th scope="col" class="text-center">Actions</th>
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
                    $sqlTaskTable = "SELECT tasks.project, tasks.task_ID, tasks.title, tasks.description, priorities.priority, statuses.status,
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
                        <th scope='row'>" . $rowTaskTable["row_number"] . "</th>
                        <td class='text-left'>" . $rowTaskTable["title"] . "</td>
                        <td class='text-left'>" . $rowTaskTable["description"] . "</td>
                        <td>" . $rowTaskTable["priority"] . "</td>
                        <td>
                            <span class='font-12 task'><i class='mdi mdi-checkbox-blank-circle mr-1'></i><b>" . $rowTaskTable["status"] . "</b></span>
                        </td>
                         <td>" . $rowTaskTable["start_date"] . "</td>
                              <td>" . $rowTaskTable["update_date"] . "</td>
                        <td>
                            <div class='action m-1 text-center'>     
                                <a href='#' data-edit-button='" . $rowTaskTable["task_ID"] . "'
                                 data-edit-button-name='" . $rowTaskTable["title"] . "'
                                 data-edit-button-comment='" . $rowTaskTable["description"] . "'
                                 data-toggle='modal' data-target='.bd-edit-project-lg' class='text-success mr-1 edit-row' data-toggle='tooltip' data-placement='top' title='' data-original-title='.bd-edit-project-lg'><i class='far fa-edit text-primary'></i></a>
                                <a href='#' class='text-danger' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'><i class='fas fa-trash'></i></a>
                            </div>
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
                    
                                
                    ?>

                    </tbody>
                </table>
            </div>
                                   <div class="text-right">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
