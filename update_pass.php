<?php
session_start();
include('includes/setup.php');

$error_message="";

 if(!isset($_SESSION['mobile2'])){
    header('Location:index.php'); 
}

if (isset($_POST['submit'])){
    $error=array();
	
   // password
   if (empty($_POST['pass1'])){
     $error[]= "Please enter a password.";
   } else   {
     $pass1 = $_POST['pass1'];
   }
   
   //password2
   if (empty($_POST['pass2'])){
     $error[]= "Please enter a password.";
   } else   {
     $pass2 = $_POST['pass2'];
   }
    
    if(empty($error)){
      // log in code here
      if($pass1==$pass2){
	 $query = "UPDATE user SET password='$pass1' WHERE contact='$_SESSION[mobile2]'";
	$result= mysqli_query($dbc,$query) or die(mysql_error());
	 if($result){  
			header('location:f_prompt.php?x=0');  
	      
	  }
	  }
	 else {
  $error_message= '<span class="error"><br /><b>Error : </b>Username or password is incorrect.<br /><br />'; 
   }
  }else{

        $error_message = '<br><br><span class="error">'."You have entered <b style='color:red;'>Wrong Entry</b> ".'</span><br>';

     }   

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
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
      <div style="background: rgba(0,0,0,.6);height:700px;border: 2px solid white;">
   <!-- Home user div for inner red box design -->
     	
     	<div class="row">
	     	<div class="col-md-12 " style="color:white;font-size:30px;">
	       ********************Enter New Password***********************
	       
	        </div>
	    </div>
	    <!-- only $x=1 OTP box will be shown -->

	    <!-- form Row -->
	 	<div class="row">
	     	<div class="col-md-6 col-md-offset-3" >
	    
	          
	             
	             <form role="form" id="form_id" method="POST" >
	  	             
	  	       
	  	                
	                  <div class="form-group">
	      				
	      				  <label for="username" style="width:200px;">New Password:</label>
	      				
	      				    <!-- Email Icon -->
	                        <div class="input-group margin-bottom-sm">
	       					
	       					   <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
	       					   <i class="fa fa-user fa-lg" style="color: rgb(255,255,255);"></i></span>
	       					   <input type="password" required="required" class="form-control" required="required"  name="pass1" placeholder="Enter your new password">
	        				
	        				</div>
	      
	      			 </div>
	        
	         <div class="form-group">
	      				
	      				  <label for="username" style="width:200px;">New Password Again:</label>
	      				
	      				    <!-- Email Icon -->
	                        <div class="input-group margin-bottom-sm">
	       					
	       					   <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
	       					   <i class="fa fa-user fa-lg" style="color: rgb(255,255,255);"></i></span>
	       					   <input type="password" required="required" class="form-control" required="required" id="no" name="pass2" placeholder="Re-enter your new password">
	        				
	        				</div>
	      
	      			 </div>
	                 <button type="submit" class="btn btn-default" id="button_id" name="submit" style="margin-top:40px;">Submit</button>
	      
	      		
	     
	     		 </form>
	   <?php
	   echo $error_message;
	   
	    ?>
	   		  
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
 