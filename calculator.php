<?php 
error_reporting(E_ERROR | E_PARSE); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Examination Form</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
   <style>

.box-body {
padding: 4px 10px !important;
}

.box{
  border: 3px solid #273373 !important; 
}

.content{
padding-top:0px !important;
}


.table>tbody>tr>td,
.table>tbody>tr>th,
.table>tfoot>tr>td,
.table>tfoot>tr>th,
.table>thead>tr>td,
.table>thead>tr>th{

    padding: 3px !important;

}


.center {
    display: block;
	width: 36%;
    margin-left: auto;
    margin-right: auto;  
}

.margint{
	margin-bottom:20px;
}



@media print {

      body, html, .wrapper,img,.content {
          width: 100%;
          height:auto;
      }

     #bpt{
        display:none;
    }

   @page { size: auto;  margin: 0mm; }

  .pbreak {page-break-after: always;}


}

    
   </style>
<body class="hold-transition  sidebar-mini">
<!-- oncontextmenu="return false" -->
<div class="wrapper">
<section class="content">
<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
		<div class="box box-primary">
            <div class="box-header with-border">
			<img src="http://newhorizonindia.edu/nhengineering/wp-content/uploads/2018/01/logooflogocopy1dd.png" alt="NHCE LOGO" class="center"> 
              
            </div>
			
			<form role="form" >
            <div class="box-body margint cen">

<?php
error_reporting(E_ERROR | E_PARSE);
					if(isset($_POST['submit'])) 
					{
					
					
		include 'configfile.php';  // Perform queries
        include('userFunction.php');	
		$insertFunction = new userFunction();
        		
		
		$usn = ($_POST["usn"] <> "") ? strtoupper(trim($_POST["usn"])) : "";
					 
		$studentname = ($_POST["studentname"] <> "") ? trim($_POST["studentname"]) : "";
		
		$paymentdate = ($_POST["pdate"] <> "") ? trim($_POST["pdate"]) : "";
		
		$challannumber = ($_POST["cnumber"] <> "") ? trim($_POST["cnumber"]) : "";
		
		$email = ($_POST["email"] <> "") ? trim($_POST["email"]) : "";
		
		$mobile = ($_POST["mobile"] <> "") ? trim($_POST["mobile"]) : "";
		
		$gender = ($_POST["gender"] <> "") ? trim($_POST["gender"]) : "";
		
		$degreetype = ($_POST["dtype"] <> "") ? trim($_POST["dtype"]) : "";
		
		
		$degree = ($_POST["degree"] <> "") ? trim($_POST["degree"]) : "";
		
		$branch_specialization = ($_POST["branch_specialization"] <> "") ? trim($_POST["branch_specialization"]) : "";
		
		
		$semester = ($_POST["semester"] <> "") ? trim($_POST["semester"]) : "";
		
		$examcategory = ($_POST["ecategory"] <> "") ? trim($_POST["ecategory"]) : "";
		
		/* $mySubjects = ($_POST["subjects"] <> "") ? trim($_POST["subjects"]) : ""; */
		
	 	$paidamount = ($_POST["paidamount"] <> "") ? trim($_POST["paidamount"]) : ""; 
               
               /*  $paidamount = $_POST["paidamount"];  */
		
		$mySubjects = $_POST["subjects"]; 
		
        $seralizedmysubjects = serialize($mySubjects);
		
		
		$mySubjectsops = $_POST["subjects_ops"];
		
		$seralizedmysubjectsops = serialize($mySubjectsops);
		
		

		
	/*	$paidAmount = ($_POST["amount"] <> "") ? trim($_POST["amount"]) : ""; */

					 
					
					
					 if( empty($usn)){
						 echo "<strong><span style='color:red;'>Note:-</span>USN Cannot be empty  -<a href='index.php'> click here</a></strong>"; 
				 }else if(empty($studentname)){
						  echo "<strong><span style='color:red;'>Note:-</span>Student Name Cannot be empty -<a href='index.php'> click here</a></strong>";
					 }else if(empty($paymentdate)){	 
					      echo "<strong><span style='color:red;'>Note:-</span>Payment Date Cannot be empty  -<a href='index.php'> click here</a></strong>";  
					 }else if(empty($challannumber)){  
					      echo "<strong><span style='color:red;'>Note:-</span>Challan Number Cannot be empty  -<a href='index.php'> click here</a></strong>";	  
					 }else if(empty($email)){
						  echo "<strong><span style='color:red;'>Note:-</span>Email Cannot be empty  -<a href='index.php'> click here</a></strong>";
					 }
					 else if(empty($mobile)){
						 echo "<strong><span style='color:red;'>Note:-</span>Mobile Number Cannot be empty  -<a href='index.php'> click here</a></strong>";
					 }
					 else if(empty($gender)){
						 echo "<strong><span style='color:red;'>Note:-</span>Gender Cannot be empty  -<a href='index.php'> click here</a></strong>";
					 }
					 else if(empty($degreetype)){
						 echo "<strong><span style='color:red;'>Note:-</span>Degree Type Cannot be empty  -<a href='index.php'> click here</a></strong>";
					 }
					 else if(empty($degree)){
						 echo "<strong><span style='color:red;'>Note:-</span>Degree Cannot be empty  -<a href='index.php'> click here</a></strong>";
					 }
					 else if(empty($branch_specialization)){
						 echo "<strong><span style='color:red;'>Note:-</span>Branch Specialization Cannot be empty  -<a href='index.php'> click here</a></strong>";
					 }
					 else if(empty($semester)){
						 echo "<strong><span style='color:red;'>Note:-</span>Semister Cannot be empty  -<a href='index.php'> click here</a></strong>";
					 }
					 else if(empty($examcategory)){
						 echo "<strong><span style='color:red;'>Note:-</span>Exam Category Cannot be empty  -<a href='index.php'> click here</a></strong>";
					 }else{
	
$checkDefaulter = $insertFunction->defaultStudent($usn);

$costCorrectness = $insertFunction->checkAmount($paidamount,$degreetype,$examcategory,$seralizedmysubjects,$seralizedmysubjectsops); 

	

if($checkDefaulter){
	
echo "<center><strong>You Cannot Submit application. Please Contact Accounts Department</strong><center>";	
	
}else if($costCorrectness!=$paidamount){
	
$message = "In-Correct Examination Amount Paid, Please contact COE Department with the Print-out of Bank Challan";

$insertedValue = $insertFunction->dataSubmit($challannumber,$usn,$studentname,$paymentdate,$email,$mobile,$gender,$degreetype,$degree,$branch_specialization,$semester,$examcategory,$paidamount,$seralizedmysubjects,$seralizedmysubjectsops);	

if($insertedValue){
	$insertFunction->dataPrintoutMessage($challannumber,$usn,$studentname,$paymentdate,$email,$mobile,$gender,$degreetype,$degree,$branch_specialization,$semester,$examcategory,$paidamount,$seralizedmysubjects,$seralizedmysubjectsops,$message,$costCorrectness);
	}
	
}else{
	$message = "Form Submitted Successfully";
	
	$insertedValue = $insertFunction->dataSubmit($challannumber,$usn,$studentname,$paymentdate,$email,$mobile,$gender,$degreetype,$degree,$branch_specialization,$semester,$examcategory,$paidamount,$seralizedmysubjects,$seralizedmysubjectsops);
	
	if($insertedValue){
	
	$insertFunction->dataPrintout($challannumber,$usn,$studentname,$paymentdate,$email,$mobile,$gender,$degreetype,$degree,$branch_specialization,$semester,$examcategory,$paidamount,$seralizedmysubjects,$seralizedmysubjectsops,$message,$costCorrectness);
	
	}
	
}
						  

						 
						 }	// final else ends	
					


					
					}
					?>
	</div>
	</div>
	<div class="col-md-2"></div>
<div>	
</section>
</div>					
</body>
</html>
