<?php 
                    include 'dbh.php';
                    if ($mysqli->connect_error) {
                        die("Connection failed:" . $mysqli->connect_error);
                    }
                       
                
                  if((isset($_GET['search'])) && (!strlen(rtrim($_GET['search'])) <=3) && (!empty($_GET['search']))){
                                                                 
                        $searchKey = mysqli_real_escape_string($mysqli, preg_replace('/^(\s+)/', ' ',rtrim($_GET['search'])));
                                                                                 
                        $keyWords = explode(" ", rtrim($searchKey));

                
                                                                  
                       $sqlProjectTable ="SELECT projects.project_ID, projects.project_name, projects.description, statuses.status,
                            ROW_NUMBER() OVER (ORDER BY projects.project_ID) AS row_number,
                            (SELECT COUNT(*) FROM tasks WHERE project = projects.project_ID) AS project_total,
                            (SELECT COUNT(*) FROM tasks WHERE status=2 AND project=projects.project_ID) AS pending_project
                            FROM projects, statuses
                            WHERE projects.status=statuses.status_ID AND projects.project_name LIKE '%$searchKey%'";
                  
                       foreach($keyWords as $k){
                            $k = trim($k);
                                                 
                           $sqlProjectTable .= "OR projects.status=statuses.status_ID AND projects.project_name LIKE '%$k%'";
                       }
                                                            
                            $resultProjectTable = $mysqli->query($sqlProjectTable);
                            $queryResult = mysqli_num_rows($resultProjectTable);                         
                            $message = $queryResult . " Results were found by  " . $countKeyWords . ": " .  $searchKey;
                       
                                                                                                                               
                    }else
                           {
                            

            
                           if(isset($_GET['reset']) || $mysqli == true)  
                         $sqlProjectTable ="SELECT projects.project_ID, projects.project_name, projects.description, statuses.status,
                            ROW_NUMBER() OVER (ORDER BY projects.project_ID) AS row_number,
                            (SELECT COUNT(*) FROM tasks WHERE project = projects.project_ID) AS project_total,
                            (SELECT COUNT(*) FROM tasks WHERE status=2 AND project=projects.project_ID) AS pending_project
                            FROM projects, statuses
                            WHERE projects.status=statuses.status_ID";


                    $resultProjectTable = $mysqli->query($sqlProjectTable);
                    $queryResult = mysqli_num_rows($resultProjectTable);
                           
                           }
                           
                                                   
                           ?>