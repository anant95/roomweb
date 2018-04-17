<?php 
session_start();
 if(!isset($_SESSION['id'])) {
      header("Location: index.php"); 
      }

include('includes/setup.php');
include('includes/header2.php');

$no_rooms=0;
$rent=0;
$available=0;
$location=$city=$username=$state=$first_pref=$food=$internet=$laundry=$bed_fan=$kitchen=$for_whom="";
$error_msg="";

  	 $id = $_SESSION['id'];
	 $username = $_SESSION['username'];
	 $contact = $_SESSION['contact'];
  	  $query = "SELECT * FROM room_detail WHERE id = '$id' AND contact = '$contact' AND available=1";
	  $result = mysqli_query($dbc, $query);
	  if(mysqli_num_rows($result)==1){
	  	$row = mysqli_fetch_assoc($result);
		 
		  $location = $row['location'];
		  $city = $row['city'];
		  $state = $row['state'];
		  $first_pref = $row['near_by'];
		  $rent = $row['rent'];
		  $food = $row['food'];
		  $internet = $row['internet'];
		  $laundry = $row['laundry'];
		  $bed_fan = $row['bed_fan'];
		  $kitchen = $row['kitchen'];
		  $for_whom = $row['for_whom'];
		  $no_rooms =$row['no_of_rooms'];	
		  $available = $row['available'];	
	  }
	  
#####################################################################
#########      Shop Variables and Script                 ############
#########                                                ############
#####################################################################

$shop_address  =  $shop_city  =  $shop_state  =  $shop_first_pref = $shop_for  = $shop_area = $shop_detail = "";
$no_shop  =  $shop_rent = $available_shop = 0;
   
   $query_shop = "SELECT * FROM shop_detail WHERE id = '$id' AND contact = '$contact' AND available=1";
	  $result_shop = mysqli_query($dbc, $query_shop);
	  if(mysqli_num_rows($result_shop)==1){
	  	$row_shop = mysqli_fetch_assoc($result_shop);
		 
		  $shop_address = $row_shop['shop_address'];
		  $shop_city = $row_shop['shop_city'];
		  $shop_state = $row_shop['shop_state'];
		  $shop_first_pref = $row_shop['shop_first_pref'];
		  $shop_rent = $row_shop['shop_rent'];
		  $shop_for = $row_shop['shop_for'];
		  $shop_detail = $row_shop['shop_detail'];
		  $no_shop = $row_shop['no_shop'];
		  $shop_area = $row_shop['shop_area'];
		  $available_shop = $row_shop['available'];	
	  }
	  
	 
#####################################################################
#########      Hostel Variable and Script                ############
#########                                                ############
#####################################################################

$hostel_address  =  $hostel_city  =  $hostel_state  =  $hostel_first_pref = $hostel_for  = $hostel_detail = "";
$hostel_food = $hostel_internet = $hostel_kitchen = $hostel_laundry = $hostel_bed_fan = "";
$hostel_facility = $hostel_for_whom = "";
$hostel_no_room =  $hostel_rent = $available_hostel = 0;
   
   $query_hostel = "SELECT * FROM hostel_detail WHERE id = '$id' AND contact = '$contact' AND available=1";
	  $result_hostel = mysqli_query($dbc, $query_hostel);
	  if(mysqli_num_rows($result_hostel)==1){
	  	$row_hostel = mysqli_fetch_assoc($result_hostel);
		 
		  $hostel_address = $row_hostel['hostel_location'];
		  $hostel_city = $row_hostel['hostel_city'];
		  $hostel_state = $row_hostel['hostel_state'];
		  $hostel_first_pref = $row_hostel['hostel_near_by'];
		  $hostel_rent = $row_hostel['hostel_rent'];
		  $hostel_for = $row_hostel['hostel_for'];
		  $hostel_detail = $row_hostel['hostel_facility'];
		  $hostel_no_room = $row_hostel['hostel_no_of_rooms'];
		  $hostel_for_whom = $row_hostel['hostel_for_whom'];
		  $hostel_food = $row_hostel['hostel_food'];
		  $hostel_internet = $row_hostel['hostel_internet'];
		  $hostel_bed_fan = $row_hostel['hostel_bed_fan'];
		  $hostel_laundry = $row_hostel['hostel_laundry'];
		  $hostel_kitchen = $row_hostel['hostel_kitchen'];
		  $available_hostel = $row_hostel['available'];	
	  }
	  
		 
#####################################################################
#########      Paying Guest Variable and Script          ############
#########                                                ############
#####################################################################

$pg_address  = $pg_city  =  $pg_state  =  $pg_first_pref = $pg_for  =$pg_detail = "";
$pg_food = $pg_internet = $pg_kitchen = $pg_laundry = $pg_bed_fan = "";
$pg_facility = $pg_for_whom = "";
$pg_no_room =  $pg_rent = $available_pg = 0;
   
   $query_pg = "SELECT * FROM paying_guest_detail WHERE id = '$id' AND contact = '$contact' AND available=1";
	  $result_pg = mysqli_query($dbc, $query_pg);
	  if(mysqli_num_rows($result_pg)==1){
	  	$row_pg = mysqli_fetch_assoc($result_pg);
		 
		  $pg_address = $row_pg['pg_location'];
		  $pg_city = $row_pg['pg_city'];
		  $pg_state = $row_pg['pg_state'];
		  $pg_first_pref = $row_pg['pg_near_by'];
		  $pg_rent = $row_pg['pg_rent'];
		  $pg_for = $row_pg['pg_for'];
		  $pg_detail = $row_pg['pg_facility'];
		  $pg_no_room = $row_pg['pg_no_of_rooms'];
		  $pg_for_whom = $row_pg['pg_for_whom'];
		  $pg_food = $row_pg['pg_food'];
		  $pg_internet = $row_pg['pg_internet'];
		  $pg_bed_fan = $row_pg['pg_bed_fan'];
		  $pg_laundry = $row_pg['pg_laundry'];
		  $pg_kitchen = $row_pg['pg_kitchen'];
		  $available_pg = $row_pg['available'];	
	  }
	  
#####################################################################
#########      Flat Variable and Script                  ############
#########                                                ############
#####################################################################

 $flat_address  =  $flat_city  =  $flat_state  = $overlooking = $flat_rent ="";

$flat_for  = $flat_area = $flat_detail = "";

 $flat_no_room  = $flat_no_bathroom = $flat_no_balcony  = 0;
 $available_flat = 0; 
   $query_flat = "SELECT * FROM flat_detail WHERE id = '$id' AND contact = '$contact' AND available=1";
	  $result_flat = mysqli_query($dbc, $query_flat);
	  if(mysqli_num_rows($result_flat)==1){
	  	$row_flat = mysqli_fetch_assoc($result_flat);
		 
		  $flat_address = $row_flat['flat_address'];
		  $flat_city = $row_flat['city'];
		  $flat_state = $row_flat['state'];
		 
		  $flat_rent = $row_flat['rent'];
		  $flat_for = $row_flat['flat_for'];
		  $flat_detail = $row_flat['detail'];
		  $flat_no_room = $row_flat['no_rooms'];
		  $flat_no_bathroom = $row_flat['bathrooms'];
		  $flat_no_balcony = $row_flat['balconies'];
		  $overlooking = $row_flat['overlooking'];
		  $flat_area = $row_flat['area'];
		  $available_flat = $row_flat['available'];	
	  }
	  

	
?>
<link rel="stylesheet" href="dashboard.css">
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
      	<li><a href="change_password.php"><span class="fa fa-cog"></span> change password</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- ********************************************** -->

<div id="wrapper">
	<div class="container-fluid">
	 <div class="row">
	 	<div class="col-md-3" id="dash_third_table" style="height:170px;"> 
	 		<div id="inner" style="padding-bottom:50px;">
	 		 <p style="text-align: center;margin-top:25px;font-size:30px;color:white;"><?php echo 'Name : '. strtoupper($_SESSION['username']);?></p>
	       </div>
	     </div>
	 	<!-- Username or Image Column End -->
	 	
	 	<div class="col-md-9" id="dash_first" style="height:170px">
		 		<div id="inner">
		 	<!-- Basic Information Above the Tables -->	
		 		
		 		 	<?php 
		 		 	$basic_query = "SELECT * FROM user WHERE contact = '$contact'";
						  $basic_result = mysqli_query($dbc,$basic_query);
						  if(mysqli_num_rows($basic_result)==1){
						  	$basic_row = mysqli_fetch_assoc($basic_result);
		 		 	echo '<div style="font-size:27px;color:white;">';
		 		 	echo '<span style="color:rgb(225,15,10);">Mobile :</span> '.$basic_row['contact'].'<br>'.'<span style="color:rgb(225,15,10);">Hometown : </span>'.$basic_row['city'].'<br>'.'<span style="color:rgb(225,15,10);">State :</span> '.$basic_row['state'];
		 		 	echo '</div>';
						  }
		 		 	 ?>
				</div>
	 		</div>

	 	
	 </div>
	<!-- Row 1 End-->

   <div class="row">
   	   <div class="col-md-4" id="dash_first">
   	   	<div id="inner">
   	  <!-- 	<div class="table-responsive"> -->
   	  	<div class="table-responsive" style="height:700px;overflow:auto;"> 
   	   	 <h5>Single Room</h5>
			              
			  <table class="table table-condensed">
			    <tbody>
			      <tr>
			      	
			        <td>Location</td>
			        <td><?php echo $location;?></td>
			        
			      </tr>
			      
			      <tr>
			        <td>Contact</td>
			        <td><?php 
			               if($available)
			               echo $contact;
						   else
						   	echo '';
			            ?>
			            
			        </td>
			        
			      </tr>
			      
			      <tr>
			      	
			        <td>City</td>
			        <td><?php echo $city;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>State</td>
			        <td><?php echo $state;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>Locality</td>
			        <td><?php echo $first_pref;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Number Of Rooms</td>
			        <td><?php if($no_rooms)
			               echo $no_rooms;
			             else echo' ';?></td>
	
			      </tr>
			       <tr>
			      	
			        <td>Rent</td>
			        <td><?php if($rent)
			               echo '<i class="fa fa-inr fa-md"style="color: rgb(255,255,255);"></i> '.$rent;
			             else echo'';?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Food</td>
			        <td><?php echo $food;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>Internet</td>
			        <td><?php echo $internet;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Laundry</td>
			        <td><?php echo $laundry;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Kitchen</td>
			        <td><?php echo $kitchen;?></td>
	
			      </tr>
			      	
			       <tr>
			      	
			        <td>Bed & Fan</td>
			        <td><?php echo $bed_fan;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Rooms for</td>
			        <td><?php echo $for_whom;?></td>
	
			      </tr>
			      
			       <tr>
			       	
			        <td><button type="button" id="avail_room" style="background: rgb(0,80,40);color:white;padding:5px;margin-top:10px;">Available</button></td>
			        <td><button type="button" id="unavail_room" style="background: rgb(140,10,10);color:white;padding:5px;margin-top:10px;">Unavailable</button></td>
	
			      </tr>

			    </tbody>
			  </table>
			  </div>
	
	<script>
	
			$(function (){
				$('#avail_room').click(function (){
					
					$.ajax({
						
					url:'available.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
			
						$(function (){
				$('#unavail_room').click(function (){
					
					$.ajax({
						
					url:'unavailable.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
		
			
		</script>

   	 <!--  	</div> -->
   	   	<!-- End of Div of responsive table single room -->
   	    </div>
   	   </div>
   	   <!-- Column 1 for single room details -->
   	   <div class="col-md-4" id="dash_second_table">
   	   	    <div id="inner">
	      <div class="table-responsive" style="height:700px;overflow:auto;">
	   	   	 <h5>Shop</h5>
	        	              
			<table class="table table-condensed">
			    <tbody>
			    	
			       <tr>
			      	
			        <td>Shop </td>
			        <td><?php echo $shop_for;?></td>
	
			      </tr>
			      <tr>
			      	
			        <td>Location</td>
			        <td><?php echo $shop_address;?></td>
			        
			      </tr>
			      
			      <tr>
			        <td>Contact</td>
			        <td><?php 
			               if($available_shop)
			               echo $contact;
						   else
						   	echo '';
			            ?>
			            
			        </td>
			        
			      </tr>
			      
			      <tr>
			      	
			        <td>City</td>
			        <td><?php echo $shop_city;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>State</td>
			        <td><?php echo $shop_state;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>NearBy</td>
			        <td><?php echo $shop_first_pref;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Number Of Shops</td>
			        <td><?php if($no_shop)
			               echo $no_shop;
			             else echo' ';?></td>
	
			      </tr>
			       <tr>
			      	
			        <td>Rent</td>
			        <td><?php if($shop_rent)
			               echo '<i class="fa fa-inr fa-md"style="color: rgb(255,255,255);"></i> '.$shop_rent;
			             else echo '';?></td>
	
			      </tr>
			      <tr>
			      	
			        <td>Shop Area</td>
			        <td><?php echo $shop_area;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>Details</td>
			        <td style="width:50px;"><?php if($shop_detail=='<pre style="color:white;background:rgba(0,0,0,.5);font-family:Georgia;;font-size:18px;"></pre>') echo 'No more details available ';
			        	                           else echo $shop_detail; ?></td>
	
			      </tr>
			      

			       <tr>
			       	
			        <td><button type="button" id="avail_shop" style="background: rgb(0,80,40);color:white;padding:5px;margin-top:10px;">Available</button></td>
			        <td><button type="button" id="unavail_shop" style="background: rgb(140,10,10);color:white;padding:5px;margin-top:10px;">Unavailable</button></td>
	
			      </tr>

			    </tbody>
			  </table>
			  </div>
	
	<script>
	
			$(function (){
				$('#avail_shop').click(function (){
					
					$.ajax({
						
					url:'available_shop.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
			
						$(function (){
				$('#unavail_shop').click(function (){
					
					$.ajax({
						
					url:'unavailable_shop.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
		
			
		</script>
	   	   	
	   	   	  </div> 	   
          	<!-- End of Div of responsive table flat/pg/hostel -->
   	   	
   	   </div>
   	   <!-- Column 2 ends for PG,Hostel,Flat details -->
   	   <div class="col-md-4" id="dash_third_table">
   	   	  <div id="inner">
	       <div class="table-responsive" style="height:700px;overflow:auto;">
	   	   	 <h5>Hostel</h5>
				              
				   	              
			<table class="table table-condensed">
			    <tbody>
			    	
			       <tr>
			      	
			        <td>Hostel </td>
			        <td><?php echo $hostel_for;?></td>
	
			      </tr>
			      <tr>
			      	
			        <td>Location</td>
			        <td><?php echo $hostel_address;?></td>
			        
			      </tr>
			      
			      <tr>
			        <td>Contact</td>
			        <td><?php 
			               if($available_hostel)
			               echo $contact;
						   else
						   	echo '';
			            ?>
			            
			        </td>
			        
			      </tr>
			      
			      <tr>
			      	
			        <td>City</td>
			        <td><?php echo $hostel_city;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>State</td>
			        <td><?php echo $hostel_state;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>NearBy</td>
			        <td><?php echo $hostel_first_pref;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Number Of Rooms</td>
			        <td><?php if($hostel_no_room)
			               echo $hostel_no_room;
			             else echo' ';?></td>
	
			      </tr>
			       <tr>
			      	
			        <td>Rent</td>
			        <td><?php if($hostel_rent)
			               echo '<i class="fa fa-inr fa-md"style="color: rgb(255,255,255);"></i> '.$hostel_rent;
			             else echo '';?></td>
	
			      </tr>

			      
			      <tr>
			      	
			        <td>Details</td>
			        <td style="width:50px;"><?php if($hostel_detail=='<pre style="color:white;background:rgba(0,0,0,.5);font-family:Georgia;;font-size:18px;"></pre>') echo 'No more details available ';
			        	                           else echo $hostel_detail; ?></td>
	
			      </tr>
			      			       <tr>
			      	
			        <td>Food</td>
			        <td><?php echo $hostel_food;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>Internet</td>
			        <td><?php echo $hostel_internet;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Laundry</td>
			        <td><?php echo $hostel_laundry;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Kitchen</td>
			        <td><?php echo $hostel_kitchen;?></td>
	
			      </tr>
			      	
			       <tr>
			      	
			        <td>Bed & Fan</td>
			        <td><?php echo $hostel_bed_fan;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Rooms for</td>
			        <td><?php echo $hostel_for_whom;?></td>
	
			      </tr>
			      

			       <tr>
			       	
			        <td><button type="button" id="avail_hostel" style="background: rgb(0,80,40);color:white;padding:5px;margin-top:10px;">Available</button></td>
			        <td><button type="button" id="unavail_hostel" style="background: rgb(140,10,10);color:white;padding:5px;margin-top:10px;">Unavailable</button></td>
	
			      </tr>

			    </tbody>
			  </table>
			  </div>
	
	<script>
	
			$(function (){
				$('#avail_hostel').click(function (){
					
					$.ajax({
						
					url:'available_hostel.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
			
						$(function (){
				$('#unavail_hostel').click(function (){
					
					$.ajax({
						
					url:'unavailable_hostel.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
		
			
		</script>
	   	   	
	   	   	   	   
          	<!-- End of Div of responsive table Shop -->
   	   	   	   	  
   	   	  
   	   	  </div>
   	   	
   	   </div>
   	   <!-- Column 3 for shop details -->
   	</div>
   	<div class="row">

 <div class="col-md-6" id="dash_fourth_table">
   	   	  <div id="inner">
	       	 <div class="table-responsive" style="height:500px;overflow:auto;">
	   	   	 <h5>Paying Guest</h5>
			              
				  <table class="table table-condensed">
			    <tbody>
			    	
			       <tr>
			      	
			        <td>PG </td>
			        <td><?php echo $pg_for;?></td>
	
			      </tr>
			      <tr>
			      	
			        <td>Location</td>
			        <td><?php echo $pg_address;?></td>
			        
			      </tr>
			      
			      <tr>
			        <td>Contact</td>
			        <td><?php 
			               if($available_pg)
			               echo $contact;
						   else
						   	echo '';
			            ?>
			            
			        </td>
			        
			      </tr>
			      
			      <tr>
			      	
			        <td>City</td>
			        <td><?php echo $pg_city;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>State</td>
			        <td><?php echo $pg_state;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>NearBy</td>
			        <td><?php echo $pg_first_pref;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Number Of Rooms</td>
			        <td><?php if($pg_no_room)
			               echo $pg_no_room;
			             else echo' ';?></td>
	
			      </tr>
			       <tr>
			      	
			        <td>Rent</td>
			        <td><?php if($pg_rent)
			               echo '<i class="fa fa-inr fa-md"style="color: rgb(255,255,255);"></i> '.$pg_rent;
			             else echo '';?></td>
	
			      </tr>

			      
			      <tr>
			      	
			        <td>Details</td>
			        <td style="width:50px;"><?php if($pg_detail=='<pre style="color:white;background:rgba(0,0,0,.5);font-family:Georgia;;font-size:18px;"></pre>') echo 'No more details available ';
			        	                           else echo $pg_detail; ?></td>
	
			      </tr>
			      			       <tr>
			      	
			        <td>Food</td>
			        <td><?php echo $pg_food;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>Internet</td>
			        <td><?php echo $pg_internet;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Laundry</td>
			        <td><?php echo $pg_laundry;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Kitchen</td>
			        <td><?php echo $pg_kitchen;?></td>
	
			      </tr>
			      	
			       <tr>
			      	
			        <td>Bed & Fan</td>
			        <td><?php echo $pg_bed_fan;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Rooms for</td>
			        <td><?php echo $pg_for_whom;?></td>
	
			      </tr>
			      

			       <tr>
			       	
			        <td><button type="button" id="avail_pg" style="background: rgb(0,80,40);color:white;padding:5px;margin-top:10px;">Available</button></td>
			        <td><button type="button" id="unavail_pg" style="background: rgb(140,10,10);color:white;padding:5px;margin-top:10px;">Unavailable</button></td>
	
			      </tr>

			    </tbody>
			  </table>
	   	   </div>
	   	   	<script>
	
			$(function (){
				$('#avail_pg').click(function (){
					
					$.ajax({
						
					url:'available_pg.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
			
						$(function (){
				$('#unavail_pg').click(function (){
					
					$.ajax({
						
					url:'unavailable_pg.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
		
			
		</script>
	   	   	   	   
          	<!-- End of Div of responsive table Shop -->
   	   	   	   	  
   	   	  
   	   	  </div>
   	   	
   	   </div>
   	   <!-- Column 2 for selling details -->
 
 <div class="col-md-6" id="dash_first">
   	   	  <div id="inner">
	       <div class="table-responsive" style="height:500px;overflow:auto;"> 
	   	   	 <h5>Flat</h5>
				              
				   <table class="table table-condensed">
			    <tbody>
			    	
			       <tr>
			      	
			        <td>Flat </td>
			        <td><?php echo $flat_for;?></td>
	
			      </tr>
			      <tr>
			      	
			        <td>Location</td>
			        <td><?php echo $flat_address;?></td>
			        
			      </tr>
			      
			      <tr>
			        <td>Contact</td>
			        <td><?php 
			               if($available_flat)
			               echo $contact;
						   else
						   	echo '';
			            ?>
			            
			        </td>
			        
			      </tr>
			      
			      <tr>
			      	
			        <td>City</td>
			        <td><?php echo $flat_city;?></td>
	
			      </tr>
			      
			      <tr>
			      	
			        <td>State</td>
			        <td><?php echo $flat_state;?></td>
	
			      </tr>
			      
			       <tr>
			      	
			        <td>Number Of Rooms</td>
			        <td><?php if($flat_no_room)
			               echo $flat_no_room;
			             else echo' ';?></td>
	
			      </tr>

			       <tr>
			      	
			        <td>Number Of Bathrooms</td>
			        <td><?php if($flat_no_bathroom)
			               echo $flat_no_bathroom;
			             else echo' ';?></td>
	
			      </tr>	
			      
			      <tr>
			      	
			        <td>Number Of Balconies</td>
			        <td><?php if($flat_no_balcony)
			               echo $flat_no_balcony;
			             else echo' ';?></td>
	
			      </tr>	
			      <tr>
			      	
			        <td>Area</td>
			        <td><?php echo $flat_area;?></td>
	
			      </tr>
			     
			      <tr>
			      	
			        <td>OverLooking</td>
			        <td><?php echo $overlooking;?></td>
	
			      </tr>
			      		    

			       <tr>
			      	
			        <td>Rent</td>
			        <td><?php if($flat_rent)
			               echo '<i class="fa fa-inr fa-md"style="color: rgb(255,255,255);"></i> '.$flat_rent;
			             else echo '';?></td>
	
			      </tr>

			      
			      <tr>
			      	
			        <td>Details</td>
			        <td style="width:50px;"><?php if($flat_detail=='<pre style="color:white;background:rgba(0,0,0,.5);font-family:Georgia;;font-size:18px;"></pre>') echo 'No more details available ';
			        	                           else echo $flat_detail; ?></td>
	
			      </tr>
			      		

			       <tr>
			       	
			        <td><button type="button" id="avail_flat" style="background: rgb(0,80,40);color:white;padding:5px;margin-top:10px;">Available</button></td>
			        <td><button type="button" id="unavail_flat" style="background: rgb(140,10,10);color:white;padding:5px;margin-top:10px;">Unavailable</button></td>
	
			      </tr>

			    </tbody>
			  </table>
	   	   </div>
	   	   <script>
	
			$(function (){
				$('#avail_flat').click(function (){
					
					$.ajax({
						
					url:'available_flat.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
			
						$(function (){
				$('#unavail_flat').click(function (){
					
					$.ajax({
						
					url:'unavailable_flat.php',success:function(response){
						alert(response);
					}	
						
						
					});
					
				});
				
			});
		
			
		</script>
	   	   	   	   
          	<!-- End of Div of responsive table Shop -->
   	   	   	   	  
   	   	  
   	   	  </div>
   	   	
   	   </div>
   	   <!-- Column 2 for selling details -->
 
 
   <!-- Row 2 End -->
  </div>
  </div>
  <!-- Container Fluid End -->
	
</div>
	<!-- Wrapper End -->
	
  <footer id="the_footer" style="height:100px;background:rgb(140,14,14);">
	 <p style="text-align:center;color:rgb(200,200,200);font-size: 20px;padding-top:30px;">
		 (c) Copyright 2016 @ RoomWeb. All Rights Reserved.
	 </p>
  </footer>
	
</body>
</html>