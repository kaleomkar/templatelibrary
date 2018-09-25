<?php
error_reporting(0);
$con=mysql_connect("localhost","root","","empmaster");
mysql_select_db("empmaster");

if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
		 
  	$myId=$_GET['Id'];
 
 	$result = "SELECT empName,empEmail,empDOB,empDOJ,empSalary,empDesignation FROM empdetails where empId='$myId'";
	$bg= mysql_query($result);
	while($row = mysql_fetch_array($bg))
	{
		 $userId = $row['stdId'];
		$userName = $row["empName"];
		$email = $row['empEmail'];
		$date=$row['empDOB'];
		$salary=$row['empSalary'];
 		$dateddd=$row['empDOJ'];
		$des=$row['empDesignation'];
	}

	if(isset($_POST['save']))
{
	$empName=$_POST['empName'];
	$empEmail= $_POST['empEmail'];
	$empDOB=$_POST['empDOB'];
	$empDOJ=$_POST['empDOJ'];
	$empSalary=$_POST['empSalary'];
	$empDesignation=$_POST['empDesignation'];
	
echo	$querys = "UPDATE empdetails SET empName='$empName',empEmail='$empEmail',empDOB='$empDOB',empSalary='$empSalary',empDesignation='$empDesignation' WHERE empId=".$myId."";

	mysql_query($querys);
		echo "<script>alert('Records Updated')</script>";


echo "<script>window.location='index.php'</script>";
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<link rel="stylesheet" href="css/datepicker.min.css" />
<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
<style>
label{ color:#fff;}
</style>
</head>

<body>

<div class="col-lg-12">
	<div class="col-lg-4"></div>
	<div class="col-lg-4" style="background:#333; padding:25px;">
		 <form action="" name="edit" method="post">
			<div class="col-lg-12">
			<label>Employee Name:</label>
			<input type="text" name="empName" class="form-control" value="<?php echo $userName; ?>" /><br />
			<label>Employee Email</label>
			<input type="email" name="empEmail" class="form-control" value="<?php echo $email; ?>" /><br />
			
			<label>Date Of Birth:</label>
			<div class="input-group input-append date" id="dob">
            <input type="text" class="form-control" name="empDOB"   value="<?php echo $date; ?>"/>
            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div><br />
			
			<label>Date Of Joining:</label>
			<div class="input-group input-append date" id="doj">
            <input type="text" class="form-control" name="empDOJ"   value="<?php echo $dateddd; ?>" />
            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div><br />
			
			<label>Salary:</label>
			<input type="text" name="empSalary" class="form-control" value="<?php echo $salary; ?>"   /><br />
			
			<label>Designation:</label>
			<input type="text" name="empDesignation" class="form-control"  value="<?php echo $des; ?>"  /><br />

			
			<button class="btn btn-primary" name="save" value="submit">SAVE</button>
			</div>
	 </form>
	</div>
	<div class="col-lg-4"></div>
</div>
</body>
</html>
