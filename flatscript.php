<?php

		 if(!isset($_SESSION['id'])) {
		      header("Location: index.php"); 
		      }
		
		include('includes/setup.php');
		
		$address_err  =  $no_room_err = $no_bathroom_err =$no_balcony_err=  $flat_rent_err  =  $city_err  =  $state_err  =  $flat_for_err  =  $flat_area_err  =  "";
		$flat_address  =  $flat_city  =  $flat_state  = $overlooking = $flat_rent  = $flat_for  = $flat_area = $flat_detail = "";
		$no_room  = $no_bathroom = $no_balcony  = 0;
		
		#  $flat_first_pref = "";  No Need Because Overlooking is already present in form
		
		$all_error="";
		
		if(isset($_POST['submit'])){


			   // 1. for Rent Sale or both
			
			    if (empty($_POST['radio_rent_sale'])) {
				     $flat_for_err = "Select Any One ";
				   } 
				   else {
				     $flat_for= test_input($_POST['radio_rent_sale']);
				   }
			    			   		
				
				
				   // 2. Address or location of room
				   if (empty($_POST['address'])) {
				     $address_err = "Enter Your Valid Address";
				   } 
				   else {
				     $flat_address= test_input($_POST['address']);
				   }
				 

									
				   // 3. city
				   if (empty($_POST['city'])) {
				     $city_err = "Require city name";
				   } 
				   else {
				     $flat_city= test_input($_POST['city']);
				   }
				 
				 
				 // 4. State
				    if (($_POST['state'])=='Select Your State') {
				     $state_err = "Require state name";
				   } 
				   else {
				     $flat_state= test_input($_POST['state']);
				   }
				 				 
				 // 5. Number of room 
				   if (empty($_POST['no_room'])) {
				     $no_room_err = "Empty Field";
				   } else  if(ctype_digit($_POST['no_room'])) {
				     $no_room = test_input($_POST['no_room']);
				   }else{$no_room_err="Invalid Number.";}

				 				 
				 // 6. Number of Bathroom 
				   if (empty($_POST['bathrooms'])) {
				     $no_bathroom_err = "Empty Field";
				   } else  if(ctype_digit($_POST['bathrooms'])) {
				     $no_bathroom = test_input($_POST['bathrooms']);
				   }else{$no_bathroom_err="Invalid Number.";}

				 // 7. Number of Balcony
				   if (empty($_POST['balconies'])) {
				     $no_balcony_err = "Empty Field";
				   } else  if(ctype_digit($_POST['balconies'])) {
				     $no_balcony = test_input($_POST['balconies']);
				   }else{$no_balcony_err="Invalid Number.";}
				 					 				 
				// 8. OverLooking
				   if (empty($_POST['overlooking'])) {
				     $overlooking = "Not Available";
				   } 
				   else {
				     $overlooking= test_input($_POST['overlooking']);
				   }

				 	
				 // 9. Rent for rooms
				   if (empty($_POST['rent'])) {
				     $flat_rent_err = "Empty Field";
				   } else  {
				     $flat_rent = test_input($_POST['rent']);
				   }
				 		


					
				// 10. Near By location
				
				 
				 /*   if (empty($_POST['first_pref'])) {
				     $flat_first_pref = "Not Available";
				   } 
				   else {
				     $flat_first_pref= test_input($_POST['first_pref']);
				   }
				   
				 
				 */
				 
				 
				 // 11. Area
				   if (empty($_POST['area'])) {
				     $flat_area_err = "Empty Field";
				   } 
				   else {
				     $flat_area = test_input($_POST['area']);
				   }  
				   
				   
				   					
				//12. Detail and Facilites
				   if (empty($_POST['facilities'])) {
				     $flat_detail = "Not Available";
				   } 
				   else {
				   	 $flat_detail='<pre style="color:white;background:rgba(0,0,0,.3);font-family:Georgia;;font-size:18px;">';
				     $flat_detail.= test_input($_POST['facilities']);
					 $flat_detail.='</pre>';
				   }

                
							
				   				   
                 $id = $_SESSION['id'];
				 $contact = $_SESSION['contact'];     
				 $username = $_SESSION['username'];

		 if(empty($address_err)&&empty($city_err)&&empty($state_err)&&empty($flat_rent_err)&&empty($no_room_err)&&empty($flat_for_err)&&empty($flat_area_err)&&empty($no_bathroom_err)&&empty($no_balcony_err)){
		     
			 // check whether entry is available or not
			 
			  $temp_query = "SELECT * FROM flat_detail WHERE id = '$id' AND contact='$contact'";
			  $temp_result = mysqli_query($dbc,$temp_query) or die(mysql_error());
			 if(mysqli_num_rows($temp_result))
			    {
			    	$update_query = "UPDATE flat_detail SET flat_for='$flat_for',flat_address='$flat_address',city='$flat_city',state='$flat_state',no_rooms='$no_room',rent='$flat_rent',
			                         area='$flat_area',detail='$flat_detail',bathrooms='$no_bathroom',balconies='$no_balcony',overlooking='$overlooking',available=1 WHERE id='$id' AND contact='$contact'";
				    $update_result = mysqli_query($dbc,$update_query) or die(mysql_error());
				
						if($update_result)
		                header('Location:dashboard.php'); 
			 }
					
			    
			 else{
			  // insert in code here
			  $query="INSERT INTO flat_detail(id,contact,flat_for,flat_address,city,state,no_rooms,rent,area,detail,bathrooms,balconies,overlooking) values ('$id','$contact','$flat_for','$flat_address',
			                                '$flat_city','$flat_state','$no_room','$flat_rent','$flat_area','$flat_detail','$no_bathroom','$no_balcony','$overlooking')";
			  $result= mysqli_query($dbc,$query) or die(mysql_error());
			  
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