<?php
session_start();
   include('includes/setup.php');
   $id = $_SESSION['id'];
   $contact = $_SESSION['contact'];
   
   $query = "UPDATE flat_detail SET available=1  WHERE id='$id' AND contact = '$contact'";
      $result = mysqli_query($dbc, $query);
        if($result)
		 	{
		 	echo 'Flat is Available Now !';
	  		  echo ' Refresh the page';
		
	
	}
	
?>