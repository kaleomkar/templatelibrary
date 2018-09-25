<?php
error_reporting(0);
$con=mysql_connect("localhost","root","");
mysql_select_db("empmaster");
if(!$con)
{
	die("Connection Failed".mysql_error());
}
if(isset($_POST['save']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	
	$s="INSERT INTO test(fname,lname) VALUES('".$fname."','".$lname."')";
	
	if(mysql_query($s,$con))
	{
		echo "Record Saved...";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demo</title>
</head>

<body>

	<form method="post" enctype="multipart/form-data">
		<label>Name:</label>
		<input type="text" name="fname" />
		<label>Surname:</label>
		<input type="text" name="lname" />
		<br />
		<input type="submit" name="save" value="SAVE" />
	</form>
	
	<table border="2" width="600" cellpadding="2">
		<thead>
			<tr>
				<td>ID</td>
				<td>NAME</td>
				<td>SURNAME</td>
				<td>EDIT</td>
				<td>DELETE</td>
			</tr>
		</thead>
		
		<?php
		$query="SELECT * FROM test WHERE status='0'";
		$exe=mysql_query($query);
		
		while($rec=mysql_fetch_assoc($exe))
		{
			$pId=$rec['id'];
			$name=$rec['fname'];
			$surname=$rec['lname'];
		?>
		<tr>
			<td><?php echo $pId; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $surname; ?></td>
			<td><a href="edit.php?Id=<?php echo $pId; ?>">UPDATE</a></td>
			<td><a href="delete.php?Id=">DELETE</a></td>
		</tr>
		<?php } ?>
	</table>

</body>
</html>
