<?php
error_reporting(0);
$con=mysql_connect("localhost","root","");
mysql_select_db("empmaster");

if(!$con)
{
	echo "Connection Failed...".mysql_error();
}

if(isset($_POST['save']))
{
	$name=$_POST['addItem'];
	$q="INSERT INTO list(name) VALUES('$name')";
	
	if(mysql_query($q))
	{
		echo "Record Saved.......";
	}
	else
	{
		echo "Insert Failed........";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>List Demo</title>
</head>

<body>

<form method="post" action="">
	<label>Enter Dept. : </label>
	<input type="text" name="addItem" />
	<input type="submit" name="save" value="SAVE" />
	
	<select>
		<option selected="selected" value="0">--- Select ---</option>	
		<?php
			$getData="SELECT id,name FROM list WHERE status='0'";
			$i=mysql_query($getData);
			
			while($row=mysql_fetch_array($i))
			{
				$pId=$row['id'];
				$name=$row['name'];
		?>
		<option value="<?php echo $pId; ?>"><?php echo $name; ?></option>
		<?php } ?>
	</select>
</form>

</body>
</html>
