<?php

  $x = $_GET['x'];
  if($x>5 || $x<1)
    header('location:user_search.php');
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search State | RoomWeb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  
 <link rel="stylesheet" href="dashboard.css">
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
        <li><a href="index.php">Owner</a></li>
        <li class="active"><a href="user_search.php">User</a></li>
      </ul>
    </div>
  </div>
</nav>

   <div class="container-fluid" style="background-image: url('pic/user_search5.jpg') ;height: 700px;padding: 20px;">
 
    <div class="row">

   	  
   	   	
   	   	    <div class="col-md-6 col-md-offset-3">
   	   	    	<form role="form" id="dash_second_table" method="POST" action="search_result.php?x=<?php echo $x;?>">
				  	<div id="inner_user">
    		  
    		         <!-- State -->
				   <div class="form-group">
					    <label for="state">State * :</label>
					    <!-- No of rooms icon -->
					       <div class="input-group margin-bottom-sm">
					  <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
					    <i class="fa fa-map-marker fa-lg" style="color: rgb(255,255,255);"></i></span>
					
					  <select class="form-control" id="state" name="state">
					    <option selected="selected">Select Your State</option>
					    <option>Andhra Pradesh</option>
					    <option>Arunachal Pradesh</option>
					    <option>Asam</option>
					    <option>Bihar</option>
					    <option>Chattisgarh</option>
					    <option>Delhi</option>
					    <option>Goa</option>
					    <option>Gujarat</option>
					    <option>Haryana</option>
					    <option>Himachal Pradesh</option>
					    <option>Jammu & Kashmir</option>
					    <option>Jharkhand</option>
					    <option>Karnataka</option>
					    <option>Kerala</option>
					    <option>Madhya Pradesh</option>
					    <option>Maharashtra</option>
					    <option>Manipur</option>
					    <option>Meghalaya</option>
					    <option>Mizoram</option>
					    <option>Nagaland</option>
					    <option>Orissa</option>
					    <option>Punjab</option>
					    <option>Rajasthan</option>
					    <option>Sikkim</option>
					    <option>Tamilnadu</option>
					    <option>Telangana</option>
					    <option>Tripura</option>
					    <option>Uttar Pradesh</option>
					    <option>Uttarakhand</option>
					    <option>West Bengal</option>
					    
					  </select>
					  </div>
				    </div>
    		
    		
    		  <button type="submit" class="btn btn-default" id="button_id" name="submit">Search</button>
    		       </div>
   	   	    	</form>
   	   	    	
   	   	    	
   	   	    </div>
   	   	
   	   	
   	   </div>
  
   	
   	
  </div>
   <footer id="the_footer" style="height:100px;background:rgb(140,14,14);">
	<p style="text-align:center;color:rgb(200,200,200);font-size: 20px;padding-top:30px;">
		 (c) Copyright 2016 @ RoomWeb. All Rights Reserved.
	</p>
  </footer>
   


  </div>
  </body>
 
</html>

