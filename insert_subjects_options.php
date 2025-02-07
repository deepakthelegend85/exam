<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");

echo  $sub_code = ($_REQUEST["scode_o"] <> "") ? trim($_REQUEST["scode_o"]) : "";
echo $sub_name = ($_REQUEST["sname_o"] <> "") ? trim($_REQUEST["sname_o"]) : "";
echo $branch = ($_REQUEST["branchid_o"] <> "") ? trim($_REQUEST["branchid_o"]) : "";
echo $semester = ($_REQUEST["semid_o"] <> "") ? trim($_REQUEST["semid_o"]) : "";
echo $photocopy = ($_REQUEST["photocopy_o"] <> "") ? trim($_REQUEST["photocopy_o"]) : "";
echo $revaluation = ($_REQUEST["rev_o"] <> "") ? trim($_REQUEST["rev_o"]) : "";
echo $makeup = ($_REQUEST["makeup_o"] <> "") ? trim($_REQUEST["makeup_o"]) : "";
echo $set = ($_REQUEST["sets_o"] <> "") ? trim($_REQUEST["sets_o"]) : "";

    $sql = "INSERT INTO all_subject_code_options (subject_code_o,subject_name_o,all_branch_id_o,all_sem_id_o,photocopy_o,revaluation_o,makeup_o,set_o) VALUES (:subject_code, :subject_name, :all_branch_id, :all_sem_id,  :photocopy, :revaluation, :makeup,:set)";

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
                $stmt->bindParam(":set", $set,PDO::PARAM_INT);
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















