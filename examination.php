<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

$sem_id = ($_REQUEST["sem_id"] <> "") ? trim($_REQUEST["sem_id"]) : "";
$examination = array();

if ($sem_id <> "") {
	
    $sql = "SELECT * FROM examination_type ORDER BY examination_type";
	
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
    if (count($results) > 0) {
       
           
		   
                 foreach ($results as $rs) { 
                     $examination[] = $rs;
                } 
				
				echo json_encode($examination);
           

    }
}
?>