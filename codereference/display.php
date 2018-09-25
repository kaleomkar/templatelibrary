<?php
$con=mysqli_connect("localhost","root","","empmaster");
if (mysqli_connect_errno())
{
  	echo "Error ocured while connecting with database".mysqli_connect_errno();
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	
	 <table class="table table-striped " id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">Id</th>
                       						 <th> Title</th>                                          
                                              <th> Status</th>                                          
                                             
                                             
                                              <th>Edit</th>
                                              <th>Active / InActive</th>
                                               <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
 	 	                                    
    <?php
										  
										
	 
	echo   $i = "SELECT * FROM  empdetails ";
 		$h = mysql_query($i);
			while($row=mysql_fetch_array($h))	
			{
	
        	 $ansId=$row['empId'];
     	 	 $lnktitle=$row['empName'];	
			 $sst=$row['empEmail'];
		 
	 ?>
                   
                    
          <tr>
        	<td><?php echo $ansId; ?></td>
             <td>
			<?php  echo $lnktitle ; ?>
			</td>
              <td>
		
  
	<?php if($sst=="1")
			{ 
				echo "<span class='badge bg-blue'>InActive</span>" ;
			}
			else 
			{
				echo '<span class="badge bg-green">Active</span>';
			}   ?>
			</td>
           <td><a href="editAnsCat.php?ansId=<?php echo $ansId;?>"class="btn btn-primary"    ><i class="fa fa-eye"></i></a></td>
            
            <td>  <a href="javascript:activate(<?php echo $ansId; ?>)" class="btn btn-success"> <i class="fa fa-angle-up"></i></a>
      / <a href="javascript:Dactivate(<?php echo $ansId; ?>)" class="btn btn-success"> <i class="fa fa-angle-down"></i></a>  </td> 
      <td> <a href="javascript:delete_id(<?php echo $ansId; ?>)" class="btn btn-primary"> <i class="fa fa-trash-o"></i></a>       </td>
      
        </tr>
        <?php
		 }
		
		?>
                                       
                                    </tbody>
                                </table>
	
	

</body>
</html>
