<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

		
                $refno = ($_REQUEST["refno"] <> "") ? trim($_REQUEST["refno"]) : "";
                $sqlx = "SELECT DISTINCT * FROM record_data WHERE (challannumber = :refo)";


		try {
              
		$stmtca = $DB->prepare($sqlx);
		$stmtca->bindParam(":refo", trim($refno));
                $stmtca->execute();
	        $results = $stmtca->fetchAll();
 
                $value = count($results);
               if ($results) {
                   echo json_encode($results);
                 }else{
                  echo json_encode($value);
                
                }

		}catch (Exception $ex) {
                  echo "Error While Retreiving Record";

                } 
		
		
?>
