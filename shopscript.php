<?php

		 if(!isset($_SESSION['id'])) {
		      header("Location: index.php"); 
		      }
		
		include('includes/setup.php');
		
		$address_err  =  $no_shop_err  =  $shop_rent_err  =  $city_err  =  $state_err  =  $shop_for_err  =  $shop_area_err  =  "";
		$shop_address  =  $shop_city  =  $shop_state  =  $shop_first_pref = $shop_for  = $shop_area = $shop_detail = "";
		$no_shop  =  $shop_rent = 0;
		
		$all_error="";
		
		if(isset($_POST['submit'])){


			   // 1. for Rent Sale or both
			
			    if (empty($_POST['radio_rent_sale'])) {
				     $shop_for_err = "Select Any One ";
				   } 
				   else {
				     $shop_for= test_input($_POST['radio_rent_sale']);
				   }
			    			   		
				
				
				   // 2. Address or location of room
				   if (empty($_POST['address'])) {
				     $address_err = "Enter Your Valid Address";
				   } 
				   else {
				     $shop_address= test_input($_POST['address']);
				   }
				 

									
				   // 3. city
				   if (empty($_POST['city'])) {
				     $city_err = "Require city name";
				   } 
				   else {
				     $shop_city= test_input($_POST['city']);
				   }
				 
				 
				 // 4. State
				    if (($_POST['state'])=='Select Your State') {
				     $state_err = "Require state name";
				   } 
				   else {
				     $shop_state= test_input($_POST['state']);
				   }
				 				 
				 // 5. Number of shops 
				   if (empty($_POST['no_shop'])) {
				     $no_shop_err = "Empty Field";
				   } else  if(ctype_digit($_POST['no_shop'])) {
				     $no_shop = test_input($_POST['no_shop']);
				   }else{$no_shop_err="Invalid Number.";}
				 
				 	
				 // 6. Rent for rooms
				   if (empty($_POST['rent'])) {
				     $shop_rent_err = "Empty Field";
				   } else  {
				     $shop_rent = test_input($_POST['rent']);
				   }
				 		


					
				// 7. Near By location
				   if (empty($_POST['first_pref'])) {
				     $shop_first_pref = "Not Available";
				   } 
				   else {
				     $shop_first_pref= test_input($_POST['first_pref']);
				   }
				   
				 // 8. Area
				   if (empty($_POST['area'])) {
				     $shop_area_err = "Empty Field";
				   } 
				   else {
				     $shop_area = test_input($_POST['area']);
				   }  
				   
				   
				   					
				//9. Detail and Facilites
				   if (empty($_POST['facilities'])) {
				     $shop_detail = "Not Available";
				   } 
				   else {
				   	 $shop_detail='<pre style="color:white;background:rgba(0,0,0,.3);font-family:Georgia;;font-size:18px;">';
				     $shop_detail.= test_input($_POST['facilities']);
					 $shop_detail.='</pre>';
				   }

                
							
				   				   
                 $id = $_SESSION['id'];
				 $contact = $_SESSION['contact'];     
				 $username = $_SESSION['username'];

		 if(empty($address_err)&&empty($city_err)&&empty($state_err)&&empty($shop_rent_err)&&empty($no_shop_err)&&empty($shop_for_err)&&empty($shop_area_err)){
		     
			 // check whether entry is available or not
			 
			  $temp_query = "SELECT * FROM shop_detail WHERE id = '$id' AND contact='$contact'";
			  $temp_result = mysqli_query($dbc,$temp_query) or die(mysql_error());
			 if(mysqli_num_rows($temp_result))
			    {
			    	$update_query = "UPDATE shop_detail SET shop_for='$shop_for',shop_address='$shop_address',shop_city='$shop_city',shop_state='$shop_state',no_shop='$no_shop',shop_rent='$shop_rent',shop_first_pref='$shop_first_pref',
			                         shop_area='$shop_area',shop_detail='$shop_detail',available=1 WHERE id='$id' AND contact='$contact'";
				    $update_result = mysqli_query($dbc,$update_query) or die(mysql_error());
				
						if($update_result)
		                header('Location:dashboard.php'); 
			 }
					
			    
			 else{
			  // insert in code here
			  $query="INSERT INTO shop_detail(id,contact,shop_for,shop_address,shop_city,shop_state,no_shop,shop_rent,shop_first_pref,shop_area,shop_detail) values ('$id','$contact','$shop_for','$shop_address','$shop_city','$shop_state','$no_shop','$shop_rent','$shop_first_pref','$shop_area','$shop_detail')";
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