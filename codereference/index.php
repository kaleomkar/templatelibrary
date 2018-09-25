<?php
error_reporting(0);
$con=mysql_connect("localhost","root","");
mysql_select_db("empmaster");

if(!$con)
{
  die('Could not connect: '.mysql_error());
}

if(isset($_POST['save']))
{
	$empName=$_POST['empName'];
	$empEmail= $_POST['empEmail'];
	$empDOB=$_POST['empDOB'];
	$empDOJ=$_POST['empDOJ'];
	$empSalary=$_POST['empSalary'];
	$empDesignation=$_POST['empDesignation'];
	
	$s = "INSERT INTO empdetails(empName,empEmail,empDOB,empDOJ,empSalary,empDesignation) VALUES('".$empName."','".$empEmail."','".$empDOB."','".$empDOJ."','".$empSalary."','".$empDesignation."')";

	if(mysql_query($s,$con))
	{
		echo "Record Saved";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Portal</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<link rel="stylesheet" href="css/datepicker.min.css" />
<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
<style>
label{ color:#fff;}
</style>
</head>
<body>
<div class="container">
<div class="col-lg-12">
	<div class="col-lg-4"></div>
	<div class="col-lg-4" style="background:#333; padding:25px;">
		<form method="post" enctype="multipart/form-data">
			<div class="col-lg-12">
			<label>Employee Name:</label>
			<input type="text" name="empName" class="form-control" /><br />
			<label>Employee Email</label>
			<input type="email" name="empEmail" class="form-control"  /><br />
			
			<label>Date Of Birth:</label>
			<div class="input-group input-append date" id="dob">
            <input type="text" class="form-control" name="empDOB"  />
            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div><br />
			
			<label>Date Of Joining:</label>
			<div class="input-group input-append date" id="doj">
            <input type="text" class="form-control" name="empDOJ"  />
            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div><br />
			
			<label>Salary:</label>
			<input type="text" name="empSalary" class="form-control"  /><br />
			
			<label>Designation:</label>
			<input type="text" name="empDesignation" class="form-control"  /><br />
			
			<button class="btn btn-primary" name="save" value="submit">Add Employee</button>
			</div>
		</form>
	</div>
	<div class="col-lg-4"></div>
</div>
		
		
<div class="row">
	<div class="col-lg-12 table-responsive">
		 
		<table class="table table-condensed table-striped table-hover" id="dataTables-example">
		<thead>
			<tr>
			<th>Edit</th>
				<th>Delete</th>
				<th>ID</th>
				<th>NAME</th>
				<th>EMAIL</th>
				<th>DATE OF BIRTH</th>
				<th>DATE OF JOINING</th>
				<th>SALARY</th>
				<th>DESIGNATION</th>
				
			</tr>
		</thead>
		<tbody>
		<?php
		
		 
		$myquery="SELECT * FROM empdetails where status='0'";
		$exe=mysql_query($myquery);
		while($rec=mysql_fetch_assoc($exe))
		{
			$id=$rec['empId'];
			$name=$rec['empName'];
			$email=$rec['empEmail'];
			$dob=$rec['empDOB'];
			$doj=$rec['empDOJ'];
			$sal=$rec['empSalary'];
			$des=$rec['empDesignation'];
		
		?>
		
		<tr>
		<td><a href="editRecord.php?Id=<?php echo $id;?>" class="btn btn-primary">Edit</a></td>
			   <td><a href="editRecord.php?Id=<?php echo $id;?>" class="btn btn-primary">Delete</a></td>
			<td><?php echo $id; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $dob; ?></td>
			<td><?php echo $doj; ?></td>
			<td><?php echo $sal; ?></td>
			<td><?php echo $des; ?></td>
			  
		</tr>
		<?php } ?> 
</tbody>
</table>

	</div>
</div>


</div>

<script type="text/javascript" src="js/bootstrap-datepicker.js"></script> 
 <script type="text/javascript">
        $('#dob')
        .datepicker({
            format: 'dd-mm-yyyy',   
        })
		 $('#doj')
        .datepicker({
            format: 'dd-mm-yyyy',   
        })
        </script>
		
	 

<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
    $('.nav.navbar-nav > li').on('click', function (e)
	{
    	$('.nav.navbar-nav > li').removeClass('active');
    	$(this).addClass('active');
	});
});
</script>

</body>
</html>
