<?php

error_reporting(0);
$con=mysqli_connect("localhost","root","","empmaster");
if (mysqli_connect_errno())
{
  	echo "Error ocured while connecting with database".mysqli_connect_errno();
}

?>