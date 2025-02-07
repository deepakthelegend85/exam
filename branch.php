<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

$branch_id = ($_REQUEST["branch_id"] <> "") ? trim($_REQUEST["branch_id"]) : "";
$branch = array();

if ($branch_id <> "") {
	
    $sql = "SELECT * FROM branch WHERE graduation_list_id_graduation_list_table = :pmmb ORDER BY branch_name";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":pmmb", trim($branch_id));
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
     if (count($results) > 0) {
       

                 foreach ($results as $rs) { 
                   $branch[] = $rs;
                 } 
                echo json_encode($branch);
         
       
    }
}
?>