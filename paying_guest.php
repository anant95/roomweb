<?php 
		session_start();
		 if(!isset($_SESSION['id'])) {
		      header("Location: index.php"); 
		      }
		
		include('includes/setup.php');
		include('includes/header2.php');
		include('paying_guestscript.php');

?>
<link rel="stylesheet" href="dashboard.css">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="font-size:19px;">
      	 <li><a href="dashboard.php">DashBoard</a></li>
         <li><a href="room.php">Room</a></li>
         <li><a href="flat.php">Flat</a></li>
         <li><a href="hostel.php">Hostel</a></li>
         <li  class="active"><a href="paying_guest.php">Paying Guest</a></li>
         <li><a href="shop.php">Shop</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right" style="font-size:19px;" >
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>


<!-- ****************** Navigation End **************************** -->

<!-- ****************** Main Section Start having 3 columns **************************** -->

     <div class="wrapper" style="background-image: url('pic/flat1.jpg');">
     	
     	 <div class="container-fluid">
     	 	
     	 	<div class="row">
     	 		
     	 		<div class="col-md-3" id="dash_fourth_table">
     	 			
	     	 		<div id="inner"style="height: auto;">
	     	 			<h4 style="text-align: center;"><?php echo strtoupper($_SESSION['username']);?></h4>
	     	 			<h5 style="text-align: center;"><?php echo $_SESSION['contact'];?></h5>
	     	 			<br /><br />
	     	 			<hr />
	     	 			<br />
	     	 			<br />
	     	 			<h6>Instructions:</h6>
	     	 			<br /><br />
	     	 			<p style="color:white;font-size: 21px;"><b>1.</b>  Fill Deatils Correctly So user can easily find your room.</p>
	     	 			<hr />
	     	 			<br />
	     	 			<p style="color:white;font-size: 21px;"><b>2. NearBy</b> : Enter your NearBy College, Hospital,Hotels, Industry, University etc 
	     	 				So user can search your room by all these things</p>
	     	 			<hr />
	     	 			<br />
	     	 			<p style="color:white;font-size: 21px;"><b>3.</b> Must Verify your room within a month : If room is not available for user make it unavailable by <b style="color:red">Unavailable Button</b> on your dashboard Otherwise 
	     	 				it seems to be available to the users</p>
	     	 				<br />
	     	 				<hr>
	     	 				<h1 style="text-align: center;color:white;text-shadow:2px 2px 4px black;margin:12px;font-weight: bold;">RoomFinder</h1>
	     	 				<br>
	     	 		</div>	
	     	 			
     	 		</div>
     	 			
     	 	    <div class="col-md-4 ">
     	 			
     	 			
						
						<form role="form"  id="dash_fourth_table" method="POST">
						  	<div id="inner">
						  	<h2 id="login_header" style="color: white;">Paying Guest</h2>
						  	<p style="color:rgb(200,230,230);font-size:16px;">* field are compulsory !</p>
						  	<hr />
						  	
				        <div class="form-group">   
				        	 
						        <label for="select_one">Select One * :</label>
						        <label class="radio-inline" style="width: 70px;">
							     <p> <input type="radio" checked="checked" name="radio_rent_sale" value="For Rent only">Rent </p>
							    </label>
							    <label class="radio-inline" style="width:70px;">
							     <p> <input type="radio" name="radio_rent_sale" value="For Sale only">Sale </p>
							    </label>
							    <label class="radio-inline" style="width:70px;">
							     <p> <input type="radio" name="radio_rent_sale" value=" For Rent & Sale both">Both </p>
							    </label>
						</div>						  	
				     <!-- Address Field -->	      
				          <div class="form-group">
						      <label for="address">Location * :</label>
						       <!-- address icon -->
						       <div class="input-group margin-bottom-sm">
						         <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
						         <i class="fa fa-map-marker fa-lg" style="color: rgb(255,255,255);"></i></span>
						         <input type="text" class="form-control" id="address" required="required" placeholder="Enter Address of room" name="address">
						       </div>
						  </div>
						  
						  
						   
		           <!-- Number of Rooms -->
		                   <div class="form-group">
							   <label for="no_room">No of Rooms * :</label>
							   <!-- No of Room icon -->
							    <div class="input-group margin-bottom-sm">
							      <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
							      <i class="fa fa-bed fa-lg" style="color: rgb(255,255,255);"></i></span>
							      <input type="text" class="form-control" id="no_room" required="required" placeholder="Number Of rooms" name="no_room">
							     </div>
						    </div>
		        				   
				  <!-- Rent charges -->    
						    <div class="form-group"> 
						      <label for="rent">Rent * :</label>
						      <!-- password Icon -->
						      <div class="input-group">
						         <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);"><i class="fa fa-inr fa-lg"style="color: rgb(255,255,255);"></i></span>
						         <input type="text" class="form-control" id="rent" name="rent" required="required" placeholder="Enter Rent for your room">
						      </div>
						    </div>
						    
					<!-- City Preferrence -->
				           <div class="form-group">
							   <label for="city">city * :</label>
							   <!--  city icon -->
							    <div class="input-group margin-bottom-sm">
							      <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
							      <i class="fa fa-building-o fa-lg" style="color: rgb(255,255,255);"></i></span>
							      <input type="text" class="form-control" id="city" required="required" placeholder="Enter city name here." name="city">
							     </div>
						    </div>	
						    
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
				          
						    
					<!-- first Preferrence -->
				           <div class="form-group">
							   <label for="first_pref">NearBy :</label>
							   <!-- first preferrence icon -->
							    <div class="input-group margin-bottom-sm">
							      <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
							      <i class="fa fa-location-arrow fa-lg" style="color: rgb(255,255,255);"></i></span>
							      <input type="text" class="form-control"  id="first_pref" placeholder="Nearby College Hotel Institute.." name="first_pref">
							     </div>
						    </div>	
						   						    
						    
						    <div class="form-group">
						    	   <label for="room_for">Facilities * :</label> 
							            <label>
									     <p>  <input type="checkbox"  name="food"> Food </p>
									    </label>
									    <label>
									     <p> <input type="checkbox" name="internet"> Internet </p>
									    </label>
									    <label>
									     <p> <input type="checkbox" name="bed_fan"> Bed & Fan </p>
									    </label>
							            <label>
									     <p> <input type="checkbox" name="laundry"> laundry </p>
									    </label>
									    <label>
									     <p> <input type="checkbox" name="kitchen"> Kitchen </p>
									    </label>
									   <textarea class="form-control" rows="3" id="facilities" name="facilities" placeholder="Additional Facilities/details , Overlooking like garden, park etc"></textarea>
									   									    
							</div>							    
						    
						        <div class="form-group">   
						        	<label for="room_for">For * :</label>   
								        <label class="radio-inline" style="width: 50px;">
									     <p> <input type="radio" name="optradio" value="Girls only">Girls </p>
									    </label>
									    <label class="radio-inline" style="width:50px;">
									     <p> <input type="radio" name="optradio" value="Boys only">Boys </p>
									    </label>
									    <label class="radio-inline" style="width:70px;">
									     <p> <input type="radio" name="optradio" value="Families">Family </p>
									    </label>
									    <label class="radio-inline" style="width:50px;">
									     <p> <input type="radio" checked="checked" name="optradio" value="All">All </p>
									    </label>			 
								</div>	
								
				 
				        	    <button type="submit" class="btn btn-default" id="button_id" name="submit">Submit</button>
						    </div>
						 
						 </form>
     	 			
     	 		</div>
     	 	<!-- 	
     	 		<div class="col-md-5">
     	 			
     	 			<img class="img-responsive" src="pic/flat1.jpg" />
     	 			<img class="img-responsive" src="pic/flat4.jpg" />
     	 			
     	 		</div> -->
     	 		
     	 		<div class="col-md-3">
     	 			
     	 	        
     	 		  <?php
     	 		  
 	 		   		if((!$all_error) && isset($_POST['submit']))
     	 			  {
     	 			  		
					  }
     	 			
                      else{
                                echo $all_error;
					  }
     	 		  
     	 		  ?>
     	 			
     	 		
     	 		
     	 		</div>
     	 		
     	 		
     	 		
     	 	</div>
     	 	
     	 </div>
     	
     </div>
       	
  <footer id="the_footer" style="height:100px;background:rgb(140,14,14);">
	<p style="text-align:center;color:rgb(200,200,200);font-size: 20px;padding-top:30px;">
		 (c) Copyright 2016 @ RoomWeb. All Rights Reserved.
	</p>
  </footer>
      