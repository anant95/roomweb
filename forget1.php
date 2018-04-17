<?php
session_start();
include('includes/setup.php');

$error_message="";


if (isset($_POST['submit'])){
    $error=array();
	
   // Username
   if (empty($_POST['username'])){
     $error[]= "Please enter a username.";
   } else  if(ctype_alnum($_POST['username'])) {
     $username = $_POST['username'];
   }else{$error[]="Invalid Username.";}
   
  // mobile
   if (empty($_POST['mobile'])) {
     $error[] = "Enter Mobile No.";
   } else  if(ctype_digit($_POST['mobile'])) {
     $mobile = test_input($_POST['mobile']);
   }else{$error[]="Invalid Number.";} 
    if(empty($error)){
      // log in code here
	 $query = "SELECT * FROM user WHERE username='$username'  AND contact='$mobile'";
	$result= mysqli_query($dbc,$query) or die(mysqli_error($dbc));
	 if(mysqli_num_rows($result)==1){
	       
	       //$username= $_POST['username'];
			$_SESSION['mobile2']=$_POST['mobile']; 
			header('location:logout.php');  
	      
			//header('location:f_sendotp.php?action=generateOTP');  
	      
	  }
	 else {
  $error_message= '<span class="error"><br /><b>Error : </b>Username or Mobile is incorrect.<br /><br />'; 
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
	      Enter username and mobile Number
	       
	        </div>
	    </div>
	    <!-- only $x=1 OTP box will be shown -->

	    <!-- form Row -->
	 	<div class="row">
	     	<div class="col-md-6 col-md-offset-3" >
	    
	          
	             
	             <form role="form" id="form_id" method="POST" >
	  	             
	  	       
	  	                
	                  <div class="form-group">
	      				
	      				  <label for="username" style="width:200px;">Username:</label>
	      				
	      				    <!-- Email Icon -->
	                        <div class="input-group margin-bottom-sm">
	       					
	       					   <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
	       					   <i class="fa fa-user fa-lg" style="color: rgb(255,255,255);"></i></span>
	       					   <input type="text" required="required" class="form-control" required="required" id="username" name="username" placeholder="Enter username">
	        				
	        				</div>
	      
	      			 </div>
	        
	         <div class="form-group">
	      				
	      				  <label for="username" style="width:200px;">Mobile Number:</label>
	      				
	      				    <!-- Email Icon -->
	                        <div class="input-group margin-bottom-sm">
	       					
	       					   <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
	       					   <i class="fa fa-user fa-lg" style="color: rgb(255,255,255);"></i></span>
	       					   <input type="text" required="required" class="form-control" required="required" id="no" name="mobile" placeholder="Enter your mobile number">
	        				
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
 