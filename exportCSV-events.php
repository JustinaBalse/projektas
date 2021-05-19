<?php

include 'dbh.php';

//if (isset($_GET["exportCSV"]))
//{
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=event-log.csv');
    $outputEvents = fopen("php://output", "w");
    fputcsv($outputEvents, array('ID', 'Event', 'Project', 'Task', 'User', 'Event time'));
    $queryEvents ="SELECT event_ID, event, project, task, user, event_time FROM log_journal";
    $resultEvents = mysqli_query($mysqli, $queryEvents);
    while($rowEvents =mysqli_fetch_assoc($resultEvents))
    {
        fputcsv($outputEvents, $rowEvents);
    }
    fclose($outputEvents);
//}
