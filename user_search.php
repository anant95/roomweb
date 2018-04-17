
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search Room | RoomWeb</title>
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

	<div class="container-fluid" style="background-image: url('pic/back7.jpg');">
		<div class="row">
			<div class="col-md-12">
				<h1 style="color:white; margin: 50px 30px;text-align: center; font-size:40px; text-shadow: 3px 3px 5px black;font-weight: bold; ">You are searching for </h1>
				
			</div>
			
		</div>
		
		
		<div class="row">
			<div class="col-md-3 col-md-offset-2">
				<a href="search_state.php?x=1">
				<img src="pic/simple-room.jpg" class="img-responsive img-rounded"  />
				<h2 style="text-align: center;color:white;text-shadow: 3px 3px 5px black;font-weight: bold;">Single Room</h2>
				</a>
			</div>
			
			<div class="col-md-3 col-md-offset-2">
				<a href="search_state.php?x=2">
				<img src="pic/pg-room2.jpg" class="img-responsive img-rounded" /> 
			    <h2 style="text-align: center;color:white;text-shadow: 3px 3px 5px black;font-weight: bold;">Paying Guest Room</h2>
			    </a>
			</div>
				
		</div> <!-- Row div end here -->
		

		<div class="row">
			<div class="col-md-4 col-md-offset-4" >
			   <a href="search_state.php?x=3">
				<img src="pic/hostel-room1.jpg" class="img-responsive img-circle"  />
			    <h2 style="text-align: center;color:white;text-shadow: 3px 3px 5px black;font-weight: bold;">Hostel Room</h2>
			   </a>
			</div>	
	   	</div> 
		
		<div class="row">
			<div class="col-md-3 col-md-offset-2">
			   <a href="search_state.php?x=4">
				<img src="pic/flat-room.jpg" class="img-responsive img-rounded"  />
				<h2 style="text-align: center;color:white;text-shadow: 3px 3px 5px black;font-weight: bold;">Flat</h2>
			   </a>
			</div>
			
			
			<div class="col-md-3 col-md-offset-2">
			  <a href="search_state.php?x=5">
				<img src="pic/shop3.jpg" class="img-responsive img-rounded" /> 
			    <h2 style="text-align: center;color:white;text-shadow: 3px 3px 5px black;font-weight: bold;">Shop</h2>
			   </a>
			</div>
				
		</div> <!-- Row div end here -->
		
   
   </div>
   
   <footer id="the_footer" style="height:100px;background:rgb(140,14,14);">
	<p style="text-align:center;color:rgb(200,200,200);font-size: 20px;padding-top:30px;">
		 (c) Copyright 2016 @ RoomWeb. All Rights Reserved.
	</p>
  </footer>
  
  </body>
 
</html>

