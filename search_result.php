<?php 
include('includes/setup.php');

  $x = $_GET['x'];
  $y="";
  switch ($x) {
      case 1: $y = 'room_detail';
	          $z = 'state';
	          $c  = 'city';
              break;
     
	  case 2: $y = 'paying_guest_detail';
	          $z = 'pg_state';
	  		  $c  = 'pg_city';
              break;
	  
	  case 3: $y = 'hostel_detail';
              $z = 'hostel_state';
	  		  $c  = 'hostel_city';
              break;
	  
	  case 4: $y = 'flat_detail';
              $z = 'state';
	  		  $c  = 'city';
			  break;

	  case 5: $y = 'shop_detail';
              $z = 'shop_state'; 
	  		  $c = 'shop_city';   
				   break;	  
      default:$y = 'room_detail';
	          $z = 'state';
	          $c  = 'city';
          break;
  }

	
	

?>
 
 <?php
     $state_err=$state="";
     $flag=0;
	 $set_submit=0;
	if(isset($_POST['submit']))
	  {  
	  	$set_submit=1;
			 //  State
		    if (($_POST['state'])=='Select Your State') {
		     $state_err = "Require state name";
		   } 
		   else {
		     $state= test_input($_POST['state']);
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
<html lang="en">
<head>
  <title>Search City | RoomWeb</title>
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

		<div class="container-fluid" style="height: 700px;background: rgba(240,0,0,.6);padding:10px;overflow: auto;">
			<div style="background: rgba(0,0,0,.5); padding:15px;">
			
			<div class="row">
				
				<div class="col-md-4" style="overflow: auto;">
					
								

					
					<form role="form"  id="dash_second_table" method="POST" action="search_city.php?s=<?php echo $state.'&x='.$x;?>">
						  	<div id="inner">
							    <div class="form-group">
						    	   <label for="room_for">Cities:</label> 
						  
						  <?php  
						          
						          if($set_submit){
										  if(empty($state_err))
										    {
										       $query = "SELECT * from $y where $z = '$state' AND available=1";
											    $result= mysqli_query($dbc,$query) or die(mysql_error());
											    
											 if (mysqli_num_rows($result)==0){
													
													echo "<div style='font-size:24px;color:white;'> Not Available </div>";
												}
												
											 else{
											 	$flag=1;
												while($row = mysqli_fetch_assoc($result)){
													
											  echo "<label style='width:220px;'>";
									           echo "<p style='font-size:18px;color:white;'>  <input type='radio' name='city' value='$row[$c]'> $row[$c] </p>";
									          echo "</label>";
         
												}
											 }
											
												
											}
										
											
										  else{
										  	echo "<p style='font-size:18px;color:white;font-weight:bold;'>Please Select State Name</p>";
										  }
								  }
									 
								
									?>   									    
							     </div>
							     
							     <?php
							     if($flag){ 
							     echo "<button type='submit' class='btn btn-default' id='button_id' name='search'>Search</button>";
							     }
								 ?>
							     
							  </div>
							  
							  
						  </form>
						  
				</div>
				
				<div class="col-md-6 col-md-offset-2" >
					<?php
					 
					if(!$flag)
					   {
					   	echo "<img src='pic/sorry1.jpg' class='img-responsive' >";	
					   	echo "<p style='font-size:24px;color:white;font-weight:bold;'>No Result Found !</p>";
					   }
					   
					else{
								
						#############################
						######    Room Detail  ######
						#############################	
						
						if($x==1){
						$data = "SELECT * from $y where state = '$state' AND available=1 LIMIT 20";
						$result_data= mysqli_query($dbc,$data) or die(mysql_error());
						$number = mysqli_num_rows($result_data);
						echo "<p style='font-size:24px;color:white;font-weight:bold;'>We've Found $number Rooms!<hr></p>";
						while($row_data = mysqli_fetch_assoc($result_data)){
							$complete_data = '<span style=color:rgb(0,120,170);margin-left:10px;>  Contact : </span>'.$row_data['contact'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Location : </span>'.$row_data['location'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  No. of Rooms : </span>'.$row_data['no_of_rooms'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Rent : </span>'.$row_data['rent'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  City : </span>'.$row_data['city'].'<span style=color:rgb(0,120,170);margin-left:10px;>  State : </span>'.$row_data['state'].
                                              '<br><span style=color:rgb(0,120,170);margin-left:10px;>  Locality : </span>'.$row_data['near_by'].
                                              '<br><span style=color:rgb(0,120,170);margin-left:10px;>  Food : </span>'.$row_data['food'].'<span style=color:rgb(0,120,170);margin-left:10px;>  Internet : </span>'.$row_data['internet'].'<span style=color:rgb(0,120,170);margin-left:10px;>  Bed with Fan : </span>'.$row_data['bed_fan'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Laundry : </span>'.$row_data['laundry'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Kitchen : </span>'.$row_data['kitchen'].'<span style=color:rgb(0,120,170);margin-left:10px;>  For : </span>'.$row_data['for_whom'].'<hr>';							
					
					echo "<div style='color:rgba(210,210,210,1);font-size:20px;'>$complete_data</div>";
						}
						
					 }
					
					
					#############################
					######    PG   Detail  ######
					#############################	
					
                       else	if($x==2){
						$data = "SELECT * from $y where $z = '$state' AND available=1 LIMIT 20";
						$result_data= mysqli_query($dbc,$data) or die(mysql_error());
						$number = mysqli_num_rows($result_data);
						echo "<p style='font-size:24px;color:white;font-weight:bold;'>We've Found $number Paying Guest!<hr></p>";
						while($row_data = mysqli_fetch_assoc($result_data)){
							$complete_data = '<span style=color:rgb(0,120,170);margin-left:10px;>  Contact : </span>'.$row_data['contact'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Location : </span>'.$row_data['pg_location'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  No. of Rooms : </span>'.$row_data['pg_no_of_rooms'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Rent : </span>'.$row_data['pg_rent'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  City : </span>'.$row_data['pg_city'].'<span style=color:rgb(0,120,170);margin-left:10px;>  State : </span>'.$row_data['pg_state'].
                                              '<br><span style=color:rgb(0,120,170);margin-left:10px;>  Locality : </span>'.$row_data['pg_near_by'].
                                              '<br><span style=color:rgb(0,120,170);margin-left:10px;>  Food : </span>'.$row_data['pg_food'].'<span style=color:rgb(0,120,170);margin-left:10px;>  Internet : </span>'.$row_data['pg_internet'].'<span style=color:rgb(0,120,170);margin-left:10px;>  Bed with Fan : </span>'.$row_data['pg_bed_fan'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Laundry : </span>'.$row_data['pg_laundry'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Kitchen : </span>'.$row_data['pg_kitchen'].'<span style=color:rgb(0,120,170);margin-left:10px;>  For : </span>'.$row_data['pg_for_whom'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Facility/Detail : </span>'.$row_data['pg_facility'].
                                               '<hr>';							
					
					echo "<div style='color:rgba(210,210,210,1);font-size:20px;'>$complete_data</div>";
						}
						
					 }
					
					#############################
					######  Hostel Detail  ######
					#############################	
					
                       else	if($x==3){
						$data = "SELECT * from $y where $z = '$state' AND available=1 LIMIT 20";
						$result_data= mysqli_query($dbc,$data) or die(mysql_error());
						$number = mysqli_num_rows($result_data);
						echo "<p style='font-size:24px;color:white;font-weight:bold;'>We've Found $number Hostels!<hr></p>";
						while($row_data = mysqli_fetch_assoc($result_data)){
							$complete_data = '<span style=color:rgb(0,120,170);margin-left:10px;>  Contact : </span>'.$row_data['contact'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Location : </span>'.$row_data['hostel_location'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  No. of Rooms : </span>'.$row_data['hostel_no_of_rooms'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Rent : </span>'.$row_data['hostel_rent'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  City : </span>'.$row_data['hostel_city'].'<span style=color:rgb(0,120,170);margin-left:10px;>  State : </span>'.$row_data['hostel_state'].
                                              '<br><span style=color:rgb(0,120,170);margin-left:10px;>  Locality : </span>'.$row_data['hostel_near_by'].
                                              '<br><span style=color:rgb(0,120,170);margin-left:10px;>  Food : </span>'.$row_data['hostel_food'].'<span style=color:rgb(0,120,170);margin-left:10px;>  Internet : </span>'.$row_data['hostel_internet'].'<span style=color:rgb(0,120,170);margin-left:10px;>  Bed with Fan : </span>'.$row_data['hostel_bed_fan'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Laundry : </span>'.$row_data['hostel_laundry'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Kitchen : </span>'.$row_data['hostel_kitchen'].'<span style=color:rgb(0,120,170);margin-left:10px;>  For : </span>'.$row_data['hostel_for_whom'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Facility/Detail : </span>'.$row_data['hostel_facility'].
                                               '<hr>';							
					
					echo "<div style='color:rgba(210,210,210,1);font-size:20px;'>$complete_data</div>";
						}
						
					 }

					#############################
					######   Flat  Detail  ######
					#############################	
					
                       else	if($x==4){
						$data = "SELECT * from $y where $z = '$state' AND available=1 LIMIT 20";
						$result_data= mysqli_query($dbc,$data) or die(mysql_error());
						$number = mysqli_num_rows($result_data);
						echo "<p style='font-size:24px;color:white;font-weight:bold;'>We've Found $number Flats!<hr></p>";
						while($row_data = mysqli_fetch_assoc($result_data)){
							$complete_data = '<span style=color:rgb(0,120,170);margin-left:10px;>  Contact : </span>'.$row_data['contact'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Overlooking : </span>'.$row_data['overlooking'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  No. of Rooms : </span>'.$row_data['no_rooms'].'<span style=color:rgb(0,120,170);margin-left:10px;> Bathrooms : </span>'.$row_data['bathrooms'].
							                 '<span style=color:rgb(0,120,170);margin-left:10px;>  Balconies : </span>'.$row_data['balconies'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Rent : </span>'.$row_data['rent'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  City : </span>'.$row_data['city'].'<span style=color:rgb(0,120,170);margin-left:10px;>  State : </span>'.$row_data['state'].
                                              '<br><span style=color:rgb(0,120,170);margin-left:10px;>  Location : </span>'.$row_data['flat_address'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Flat for : </span>'.$row_data['flat_for'].'<span style=color:rgb(0,120,170);margin-left:10px;>  Area : </span>'.$row_data['area'].
                                              '<br><span style=color:rgb(0,120,170);margin-left:10px;>  Facility/Detail : </span>'.$row_data['detail'].
                                               '<hr>';							
					
					echo "<div style='color:rgba(210,210,210,1);font-size:20px;'>$complete_data</div>";
						}
						
					 }
					
					#############################
					######   Shop  Detail  ######
					#############################	
					
                       else	if($x==5){
						$data = "SELECT * from $y where $z = '$state' AND available=1 LIMIT 20";
						$result_data= mysqli_query($dbc,$data) or die(mysql_error());
						$number = mysqli_num_rows($result_data);
						echo "<p style='font-size:24px;color:white;font-weight:bold;'>We've Found $number Shops!<hr></p>";
						while($row_data = mysqli_fetch_assoc($result_data)){
							$complete_data = '<span style=color:rgb(0,120,170);margin-left:10px;>  Contact : </span>'.$row_data['contact'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Location : </span>'.$row_data['shop_address'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  No. of Shops : </span>'.$row_data['no_shop'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Rent : </span>'.$row_data['shop_rent'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  City : </span>'.$row_data['shop_city'].'<span style=color:rgb(0,120,170);margin-left:10px;>  State : </span>'.$row_data['shop_state'].
                                              '<br><span style=color:rgb(0,120,170);margin-left:10px;>  Locality : </span>'.$row_data['shop_first_pref'].
                                              '<span style=color:rgb(0,120,170);margin-left:10px;>  Shop For : </span>'.$row_data['shop_for'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Area : </span>'.$row_data['shop_area'].'<br><span style=color:rgb(0,120,170);margin-left:10px;>  Facility/Detail : </span>'.$row_data['shop_detail'].
                                               '<hr>';							
					
					echo "<div style='color:rgba(210,210,210,1);font-size:20px;'>$complete_data</div>";
						}
						
					 }
					
					
				 }  // else ends here line 165

			
					?>
					
					
				</div>
				
				
			</div>
			
		 </div>
			
		</div>
		


   </div>
   <footer id="the_footer" style="height:100px;background:rgb(140,14,14);">
	<p style="text-align:center;color:rgb(200,200,200);font-size: 20px;padding-top:30px;">
		 (c) Copyright 2016 @ RoomWeb. All Rights Reserved.
	</p>
  </footer>
  	
 
  </body>
 
 </html>