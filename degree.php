<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

$degree_type_id = ($_REQUEST["degree_type_id"] <> "") ? trim($_REQUEST["degree_type_id"]) : "";
$degree = array();

if ($degree_type_id <> "") {
    $sql = "SELECT * FROM graduation_list WHERE graduation_id_graduation_type_table = :gigtt ORDER BY graduation_list";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":gigtt", trim($degree_type_id));
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
    if (count($results) > 0) {
      

                 foreach ($results as $rs) { 
                     $degree[] = $rs;
                 } 
                 echo json_encode($degree);
      
    }
}
?>