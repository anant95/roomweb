<?php
session_start();
   include('includes/setup.php');
   $id = $_SESSION['id'];
   $contact = $_SESSION['contact'];
   
   $query = "UPDATE hostel_detail SET available=0  WHERE id='$id' AND contact = '$contact'";
      $result = mysqli_query($dbc, $query);
        if($result)
		 	{
		 	echo 'Hostel is unavailable Now !';
	  		  echo ' Refresh the page';
		
	
	}
	
?>