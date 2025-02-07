<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,OPTIONS,DELETE,PUT');
header("Access-Control-Allow-Headers: X-Requested-With");

require("configfile.php");


$amount = ($_REQUEST["amount"] <> "") ? trim($_REQUEST["amount"]) : "";
$usn = ($_REQUEST["usn"] <> "") ? trim($_REQUEST["usn"]) : "";
$name = ($_REQUEST["name"] <> "") ? trim($_REQUEST["name"]) : "";
$date = ($_REQUEST["date"] <> "") ? trim($_REQUEST["date"]) : "";
$email = ($_REQUEST["email"] <> "") ? trim($_REQUEST["email"]) : "";
$challan = ($_REQUEST["challan"] <> "") ? trim($_REQUEST["challan"]) : "";
$mobile = ($_REQUEST["mobile"] <> "") ? trim($_REQUEST["mobile"]) : "";
$gender = ($_REQUEST["gender"] <> "") ? trim($_REQUEST["gender"]) : "";
$dtype = ($_REQUEST["dtype"] <> "") ? trim($_REQUEST["dtype"]) : "";
$degree_name = ($_REQUEST["degree_name"] <> "") ? trim($_REQUEST["degree_name"]) : "";
$branch_name = ($_REQUEST["branch_name"] <> "") ? trim($_REQUEST["branch_name"]) : "";
$semester = ($_REQUEST["semester_name"] <> "") ? trim($_REQUEST["semester_name"]) : "";
$exam_cat = ($_REQUEST["exam_cat"] <> "") ? trim($_REQUEST["exam_cat"]) : "";

$subjectid = ($_REQUEST["subject_id"] <> "") ? trim($_REQUEST["subject_id"]) : "";
$subject_Opt = ($_REQUEST["subject_Opt_id"] <> "") ? trim($_REQUEST["subject_Opt_id"]) : "";

    
echo $sql = "INSERT INTO record_data (challannumber, usn, studentname, paymentdate, email, mobile, gender, degreetype, degree, branch_specialization, semester, examcategory, paidamount, seralizedmysubjects, seralizedmysubjectsops) VALUES (:challannumber, :usn, :studentname, :paymentdate, :email, :mobile, :gender, :degreetype, :degree, :branch_specialization, :semester, :examcategory, :paidamount, :seralizedmysubjects, :seralizedmysubjectsops)";





    try {
                                $stmt = $DB->prepare($sql);
							
				$stmt->bindParam(":challannumber", $challan,PDO::PARAM_STR);
				$stmt->bindParam(":usn", $usn,PDO::PARAM_STR);
				$stmt->bindParam(":studentname", $name,PDO::PARAM_STR);
				$stmt->bindParam(":paymentdate", $date,PDO::PARAM_STR);
				$stmt->bindParam(":email", $email,PDO::PARAM_STR);        
                                $stmt->bindParam(":mobile", $mobile,PDO::PARAM_INT);
				$stmt->bindParam(":gender", $gender,PDO::PARAM_INT);
				$stmt->bindParam(":degreetype", $dtype,PDO::PARAM_INT);
				$stmt->bindParam(":degree", $degree_name,PDO::PARAM_INT);
				$stmt->bindParam(":branch_specialization", $branch_name,PDO::PARAM_INT);
				$stmt->bindParam(":semester", $semester,PDO::PARAM_INT);
				$stmt->bindParam(":examcategory", $exam_cat,PDO::PARAM_INT);
				$stmt->bindParam(":paidamount", $amount,PDO::PARAM_INT);
				
				$stmt->bindParam(":seralizedmysubjects", $subjectid,PDO::PARAM_STR);
				$stmt->bindParam(":seralizedmysubjectsops", $subject_Opt,PDO::PARAM_STR);
				

                $message = $stmt->execute();

                if($message){
                   echo json_encode(1);
                }else{
                   echo json_encode(0);
                  }

    }catch (Exception $ex) {
                ($ex->getMessage());
                 echo json_encode(0);
    }




?>















