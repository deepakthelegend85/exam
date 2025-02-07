<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

$degree_id = ($_REQUEST["degree_id"] <> "") ? trim($_REQUEST["degree_id"]) : "";

$branch_id = ($_REQUEST["branch_id"] <> "") ? trim($_REQUEST["branch_id"]) : "";

$dtype = ($_REQUEST["dtype"] <> "") ? trim($_REQUEST["dtype"]) : "";

$semister = array();


if ($degree_id <> "") {
	
	switch ($degree_id) {
				
    case 1:
	    if(($dtype==1)&&(($branch_id == 9) || ($branch_id == 10))){ 
        $sql = "SELECT * FROM semister ORDER BY semister ASC LIMIT 0, 2";
		}else if (($dtype==1)&&(($branch_id != 9) || ($branch_id != 10))) {
			$sql = "SELECT * FROM semister ORDER BY semister ASC LIMIT 2, 12";	
		}
		
        break;
    case 2:
        $sql = "SELECT * FROM semister ORDER BY semister ASC LIMIT 0, 5";
        break;
    case 3:
        $sql = "SELECT * FROM semister ORDER BY semister ASC LIMIT 0, 9";
        break;
	case 4:
        $sql = "SELECT * FROM semister ORDER BY semister ASC LIMIT 0, 6";
        break;
  
}
	
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
     if (count($results) > 0) {
      
        
            
               
                 foreach ($results as $rs) { 
                    $semister[] = $rs;
                 } 
            
                  echo json_encode($semister);
       
    }
}
?>
