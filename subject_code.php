<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

$subjects = array();

$degree_id = ($_REQUEST["degree_id"] <> "") ? trim($_REQUEST["degree_id"]) : "";

$degree_type = ($_REQUEST["degree_type"] <> "") ? trim($_REQUEST["degree_type"]) : "";

$branch_spec_id = ($_REQUEST["branch_spec_id"] <> "") ? trim($_REQUEST["branch_spec_id"]) : "";

$sem_id = ($_REQUEST["sem_id"] <> "") ? trim($_REQUEST["sem_id"]) : "";

$exam_category_id = ($_REQUEST["exam_category_id"] <> "") ? trim($_REQUEST["exam_category_id"]) : "";


if ($exam_category_id <> "") {
	
	 switch ($exam_category_id) { 
		
	case 1:
	$sql = "SELECT * FROM all_subject_code WHERE ((all_branch_id = :abi) && (all_sem_id= :asi)) ORDER BY subject_id";
	break;
	case 2:
	case 3:
	$sql = "SELECT * FROM all_subject_code WHERE (((all_branch_id = :abi) && (all_sem_id= :asi)) && 
	((photocopy =1) && (revaluation =1))) ORDER BY subject_id";
	break;
	case 4:	 
    $sql = "SELECT * FROM all_subject_code WHERE ((all_branch_id = :abi) && (all_sem_id= :asi) && (makeup =1) ) ORDER BY subject_id";
	break;
	
	} 
	
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":abi", trim($branch_spec_id));
		$stmt->bindValue(":asi", trim($sem_id));
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
	
	
    if (count($results) > 0) {
      

     foreach ($results as $rs) { 
    
	   if($exam_category_id==1){ 
	  
	    $subjects[] = $rs;
	  
       }


	   if(($exam_category_id==2)||($exam_category_id==3)||($exam_category_id==4)){ 

		 $subjects[] = $rs;

        } 
	 
	 
     } 
       
      echo json_encode($subjects);	   
    
    }           
	

}
?>
