<?php
session_start();
include_once('includes/setup.php');
include('includes/header.php');

$id=$_SESSION['id'];
$contact=$_SESSION['contact'];
	$password1=$change_successful=$error_message=$error_incorrect="";

if (isset($_POST['submit'])){
  
$error=array();
   // Username
   if (empty($_POST["old_pass"])){
     $error[]= "Please enter your Old Paswword";
   } else{
     $old_pass = mysqli_real_escape_string($dbc,$_POST["old_pass"]);
   }
   // new password 1  
   if (empty($_POST["new_pass1"])) {
     $error[]= "Enter new Password";
   }  
   else {
     $new_pass1 =mysqli_real_escape_string($dbc,$_POST["new_pass1"]);
   }
   //new password 2
    if (empty($_POST["new_pass2"])) {
     $error[]= "Enter new Password again";
   }  
   else {
     $new_pass2 =mysqli_real_escape_string($dbc,$_POST["new_pass2"]);
   }
   if(empty($error)){
      // log in code here
	  if($new_pass1==$new_pass2){
	 $query = "SELECT password FROM user WHERE id='$id'";
	$result= mysqli_query($dbc,$query) or die(mysqli_error($dbc));
	 if(mysqli_num_rows($result)==1){
	  while($row = mysqli_fetch_assoc($result)){
	        $password1=$row['password'];
	    }
		}
		if($password1==$old_pass)
		    {
			  $query1="UPDATE user SET password='$new_pass1' where password='$old_pass' AND id ='$id' AND contact = '$contact'";
			  $result1= mysqli_query($dbc,$query1) or die(mysql_error());
			 if($result1)
			  { 
			  $change_successful = "Password changed successfully.";
			   }
			}
		else{
		$error_incorrect="Incorrect old password";
		}
		}
		else{
		$error_incorrect="Password doesn't match.New Password in both field must be same";
		}
	}
	
	else{
        $error_message = "<br><span>";
        
           $error_message.="Error : Please Fill All Fields!";
         
		 $error_message.="</span><br /><br />";
     } 
	}
	
?>
<style>
	#change_password_css{
		margin-top:30px;
		
	}
	#change_pass_main{
		height: 700px;
		background: rgba(90,0,0,1);
	}

</style>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="font-size:19px;">
      	 <li class="active"><a href="dashboard.php">DashBoard</a></li>
         <li><a href="room.php">Room</a></li>
         <li><a href="flat.php">Flat</a></li>
         <li><a href="hostel.php">Hostel</a></li>
         <li><a href="paying_guest.php">Paying Guest</a></li>
         <li><a href="shop.php">Shop</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right" style="font-size:19px;" >
      	
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid" id="change_pass_main">
	<div id="change_pass_submain"> 
<div class="row">
	 <div class="col-md-4 col-md-offset-4" id="change_password_css">
<form role="form" id="change_pass_form_id" method="POST">
  	
  	<h2 id="login_header">Change Password</h2>
    <div class="form-group">
      <label for="old_pass">Old Password:</label>
       <!-- Email Icon -->
      <div class="input-group margin-bottom-sm">
  <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);"><i class="fa fa-cog fa-lg" style="color: rgb(255,255,255);"></i></span>
      <input type="password" class="form-control"  name="old_pass" placeholder="Enter your Old Password">
      </div>
    </div>
    <!-- mobile for the security that two people do not have same name and password so mobile will be used i.e.unique-->
    <div class="form-group">
      <label for="new_pass">New Password:</label>
      <!-- Contact Icon -->
      <div class="input-group">
     <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);"><i class="fa fa-cog fa-lg"style="color: rgb(255,255,255);"></i></span>
      <input type="password" class="form-control" name="new_pass1" placeholder="Enter your New Password">
      </div>
    </div>
    <div class="form-group">
      <label for="new_pass2">Re-enter New Password:</label>
      <!-- password Icon -->
      <div class="input-group">
     <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);"><i class="fa fa-cog fa-lg"style="color: rgb(255,255,255);"></i></span>
      <input type="password" class="form-control"  name="new_pass2" placeholder="Re-enter your New Password">
      </div>
    </div>

    
    <button type="submit" class="btn btn-default" id="button_id" name="submit">Change</button>
   
  </form>
</div>
<?php
if(!empty($error_message)){
    echo "<div style='float:center; color:white;font-weight:bold; font-size:18px; margin:10px; '>$error_message</div>";
}
else if(!empty($change_successful))
{
echo "<div style='float:center; color:white;font-weight:bold; font-size:18px;margin:10px; '>$change_successful</div>";
}
else if(!empty($error_incorrect))
{
echo "<div style='float:center; color:white;font-weight:bold; font-size:18px; margin:10px;'>$error_incorrect</div>";
}
?>
</div>

</div>
</div>

  <footer id="the_footer" style="height:100px;background:rgb(140,14,14);">
	 <p style="text-align:center;color:rgb(200,200,200);font-size: 20px;padding-top:30px;">
		 (c) Copyright 2016 @ RoomFinder. All Rights Reserved.
	 </p>
  </footer>
	
</body>
</html>