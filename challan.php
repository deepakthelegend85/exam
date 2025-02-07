<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

$challan = ($_REQUEST["challan"] <> "") ? trim($_REQUEST["challan"]) : "";


if ($challan <> "") {

    $sql = "SELECT challannumber FROM record_data WHERE challannumber = :chnum";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":chnum", trim($challan));
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }

     $value_challan = count($results);
     if ($value_challan > 0) {
            echo json_encode($value_challan);
    }else{
	    echo json_encode($value_challan);
	}
}
?>

