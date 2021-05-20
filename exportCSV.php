<?php

include 'dbh.php';



    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=projects.csv');
    $outputProjects = fopen("php://output", "w");
    fputcsv($outputProjects, array('#', 'Projects', 'Description', 'Status', 'Total tasks', 'Tasks pending'));
    $queryProjects ="SELECT ROW_NUMBER() OVER (ORDER BY projects.project_ID) AS row_number,
                            projects.project_name, projects.description, statuses.status,                            
                            (SELECT COUNT(*) FROM tasks WHERE project = projects.project_ID) AS project_total,
                            (SELECT COUNT(*) FROM tasks WHERE status=2 AND project=projects.project_ID) AS pending_project
                            FROM projects, statuses
                            WHERE projects.status=statuses.status_ID";
    $resultProjects = mysqli_query($mysqli, $queryProjects);
    while($rowProjects =mysqli_fetch_assoc($resultProjects))
    {
        fputcsv($outputProjects, $rowProjects);
    }
    fclose($outputProjects);



