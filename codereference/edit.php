<?php
error_reporting(0);
$con=mysql_connect("localhost","root","");
mysql_select_db("empmaster");

if(!$con)
{
	die("Connection Failed....".mysql_error());
}

$myId=$_GET['Id'];

$myquery="SELECT fname,lname FROM test WHERE id='$myId'";

$result=mysql_query($myquery);

while($row=mysql_fetch_array($result))
{
	$i=$row['id'];
	$f=$row['fname'];
	$s=$row['lname'];
}

if(isset($_POST['save']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	
	$qr="UPDATE test SET fname='$fname',lname='$lname' WHERE id=".$myId."";
	
	mysql_query($qr);
	
	echo "<script>alert('Record Updated...')</script>";
	echo "<script>window.location='demo.php'</script>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Record</title>
</head>

<body>

	<form action="" method="post" name="edit">
		<label>Name:</label>
		<input type="text" name="fname" value="<?php echo $f; ?>" />
		<label>Surname:</label>
		<input type="text" name="lname" value="<?php echo $s; ?>" />
		<br />
		<input type="submit" name="save" value="SAVE" />
	</form>

</body>
</html>
