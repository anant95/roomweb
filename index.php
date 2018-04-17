<?php 
session_start();
include('includes/setup.php');

$error_message="";

 if(isset($_SESSION['id'])){
    header('Location:dashboard.php'); 
}

if (isset($_POST['submit1'])){
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
   
// password   
   if (empty($_POST['password'])) {
     $error[]= "Require Password.";
   }  
   else {
   	$password = $_POST['password'];
     //$password =mysql_real_escape_string($_POST['password']);
   }
   if(empty($error)){
      // log in code here
	 $query = "SELECT * FROM user WHERE username='$username' AND password='$password' AND contact='$mobile'";
	$result= mysqli_query($dbc,$query) or die(mysql_error());
	 if(mysqli_num_rows($result)==1){
	       
		   
	  $row = mysqli_fetch_assoc($result);
	        $id=$row['id'];
			$_SESSION['id']=$id;
	        $_SESSION['username']=$username;
			$_SESSION['contact']=$mobile; 
			 header('Location:dashboard.php'); 
	      
	  }
	 else {
  $error_message= '<span class="error"><br />Username or password is incorrect.<br /><br />'; 
   }
  }else{

        $error_message = '<br><br><span class="error">'."You have entered <b style='color:red;'>Wrong Entry</b> or left any <b style='color:red;'>Field Empty</b>".'</span><br>';

     }   

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
 

<?php

// ********************registration php script******************
$all_error="";
$duplicate_contact = "";
$username1=$password1=$address=$city=$state="";
$mobile1=0;
$username_err = $password_err = $mobile_err = $address_err = $city_err = $state_err = "";

if (isset($_POST['submit2'])){
 
 
   // Username
   if (empty($_POST['username2'])) {
     $username_err = "Require Name";
   } else  if(ctype_alnum($_POST['username2'])) {
     $username1 = test_input($_POST['username2']);
   }else{$username_err="Invalid Username.";}
 
 
 
 // mobile
   if (empty($_POST['mobile2'])) {
     $mobile_err = "Enter Mobile No.";
   } else  if(ctype_digit($_POST['mobile2'])) {
     $mobile1 = test_input($_POST['mobile2']);
   }else{$mobile_err="Invalid Number.";}
 
 
   // password   
   if (empty($_POST['password2'])) {
     $password_err = "Require Password";
   } 
   else {
     $password1 = test_input($_POST['password2']);
   }
 
 
   // Address
   if (empty($_POST['address'])) {
     $address_err = "Enter Your Valid Address";
   } 
   else {
     $address= test_input($_POST['address']);
   }
 
 
 
   // city
   if (empty($_POST['city'])) {
     $city_err = "Require city name";
   } 
   else {
     $city= test_input($_POST['city']);
   }
 
 
 // State
    if (empty($_POST['state'])) {
     $state_err = "Require state name";
   } 
   else if(ctype_alnum($_POST['state'])){
     $state= test_input($_POST['state']);
   }
	else{
		$state_err = "Invalid State Name"; 
	}
	//employer///////////////////////////////
	if (empty($_POST['employer'])) {
     $state_err = "Require employer field";
   } 
   else if(ctype_alnum($_POST['employer'])){
     $employer= test_input($_POST['employer']);
   }
	else{
		$state_err = "Invalid employer"; 
	}

$_SESSION['prompt0']=1;
 
 if(empty($username_err)&&empty($city_err)&&empty($state_err)&&empty($mobile_err)&&empty($password_err)&&empty($address_err)){
 
  // *****************checking existing contact ***************************
  
 	$temp_query = "SELECT * FROM user WHERE contact='$mobile1'";
			  $temp_result = mysqli_query($dbc,$temp_query) or die(mysql_error());
			 if(mysqli_num_rows($temp_result))
			    {
			    	$duplicate_contact = '<div style="font-size:22px;display:inline;font-weight:bold;color:white;background:rgba(10,10,10,.6);padding:25px;">'.'Mobile Number is already registered!'.'</div>';		
			    		
				}
			 else{
      // ***********************otherwise log in code here *************************
    //  $activation = md5(uniqid(rand(),true));
	  $query2="INSERT INTO temp (username,contact,address,password,city,state) values('$username1','$mobile1','$address','$password1','$city','$state')";
	  $result2= mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
	  $_SESSION['mobileNumber']=$mobile1;
	  
if($result2)
  //header('location:sendotp.php?action=generateOTP'); 
  $query1 = "INSERT INTO user(username,contact,password,address,city,state,employer) VALUES('$username1','$mobile1','$password1','$address','$city','$state','$employer')";
			 $result1= mysqli_query($dbc,$query1) or die(mysqli_error($dbc));
		
			$query2 = "DELETE FROM temp WHERE contact=$_SESSION[mobileNumber]";
			 $result2= mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
			
			  header('Location:prompt.php?x=0');
			 }
			 
	}
 else{
 	
	$all_error = '<br><br><span class="error">'."You have entered <b style='color:red;'>Wrong Entry</b> or left any <b style='color:red;'>Field Empty</b>".'</span><br>';
	
	
 }
	
	
	
 }  // if(isset['submit2']) ends here 
 
else{
	
$_SESSION['prompt0']=0;
	
}
 
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $page_title.' | '.$site_name; ?></title>
  <meta charset="utf-8">
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
	
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">	
       
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      
      </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="font-size:19px;">
        <li class="active"><a href="home.php">Owner</a></li>
        <li><a href="user_search.php">User</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="font-size:19px;" id="log_reg" >
        <li><a href="register_form" id="register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="login_form"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid" id="main_section">
	<div class="row">
		
		<div class="col-md-5"> 
		  <p id="general_msg" style="color: rgb(5,70,10)">Do you want to post your room for rent? </p>
		  <p id="general_msg"> you have to follow 3 steps-</p>
				<p id="general_msg">&nbsp;&nbsp;&nbsp;1.Register for free</p>
				<p id="general_msg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.Fill necessary details.</p>
				<p id="general_msg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.Submit</p>
		</div>
    <div class="col-md-1" style="margin-top: 20px;">
    	<!--*************** MSG91 LOGO for OTP ************** -->

<a href="https://msg91.com/startups/?utm_source=startup-banner"><img src="https://msg91.com/images/startups/msg91Badge.png" width="120" height="90" title="MSG91 - SMS for Startups" alt="Bulk SMS - MSG91"></a>


<!-- ************************** --> 

    </div>
			<div id="log_box">
			</div>
			
		<?php echo "$error_message";?>
			<!--      registration form -->
			
			<div id="reg_box">
			</div>

	   	
	   	<?php echo "$all_error";?>
	   	<?php echo "$duplicate_contact";?>
	 
     </div>
<br />
<br />


<!-- 3 bloacks and images below login form -->


		<div class="row" style="margin:15px;">
				
				<div class="col-md-3" id="home_login">
					<h4> Are you having room for <strong>Rent</strong>?</h4>
					<p id="home_common_para"> if you are new room owner then you have to register first time otherwise just login start posting your room</p>
					 <div id="home_login_column">Login | Register
					 </div>
					 <img src="pic/home2.png" width="230px" height="230px" />
				</div>
				
				
				<div class="col-md-4 col-md-offset-1" id="home_sellRent">
						<h4>Room,Flat,Shop and Home for <strong>Rent</strong> or <strong>Sell</strong> </h4>	
						<p id="home_common_para">Here you can post your room , shop and flat for rent and if you want to sell your property like home,flat go to Sell option after login.</p>
						<img src="pic/sell1.png" width="230px" height="230px" />
						<img src="pic/rent2.jpg" width="230px" height="230px" />
				</div>
				
			
				<div class="col-md-3 col-md-offset-1" id="home_user">
					<h4><strong>Are you searching for Room?</strong></h4>
					 <p id="home_common_para"> you are finding room go to <strong>User link</strong> in menu bar and search room by loaction you want.</p>
					<img src="pic/user1.png" width="230px" height="230px" />
				</div>
				
		</div>
		
   </div>  <!-- container fluid class ends here -->

</div>
  	
  <footer id="the_footer" style="height:100px;background:rgb(140,14,14);">
	<p style="text-align:center;color:rgb(200,200,200);font-size: 20px;padding-top:30px;">
		 (c) Copyright 2016 @ RoomWeb. All Rights Reserved.
	</p>
  </footer>
  	
  	<script src="js/jquery.js" type="text/javascript"></script>
  	<script src="js/home.js" type="text/javascript"></script>
</body>
</html>
