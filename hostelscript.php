<?php

		 if(!isset($_SESSION['id'])) {
		      header("Location: index.php"); 
		      }
		
		include('includes/setup.php');
		
		$hostel_address_err = $hostel_no_room_err = $hostel_rent_err = $hostel_city_err = $hostel_state_err = $hostel_for_whom_err = $hostel_for_err="";
		$hostel_address = $hostel_city =$hostel_rent= $hostel_state = $hostel_first_pref = $hostel_food = $hostel_internet = $hostel_kitchen = $hostel_laundry = $hostel_bed_fan = $hostel_for_whom =$hostel_for= $hostel_facility="";
		$hostel_no_room =0;
		
		$all_error="";
		
		if(isset($_POST['submit'])){
			
				// 1. for Rent Sale or both
			
			    if (empty($_POST['radio_rent_sale'])) {
				     $hostel_for_err = "Select Any One ";
				   } 
				   else {
				     $hostel_for= test_input($_POST['radio_rent_sale']);
				   }
			    	

				   // Address or location of room
				   if (empty($_POST['address'])) {
				     $hostel_address_err = "Enter Your Valid Address";
				   } 
				   else {
				     $hostel_address= test_input($_POST['address']);
				   }
				 
				 				 
				 // Number of rooms 
				   if (empty($_POST['no_room'])) {
				     $hostel_no_room_err = "Empty Field";
				   } else  if(ctype_digit($_POST['no_room'])) {
				     $hostel_no_room = test_input($_POST['no_room']);
				   }else{$hostel_no_room_err="Invalid Number.";}
				 
				 	
				 // Rent for rooms
				   if (empty($_POST['rent'])) {
				     $hostel_rent_err = "Empty Field";
				   } else {
				     $hostel_rent = test_input($_POST['rent']);
				   }
				 		
									
				   // city
				   if (empty($_POST['city'])) {
				     $hostel_city_err = "Require city name";
				   } 
				   else {
				     $hostel_city= test_input($_POST['city']);
				   }
				 
				 
				 // State
				    if (($_POST['state'])=='Select Your State') {
				     $hostel_state_err = "Require state name";
				   } 
				   else {
				     $hostel_state= test_input($_POST['state']);
				   }
					
				// Near By location
				   if (empty($_POST['first_pref'])) {
				     $hostel_first_pref = "Not Available";
				   } 
				   else {
				     $hostel_first_pref= test_input($_POST['first_pref']);
				   }

                 //facilities
                 
                 //1. food
				   if (empty($_POST['food'])) {
				     $hostel_food = "No";
				   } 
				   else {
				     $hostel_food= "Yes";
				   }
                  
				 //2. internet                 
                 if (empty($_POST['internet'])) {
				     $hostel_internet = "No";
				   } 
				   else {
				     $hostel_internet= "Yes";
				   }
				   
				 //3. Bed And Fan                 
                 if (empty($_POST['bed_fan'])) {
				     $hostel_bed_fan = "No";
				   } 
				   else {
				     $hostel_bed_fan= "Yes";
				   }
				   
				 //4. Laundry                
                 if (empty($_POST['laundry'])) {
				     $hostel_laundry = "No";
				   } 
				   else {
				     $hostel_laundry= "Yes";
				   }
				   
				   
				 //5. Kitchen             
                 if (empty($_POST['kitchen'])) {
				     $hostel_kitchen = "No";
				   } 
				   else {
				     $hostel_kitchen= "Yes";
				   }
				 
									
				   // other facility
				   if (empty($_POST['facilities'])) {
				     $hostel_facility = "Not Available";
				   } 
				   else {
				   	  $hostel_facility='<pre style="color:white;background:rgba(0,0,0,.3);font-family:Georgia;;font-size:18px;">';
				      $hostel_facility.= test_input($_POST['facilities']);
					  $hostel_facility.='</pre>';
				   }
				 		
							
			// for girls boys or for family  optradio
			
			    if (empty($_POST['optradio'])) {
				     $hostel_for_whom_err = "Select Any One - Girls, Boys, Family, All";
				   } 
				   else {
				     $hostel_for_whom= test_input($_POST['optradio']);
				   }
			    			   		
				
								   				   
                 $id = $_SESSION['id'];
				 $contact = $_SESSION['contact'];     
				 $username = $_SESSION['username'];

		 if(empty($hostel_address_err)&&empty($hostel_city_err)&&empty($hostel_state_err)&&empty($hostel_rent_err)&&empty($hostel_no_room_err)&&empty($hostel_for_whom_err)&&empty($hostel_for_err)){
		     
			 // check whether entry is available or not
			 
			  $temp_query = "SELECT * FROM hostel_detail WHERE id = '$id' AND contact='$contact'";
			  $temp_result = mysqli_query($dbc,$temp_query) or die(mysql_error());
			 if(mysqli_num_rows($temp_result))
			    {
			    	$update_query = "UPDATE hostel_detail SET hostel_location='$hostel_address',hostel_no_of_rooms='$hostel_no_room',hostel_rent='$hostel_rent',hostel_city='$hostel_city',hostel_state='$hostel_state',
			    	                  hostel_near_by='$hostel_first_pref',hostel_food='$hostel_food',hostel_internet='$hostel_internet',hostel_bed_fan='$hostel_bed_fan',hostel_laundry='$hostel_laundry',hostel_kitchen='$hostel_kitchen',
			    	                  hostel_for_whom='$hostel_for_whom',hostel_facility='$hostel_facility',hostel_for='$hostel_for',available=1
			    	                  WHERE id='$id' AND contact='$contact'";
				    $update_result = mysqli_query($dbc,$update_query) or die(mysql_error());
				
						if($update_result)
		                header('Location:dashboard.php'); 
			 }
					
			    
			 else{
			  // insert in code here
			  $query="INSERT INTO hostel_detail(id,contact,hostel_for,hostel_location,hostel_no_of_rooms,hostel_rent,hostel_city,hostel_state,hostel_near_by,hostel_food,hostel_internet,hostel_bed_fan,hostel_laundry,hostel_kitchen,hostel_facility,hostel_for_whom)
			           values('$id','$contact','$hostel_for','$hostel_address','$hostel_no_room','$hostel_rent','$hostel_city','$hostel_state',
			          '$hostel_first_pref','$hostel_food','$hostel_internet','$hostel_bed_fan','$hostel_laundry','$hostel_kitchen','$hostel_facility','$hostel_for_whom')";
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