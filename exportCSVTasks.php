<?php

include 'dbh.php';
if (isset($_POST["exportCSVTasks"]))
{
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=tasks.csv');
    $outputTasks = fopen("php://output", "w");

    fputcsv($outputTasks, array('#', 'Task name', 'Description', 'Priority', 'Status', 'Created', 'Updated'));
    $queryTasks ="SELECT task_ID, description,priority,status, start_date, end_date
FROM `tasks`";
    $resultTasks = mysqli_query($mysqli, $queryTasks);
    while($rowTasks =mysqli_fetch_assoc($resultTasks))
    {
        fputcsv($outputTasks, $rowTasks);
    }
    fclose($outputTasks);
}

