<?php
session_start();
include('includes/setup.php');
if(isset($_SESSION['mobile2'])){
	
session_destroy();

$x=$_GET['x'];
function createMessage($x){
if(is_numeric($x))
  {
      switch($x){

		  case 0: $message="Your Password is successfully changed.<br><br>You may now <a href=\"index.php\">Login!</a>";
		          break;
		  case 1: $message="You've entered the invalid verification code!";
		          break;
		  default : $message = "You have entered the wrong url!";	  
		         break;
	  }
echo $message;	  
  }
}
}
else{
	header('location:index.php');
}

?>


<!DOCTYPE html>
<html>
<head>
<title>RoomWeb</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
</head>
<body>

 <div id="wrapper">
  <div class="container-fluid" id="site_header">
	<header>
			<a href="index.php"><img src="pic/logo2.png" width="100px" height="100px" style="float: left;top: 5px;"><h4 style="position: absolute;left:120px;top:30px;">RoomWeb</h4></a>
	</header>	
  </div>
  
  <!-- Container Div Starts here -->
  <div class="container-fluid" style="background: rgba(0,70,40,1);height:700px">
      <div style="background: rgba(0,0,0,.6);margin:20px;padding:20px;border: 2px solid white;">
   <!-- Home user div for inner red box design -->
     	
     	<div class="row">
	     	<div class="col-md-12 " style="color:white;font-size:30px;margin:30px;">
	       <?php createMessage($x); ?>
	       
	        </div>
	    </div>
	   

	   		  
	</div>
</div>
<footer id="the_footer" style="height:100px;background:rgb(140,14,14);">
	<p style="text-align:center;color:rgb(200,200,200);font-size: 20px;padding-top:30px;"> (c) Copyright 2016 @ RoomWeb. All Rights Reserved.</p>
</footer>
 </div>
 </body>
 </html>
 