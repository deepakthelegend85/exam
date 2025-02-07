<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

$subjects_o = array();

$degree_id = ($_REQUEST["degree_id"] <> "") ? trim($_REQUEST["degree_id"]) : "";

$degree_type = ($_REQUEST["degree_type"] <> "") ? trim($_REQUEST["degree_type"]) : "";

$branch_spec_id = ($_REQUEST["branch_spec_id"] <> "") ? trim($_REQUEST["branch_spec_id"]) : "";

$sem_id = ($_REQUEST["sem_id"] <> "") ? trim($_REQUEST["sem_id"]) : "";

$exam_category_id = ($_REQUEST["exam_category_id"] <> "") ? trim($_REQUEST["exam_category_id"]) : "";

$max_col = "SELECT MAX(set_o) FROM all_subject_code_options WHERE ((all_branch_id_o = :abio1) && (all_sem_id_o = :asio1))";

/* set_o is set number */


try {
        $stmt1 = $DB->prepare($max_col);
        $stmt1->bindValue(":abio1", trim($branch_spec_id));
		$stmt1->bindValue(":asio1", trim($sem_id));
        $stmt1->execute();
        $results1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex1) {
		
         echo($ex1->getMessage()); 
		
    }
	
$max_col1 = $results1['MAX(set_o)'];

for($i=1;$i<=$max_col1;$i++){

  /*if($i==1){ }  */

    if ($exam_category_id <> "") {
	
	 switch ($exam_category_id) { 
		
	case 1:
	$sql = "SELECT * FROM all_subject_code_options WHERE ((all_branch_id_o = :abio) && (all_sem_id_o = :asio) && (set_o = :seto)) ORDER BY subject_id_o";
	break; 
	case 2:
	case 3:
	$sql = "SELECT * FROM all_subject_code_options WHERE (((all_branch_id_o = :abio) && (all_sem_id_o = :asio) && (set_o = :seto)) && 
	((photocopy_o =1) && (revaluation_o =1))) ORDER BY subject_id_o";
	break; 
	case 4:	 
	$sql = "SELECT * FROM all_subject_code_options WHERE ((all_branch_id_o = :abio) && (all_sem_id_o = :asio)&& (makeup_o =1) && (set_o = :seto)) ORDER BY subject_id_o";
	break; 
	
	} 
	
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":abio", trim($branch_spec_id));
		$stmt->bindValue(":asio", trim($sem_id));
		$stmt->bindValue(":seto", trim($i));
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
	
	
         if (count($results) > 0) {
      
              foreach ($results as $rs) { 
     
	
	               if(($exam_category_id==1)||($exam_category_id==2)||($exam_category_id==3)||($exam_category_id==4)){ 
	 
		        	$subjects_o[] = $rs;
			       
				   }  
	 
	 
                } 
           
            
        }          
	
   } 

 }

echo json_encode($subjects_o);	
 ?>
