<?php
	include("dbConnect.php");
	session_start();
 
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 
<title>Manage Answer Category</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
   
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
     
    <link href="css/naukarivishwa.css" rel="stylesheet" type="text/css" >  
    <link href="css/blue.css" rel="stylesheet" type="text/css" />    
    <link href="css/morris.css" rel="stylesheet" type="text/css" /> 
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
   
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
     
    <link href="css/naukarivishwa.css" rel="stylesheet" type="text/css" >  
    <link href="css/blue.css" rel="stylesheet" type="text/css" />    
    <link href="css/morris.css" rel="stylesheet" type="text/css" /> 
     
    
 <script src="js/jquery.min.js"></script>	
	    
    <!-- jQuery UI 1.11.4 -->
     
    <!-- Bootstrap 3.3.2 JS -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
 
</head>

<body>
 <body class="skin-blue sidebar-mini">
    <div class="wrapper">
    <?php include("include/adminMenusite.php"); ?>
    
    
    
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
           <div class="box box-primary">
                <div class="box-header with-border margin-bottom">
                 
                   <div  >  <h4>Manage Answer Categroy Details</h4></div>
                </div><!-- /.box-header -->
                <!-- form start -->
          <div class="row ">
           <div class="col-lg-12 ">
             <div class="panel  ">
             
             <div class="panel-body">
             
             <div class="col-lg-12 margin-bottom">
             
             <div class="col-lg-6 text-right"><label>Enter Category Title</label></div>
             
             <div class="col-lg-6"><div class="input-group">
                   <!-- /btn-group -->
                    <input type="text" class="form-control" id="searchCat" name="searchCat"  placeholder="Enter word to search (Max 3 Characters)" >
                     <div class="input-group-btn">
                      <button type="button" class="btn btn-success">Search</button>
                    </div>
                  </div><!-- /input-group --></div>
           
           <div class="clearfix"></div>
             </div>
             <div class="col-lg-12 margin-bottom">
               <div class="table-responsive">
                                
                            </div>
              </div>
             </div>
             
             </div>
             
               </div>
             
               </div>
          </div><!-- /.row -->
          <!-- Main row -->
           <!-- /.row (main row) -->
</div>

 

<div class="clearfix"></div>
 
        </section><!-- /.content -->
      </div>
      
      
      
     
      
        <!-------------------------- Mode------------------------------>
      
      
      
      
      
      
      
      
      
  
    <!-- DATA TABES SCRIPT -->
    <script src="js/dataTables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables/dataTables.bootstrap.js" type="text/javascript"></script>
    
   
    <!-- SlimScroll -->
 
    <script type="text/javascript">
	
   
         oTable = $('#dataTables-example').dataTable();
	  
        $('#searchCat').on("keyup",function()
		{
		
		   oTable = $('#dataTables-example').dataTable();
		
		    oTable.fnFilter($(this).val());
		
		
		
		});
                            
     

    </script>
 
    <style>
.dataTables_filter {display: none;}
</style>
    
	<script type="text/javascript">
function delete_id(ansId)
{
	 
 if(confirm('Sure To Remove This Record ?'))
 {
  window.location.href='manageAnswerCategory.php?delete_id='+ansId;
 }
}
</script>

 <script type="text/javascript">
function activate(ansId)
{
	 
 if(confirm('Sure you Want To Activate ?'))
 {
  window.location.href='manageAnswerCategory.php?activate='+ansId;
 }
}
</script>
     <script type="text/javascript">
function Dactivate(ansId)
{
	 
 if(confirm('Sure To Deactivate ?'))
 {
  window.location.href='manageAnswerCategory.php?Dactivate='+ansId;
 }
}
</script>
    </div>
</body>
</html>