<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

$usn = ($_REQUEST["usn"] <> "") ? trim($_REQUEST["usn"]) : "";

if ($usn <> "") {

    $sql = "SELECT DISTINCT default_usn FROM default_student WHERE default_usn = :dusn";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":dusn", trim($usn));
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
	
	$value_defaulter = count($results);
	
    if ($results) {
	echo json_encode($value_defaulter);
    }else{
	echo json_encode($value_defaulter);
	}	
}
?>


     

