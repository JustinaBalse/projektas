<?php

include 'dbh.php';
$index=$_GET['projectIndex'];


    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=tasks.csv');
    $outputTasks = fopen("php://output", "w");

    fputcsv($outputTasks, array('#', 'Task name', 'Description', 'Priority', 'Status', 'Created', 'Updated'));
    $queryTasks ="SELECT tasks.task_ID,
 tasks.title,
 tasks.description,
priorities.priority,
statuses.status,
tasks.start_date,
tasks.update_date
FROM tasks, priorities, statuses
WHERE tasks.project=$index 
AND tasks.priority=priorities.priority_ID
AND tasks.status=statuses.status_ID;";
    $resultTasks = mysqli_query($mysqli, $queryTasks);
    while($rowTasks =mysqli_fetch_assoc($resultTasks))
    {
        fputcsv($outputTasks, $rowTasks);
    }
    fclose($outputTasks);


