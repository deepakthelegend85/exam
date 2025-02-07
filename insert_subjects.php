<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

$sub_code = ($_REQUEST["scode"] <> "") ? trim($_REQUEST["scode"]) : "";
$sub_name = ($_REQUEST["sname"] <> "") ? trim($_REQUEST["sname"]) : "";
$branch = ($_REQUEST["branchid"] <> "") ? trim($_REQUEST["branchid"]) : "";
$semester = ($_REQUEST["semid"] <> "") ? trim($_REQUEST["semid"]) : "";
$photocopy = ($_REQUEST["photocopy"] <> "") ? trim($_REQUEST["photocopy"]) : "";
$revaluation = ($_REQUEST["rev"] <> "") ? trim($_REQUEST["rev"]) : "";
$makeup = ($_REQUEST["makeup"] <> "") ? trim($_REQUEST["makeup"]) : "";

    $sql = "INSERT INTO all_subject_code (subject_code,subject_name,all_branch_id,all_sem_id,photocopy,revaluation,makeup) VALUES (:subject_code, :subject_name, :all_branch_id, :all_sem_id,  :photocopy, :revaluation, :makeup)";

if ($sub_code <> "") {    
     try {
                $stmt = $DB->prepare($sql);
                $stmt->bindParam(":subject_code", $sub_code,PDO::PARAM_STR);
                $stmt->bindParam(":subject_name", $sub_name,PDO::PARAM_STR);
                $stmt->bindParam(":all_branch_id", $branch,PDO::PARAM_INT);
                $stmt->bindParam(":all_sem_id", $semester,PDO::PARAM_INT);
                $stmt->bindParam(":photocopy", $photocopy,PDO::PARAM_INT);
                $stmt->bindParam(":revaluation", $revaluation,PDO::PARAM_INT);
                $stmt->bindParam(":makeup", $makeup,PDO::PARAM_INT);
                $message = $stmt->execute();
				
                if($message){
                   echo json_encode(1);
                }else{
                   echo json_encode(0);
                  }

    }catch (Exception $ex) {
                ($ex->getMessage()); 
                echo "<center>Unable to Submit Form, Either it may be submitted or some other problem</center>";
    }
}
?>















