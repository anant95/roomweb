<?php

		 if(!isset($_SESSION['id'])) {
		      header("Location: index.php"); 
		      }
		
		include('includes/setup.php');
		
		$address_err=$no_room_err=$rent_err=$city_err=$state_err=$first_pref_err=$for_whom_err="";
		$address=$city=$state=$first_pref=$rent=$food=$internet=$kitchen=$laundry=$bed_fan=$for_whom="";
		$no_room=0;
		
		$all_error="";
		
		if(isset($_POST['submit'])){

				   // Address or location of room
				   if (empty($_POST['address'])) {
				     $address_err = "Enter Your Valid Address";
				   } 
				   else {
				     $address= test_input($_POST['address']);
				   }
				 
				 				 
				 // Number of rooms 
				   if (empty($_POST['no_room'])) {
				     $no_room_err = "Empty Field";
				   } else  if(ctype_digit($_POST['no_room'])) {
				     $no_room = test_input($_POST['no_room']);
				   }else{$no_room_err="Invalid Number.";}
				 
				 	
				 // Rent for rooms
				   if (empty($_POST['rent'])) {
				     $rent_err = "Empty Field";
				   } else {
				     $rent = test_input($_POST['rent']);
				   }
				 		
									
				   // city
				   if (empty($_POST['city'])) {
				     $city_err = "Require city name";
				   } 
				   else {
				     $city= test_input($_POST['city']);
				   }
				 
				 
				 // State
				    if (($_POST['state'])=='Select Your State') {
				     $state_err = "Require state name";
				   } 
				   else {
				     $state= test_input($_POST['state']);
				   }
					
				// Near By location
				   if (empty($_POST['first_pref'])) {
				     $first_pref = "Not Available";
				   } 
				   else {
				     $first_pref= test_input($_POST['first_pref']);
				   }

                 //facilities
                 
                 //1. food
				   if (empty($_POST['food'])) {
				     $food = "No";
				   } 
				   else {
				     $food= "Yes";
				   }
                  
				 //2. internet                 
                 if (empty($_POST['internet'])) {
				     $internet = "No";
				   } 
				   else {
				     $internet= "Yes";
				   }
				   
				 //3. Bed And Fan                 
                 if (empty($_POST['bed_fan'])) {
				     $bed_fan = "No";
				   } 
				   else {
				     $bed_fan= "Yes";
				   }
				   
				 //4. Laundry                
                 if (empty($_POST['laundry'])) {
				     $laundry = "No";
				   } 
				   else {
				     $laundry= "Yes";
				   }
				   
				   
				 //5. Kitchen             
                 if (empty($_POST['kitchen'])) {
				     $kitchen = "No";
				   } 
				   else {
				     $kitchen= "Yes";
				   }
				   			
							
			// for girls boys or for family  optradio
			
			    if (empty($_POST['optradio'])) {
				     $for_whom_err = "Select Any One - Girls, Boys, Family, All";
				   } 
				   else {
				     $for_whom= test_input($_POST['optradio']);
				   }
			    			   		
				
								   				   
                 $id = $_SESSION['id'];
				 $contact = $_SESSION['contact'];     
				 $username = $_SESSION['username'];

		 if(empty($address_err)&&empty($city_err)&&empty($state_err)&&empty($rent_err)&&empty($no_room_err)&&empty($for_whom_err)){
		     
			 // check whether entry is available or not
			 
			  $temp_query = "SELECT * FROM room_detail WHERE id = '$id' AND contact='$contact'";
			  $temp_result = mysqli_query($dbc,$temp_query) or die(mysql_error());
			 if(mysqli_num_rows($temp_result))
			    {
			    	$update_query = "UPDATE room_detail SET location='$address',no_of_rooms='$no_room',rent='$rent',city='$city',state='$state',near_by='$first_pref',food='$food'
			    	,internet='$internet',bed_fan='$bed_fan',laundry='$laundry',kitchen='$kitchen',for_whom='$for_whom',available=1 WHERE id='$id' AND contact='$contact'";
				    $update_result = mysqli_query($dbc,$update_query) or die(mysql_error());
				
						if($update_result)
		                header('Location:dashboard.php'); 
			 }
					
			    
			 else{
			  // insert in code here
			  $query="INSERT INTO room_detail (id,contact,location,no_of_rooms,rent,city,state,near_by,food,internet,bed_fan,laundry,kitchen,for_whom) values ('$id','$contact','$address','$no_room','$rent',
			                                   '$city','$state','$first_pref','$food','$internet','$bed_fan','$laundry','$kitchen','$for_whom')";
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