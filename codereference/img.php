<?php
//error_reporting(0);
$con=mysql_connect("localhost","root","");
mysql_select_db("empmaster");

if(!$con)
{
	die("Connection Failed".mysql_error());
}

if(isset($_POST['save']))
{
	$fname=$_POST['fname'];
	$photo=($_FILES['photo']['name']);
	move_uploaded_file($_FILES['photo']['tmp_name'],"pro/".$photo);
	
	$s="INSERT INTO profiles(fname,img) VALUES('".$fname."','".$photo."')";
	
	if(mysql_query($s,$con))
	{
		echo "Record Saved Successfully....";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Image Upload Demo</title>
</head>

<body>

<form method="post" action="img.php" enctype="multipart/form-data">
	<label>Name:</label>
	<input type="text" name="fname" required /><br /><br />
	<label>Photo:</label>
	<input type="file" name="photo" required />
	<br /><br />
	<input type="submit" name="save" value="SAVE" />
</form>

<table border="1" width="500">
	<thead>
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>PHOTO</th>
			<th>EDIT</th>
		</tr>
	</thead>
	
	<?php
		$query="SELECT * FROM profiles WHERE status='0'";
		$exe=mysql_query($query);
		
		while($rec=mysql_fetch_assoc($exe))
		{
			$pId=$rec['id'];
			$name=$rec['fname'];
			$img=$rec['img'];
	?>
	
	<tbody>
		<tr>
			<td><?php echo $pId; ?></td>
			<td><?php echo $name; ?></td>
			<td><img src="pro/<?php echo $img; ?>" /></td>
			<td><a href="editProfile.php?Id=<?php echo $pId; ?>">UPDATE</a></td>
		</tr>
		<?php } ?>
	</tbody>	
</table>

</body>
</html>
