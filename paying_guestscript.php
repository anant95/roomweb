<?php

		 if(!isset($_SESSION['id'])) {
		      header("Location: index.php"); 
		      }
		
		include('includes/setup.php');
		
		$pg_address_err = $pg_no_room_err = $pg_rent_err = $pg_city_err = $pg_state_err =$pg_for_whom_err = $pg_for_err="";
		$pg_address = $pg_city = $pg_state =$pg_first_pref = $pg_food = $pg_rent = $pg_internet = $pg_kitchen = $pg_laundry = $pg_bed_fan = $pg_for_whom =$pg_for= $pg_facility="";
		$pg_no_room = 0;
		
		$all_error="";
		
		if(isset($_POST['submit'])){
			
				// 1. for Rent Sale or both
			
			    if (empty($_POST['radio_rent_sale'])) {
				     $pg_for_err = "Select Any One ";
				   } 
				   else {
				    $pg_for= test_input($_POST['radio_rent_sale']);
				   }
			    	

				   // Address or location of room
				   if (empty($_POST['address'])) {
				     $pg_address_err = "Enter Your Valid Address";
				   } 
				   else {
				     $pg_address= test_input($_POST['address']);
				   }
				 
				 				 
				 // Number of rooms 
				   if (empty($_POST['no_room'])) {
				     $pg_no_room_err = "Empty Field";
				   } else  if(ctype_digit($_POST['no_room'])) {
				     $pg_no_room = test_input($_POST['no_room']);
				   }else{$pg_no_room_err="Invalid Number.";}
				 
				 	
				 // Rent for rooms
				   if (empty($_POST['rent'])) {
				     $pg_rent_err = "Empty Field";
				   } else {
				     $pg_rent = test_input($_POST['rent']);
				   }
				 		
									
				   // city
				   if (empty($_POST['city'])) {
				     $pg_city_err = "Require city name";
				   } 
				   else {
				     $pg_city= test_input($_POST['city']);
				   }
				 
				 
				 // State
				    if (($_POST['state'])=='Select Your State') {
				    $pg_state_err = "Require state name";
				   } 
				   else {
				     $pg_state= test_input($_POST['state']);
				   }
					
				// Near By location
				   if (empty($_POST['first_pref'])) {
				     $pg_first_pref = "Not Available";
				   } 
				   else {
				    $pg_first_pref= test_input($_POST['first_pref']);
				   }

                 //facilities
                 
                 //1. food
				   if (empty($_POST['food'])) {
				    $pg_food = "No";
				   } 
				   else {
				     $pg_food= "Yes";
				   }
                  
				 //2. internet                 
                 if (empty($_POST['internet'])) {
				     $pg_internet = "No";
				   } 
				   else {
				    $pg_internet= "Yes";
				   }
				   
				 //3. Bed And Fan                 
                 if (empty($_POST['bed_fan'])) {
				     $pg_bed_fan = "No";
				   } 
				   else {
				    $pg_bed_fan= "Yes";
				   }
				   
				 //4. Laundry                
                 if (empty($_POST['laundry'])) {
				     $pg_laundry = "No";
				   } 
				   else {
				     $pg_laundry= "Yes";
				   }
				   
				   
				 //5. Kitchen             
                 if (empty($_POST['kitchen'])) {
				    $pg_kitchen = "No";
				   } 
				   else {
				    $pg_kitchen= "Yes";
				   }
				 
									
				   // other facility
				   if (empty($_POST['facilities'])) {
				    $pg_facility = "Not Available";
				   } 
				   else {
				   	  $pg_facility='<pre style="color:white;background:rgba(0,0,0,.3);font-family:Georgia;;font-size:18px;">';
				     $pg_facility.= test_input($_POST['facilities']);
					 $pg_facility.='</pre>';
				   }
				 		
							
			// for girls boys or for family  optradio
			
			    if (empty($_POST['optradio'])) {
				     $pg_for_whom_err = "Select Any One - Girls, Boys, Family, All";
				   } 
				   else {
				     $pg_for_whom= test_input($_POST['optradio']);
				   }
			    			   		
				
								   				   
                 $id = $_SESSION['id'];
				 $contact = $_SESSION['contact'];     
				 $username = $_SESSION['username'];

		 if(empty($pg_address_err)&&empty($pg_city_err)&&empty($pg_state_err)&&empty($pg_rent_err)&&empty($pg_no_room_err)&&empty($pg_for_whom_err)&&empty($pg_for_err)){
		     
			 // check whether entry is available or not
			 
			  $temp_query = "SELECT * FROM paying_guest_detail WHERE id = '$id' AND contact='$contact'";
			  $temp_result = mysqli_query($dbc,$temp_query) or die(mysql_error());
			 if(mysqli_num_rows($temp_result))
			    {
			    	$update_query = "UPDATE paying_guest_detail SET pg_location='$pg_address',pg_no_of_rooms='$pg_no_room',pg_rent='$pg_rent',pg_city='$pg_city',pg_state='$pg_state',
			    	                  pg_near_by='$pg_first_pref',pg_food='$pg_food',pg_internet='$pg_internet',pg_bed_fan='$pg_bed_fan',pg_laundry='$pg_laundry',pg_kitchen='$pg_kitchen',
			    	                  pg_for_whom='$pg_for_whom',pg_facility='$pg_facility',pg_for='$pg_for',available=1
			    	                  WHERE id='$id' AND contact='$contact'";
				    $update_result = mysqli_query($dbc,$update_query) or die(mysql_error());
				
						if($update_result)
		                header('Location:dashboard.php'); 
			 }
					
			    
			 else{
			  // insert in code here
			  $query="INSERT INTO paying_guest_detail(id,contact,pg_for,pg_location,pg_no_of_rooms,pg_rent,pg_city,pg_state,pg_near_by,pg_food,pg_internet,pg_bed_fan,pg_laundry,pg_kitchen,pg_facility,pg_for_whom)
			           values('$id','$contact','$pg_for','$pg_address','$pg_no_room','$pg_rent','$pg_city','$pg_state',
			          '$pg_first_pref','$pg_food','$pg_internet','$pg_bed_fan','$pg_laundry','$pg_kitchen','$pg_facility','$pg_for_whom')";
			  $result= mysqli_query($dbc,$query) or die(mysqli_error($dbc));
			  
			  
		if($result)
		  header('Location:dashboard.php'); 
			 }
			}
		 else{
		 	
			$all_error = '<br><br><span class="error">'."You have entered <b style='color:red;'>Wrong Entry</b> or left any <b style='color:red;'>Field Empty</b>".'</span> <br>';
			
			
		 }


 }  // if(isset['submit']) ends here 
 function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
 	

?>