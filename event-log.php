<!DOCTYPE html>

<?php
//Verification
session_start();
if($_SESSION['email']=='admin@admin.com'){
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

<!--PROJECT INFO-->


<div class="container">
  <div class="card">
    <div class="card-header">
      <h4 class="pb-3"><b>Event log</b></h4>
    </div>
      <div class="card-body">

          <div class="table-responsive project-list">

            <div>
                 <form action="" method="GET">
                      <div class="d-flex justify-content-between"style="display: inline-flex">

                        <div>
                            <a href="exportCSV-events.php" id="export-csv-events" class="btn bg-success text-white mb-3" type="submit" name="exportCSV" value="CSV export"><i class='fas fa-file-download'></i></a>
                        </div>

                    </div>
                </form>
              </div>

                <table class="table project-table table-centered table-nowrap">

                    <thead>

                    </thead>
                    <thead>
                   <tr class="text-center">
                        <th class="align-middle py-1" id="eventId" scope="col">ID</th>
                        <th class="align-middle py-1" id=eventTitle scope="col">Event</th>
                        <th class="align-middle py-1" id="eventProject" scope="col">Project</th>
                        <th class="align-middle py-1" id="eventTask" scope="col">Task</th>
                        <th class="align-middle py-1" id="eventUser" scope="col">User</th>
                        <th class="align-middle py-1" id="eventDate" scope="col">Event time</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                       include 'paginator-for-events.php';

                         if ($result) {

                            while ($row=mysqli_fetch_assoc($result)) {

                              echo " <tr class='text-center'>
                          <th class='align-middle' scope='row' style='text-align: center !important;'><span style='white-space:nowrap;'>" . $row["event_ID"] . "</span></th>
                          <td class='text-left align-middle'>" . $row["event"] . "</a></td>
                          <td class='align-middle'>" . $row["project"] . "</td>
                          <td class='align-middle'>" . $row["task"] . "</td>
                          <td class='align-middle'>" . $row["user"] . "</td>
                          <td class='align-middle'>" . $row["event_time"] . "</td>
                      </tr>";
                    }
                    } else {
                        echo "<tr><td colspan='7'>There was no events found!</td></tr>";
                    }

                    mysqli_close($mysqli);
                    ?>

                    </tbody>
                </table>
                  <?php include 'page-logic-for-events.php'; ?>
                </div>
                <div class="text-left">
               <a href="index.php" class="btn btn-primary float-end" role="button" aria-pressed="true" >
                   <i class="fas fa-chevron-left mr-1"></i>Back to projects</a>
                </div>
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
</body>
</html>
<?php } ?>
