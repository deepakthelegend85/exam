<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");



    $sql = "SELECT * FROM graduation_type";
	$gtype = array();
    try {
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
	
    if (count($results) > 0) {
       

                foreach ($results as $rs) {  
				  $gtype[] = $rs;
                 } 
				 echo json_encode($gtype);
           
       
    }

?>