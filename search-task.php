<?php

   include 'dbh.php';
                    if ($mysqli->connect_error) {
                        die("Connection failed:" . $mysqli->connect_error);
        }


 if((isset($_GET['search-task'])) ){

               $searchTaskKey = mysqli_real_escape_string($mysqli, preg_replace('/^(\s+)/', ' ',strip_tags($_GET['search-task'])));
                
               $taskKeyWords = explode(" ",trim($searchTaskKey));

              $index=$_GET['projectIndex'];

           if(isset($_GET['projectIndex'])){

               $sqlTaskTable = "SELECT tasks.project, tasks.task_ID, tasks.title, tasks.description, priorities.priority, statuses.status, statuses.status_ID, priorities.priority_ID,
               tasks.start_date, tasks.update_date, tasks.executant,
                   ROW_NUMBER() OVER (ORDER BY tasks.task_ID) AS row_number
                   FROM tasks, priorities, statuses
                   WHERE tasks.project=$index AND tasks.priority=priorities.priority_ID AND tasks.status=statuses.status_ID AND tasks.title LIKE '%$searchTaskKey%' OR tasks.project=$index AND tasks.priority=priorities.priority_ID AND tasks.status=statuses.status_ID AND tasks.task_ID LIKE '%$searchTaskKey%'";
          }

            $resultTaskTable = mysqli_query($mysqli, $sqlTaskTable);

              foreach($taskKeyWords as $i){
                   $i = trim($i);

                  $sqlTaskTable .= "OR tasks.project=$index AND tasks.priority=priorities.priority_ID AND tasks.status=statuses.status_ID AND tasks.title LIKE '%$i%' OR tasks.project=$index AND tasks.priority=priorities.priority_ID AND tasks.status=statuses.status_ID AND tasks.task_ID LIKE '%$i%'";
              }

                    $resultTaskTable = mysqli_query($mysqli, $sqlTaskTable);
                   $queryResult = mysqli_num_rows($resultTaskTable);
                   $message = $queryResult ." Results were found by keywords: " . $searchTaskKey ." ";
                   $number_of_results=$queryResult;


           }else
                  {


                  if(isset($_GET['reset-tasks']) || $mysqli == true)
                  $index=$_GET['projectIndex'];

           if(isset($_GET['projectIndex'])){
               $sqlTaskTable = "SELECT tasks.project, tasks.task_ID, tasks.title, tasks.description, priorities.priority, statuses.status, statuses.status_ID, priorities.priority_ID,
               tasks.start_date, tasks.update_date, tasks.executant,
                   ROW_NUMBER() OVER (ORDER BY tasks.task_ID) AS row_number
                   FROM tasks, priorities, statuses
                   WHERE tasks.project=$index AND tasks.priority=priorities.priority_ID AND tasks.status=statuses.status_ID";
           }

               $resultTaskTable = mysqli_query($mysqli, $sqlTaskTable);

                }
