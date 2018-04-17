<?php
session_start();
if($_SESSION['prompt0']||$_SESSION['prompt1']){

class SendOTP {
    private  $baseUrl = "https://sendotp.msg91.com/api";
    public function callGenerateAPI($request) {
        $data = array("countryCode" => "91", "mobileNumber" => $_SESSION['mobileNumber'],"getGeneratedOTP" => true);
        $data_string = json_encode($data);
        $ch = curl_init($this->baseUrl.'/generateOTP');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string),
            'application-Key:Nf6t6Q8A6eweA7rKMXD8ZbWMitwczN6rTbnmm_vyBgPZBcXH-f_6JT_4fH-Qx1Y50jFb9wTKykpzF1V3-iQm9zQuqjuLFjcyGyxvH-NSW1bum7Kh6QXgJL84dsWQxxQv8cNd3S0tBxzB0tuzGtUdog=='
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    public function saveOTP($OTP){
       //save OTP to your session
       $_SESSION["oneTimePassword"] = $OTP;
       // OR save the OTP to your database
       //connect db and save it to a table
       return true;
    }
    public function generateOTP($request){
        //call generateOTP API
        $response  = $this->callGenerateAPI($request);
        $response = json_decode($response,true);
        if($response["status"] == "error"){
            //customize this as per your framework
            $resp['message'] =  $response["response"]["code"];
            return json_encode($resp);
        }
        //save the OTP on your server
        if($this->saveOTP($response["response"]["oneTimePassword"])){
            $resp['message'] = "OTP SENT SUCCESSFULLY";
			header('location:prompt0.php');
            //return json_encode($resp);
			
        }
    }
    public function verifyOTP($request){
        //This is the sudo logic you have to customize it as needed.
        //your verify logic here
        if($_SESSION['otp'] == $_SESSION["oneTimePassword"]){
            $resp['message'] = "NUMBER VERIFIED SUCCESSFULLY";
      

      // ********************************************
	     $mysql_hostname = "127.0.0.1";
			$mysql_user = "root";
			$mysql_password = "krishna";
			$mysql_database = "roomfindertest";
			$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect mysql");
			
   
error_reporting(E_ALL ^ E_DEPRECATED);  
	  
	  //**********************************************
	  $city=$address=$state=$username=$password="";
	  $contact=0;
			$query = "SELECT * FROM temp WHERE contact = $_SESSION[mobileNumber]";
			 $result= mysqli_query($bd,$query) or die(mysql_error());
			 while($row=mysqli_fetch_assoc($result)){
			 
			$contact = $row['contact'];
			$username = $row['username'];
			$password = $row['password'];
			$city = $row['city'];
			$address = $row['address'];
			$state = $row['state'];
			 
			 }
			 
			$query1 = "INSERT INTO user(username,contact,password,address,city,state) VALUES('$username','$contact','$password','$address','$city','$state')";
			 $result1= mysqli_query($bd,$query1) or die(mysql_error());
		
			$query2 = "DELETE FROM temp WHERE contact=$_SESSION[mobileNumber]";
			 $result2= mysqli_query($bd,$query2) or die(mysql_error());
			
			  header('Location:prompt.php?x=0');
						
			//********************************************
			
        }
        else{
        	      // ********************************************
	     $mysql_hostname = "127.0.0.1";
			$mysql_user = "root";
			$mysql_password = "krishna";
			$mysql_database = "roomfindertest";
			$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect mysql");
			
   
error_reporting(E_ALL ^ E_DEPRECATED);  
	  
	  //**********************************************
        	$query2 = "DELETE FROM temp WHERE contact=$_SESSION[mobileNumber]";
			 $result2= mysqli_query($bd,$query2) or die(mysql_error());
			
            header('Location:prompt.php?x=1');
		  //$resp['message'] =  "OTP INVALID";
            
        }
        return json_encode($resp);
        // OR get the OTP from your db and check against the OTP from client
    }
    
    public function verifyBySendOtp($request)
    {
        $data = array("countryCode" => "91", "mobileNumber" => $request['mobileNumber'], "oneTimePassword" => $request['oneTimePassword']);
        $data_string = json_encode($data);
        $ch = curl_init($this->baseUrl . '/verifyOTP');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($data_string),
          'application-Key: Nf6t6Q8A6eweA7rKMXD8ZbWMitwczN6rTbnmm_vyBgPZBcXH-f_6JT_4fH-Qx1Y50jFb9wTKykpzF1V3-iQm9zQuqjuLFjcyGyxvH-NSW1bum7Kh6QXgJL84dsWQxxQv8cNd3S0tBxzB0tuzGtUdog=='
        ));
        $result = curl_exec($ch);
       curl_close($ch);
       $response = json_decode($result, true);
       if ($response["status"] == "error") {
         //customize this as per your framework
         $resp['message'] =  $response["response"]["code"];
         
       } else {
         $resp['message'] =  "NUMBER VERIFIED SUCCESSFULLY";
       }
       return json_encode($resp);
    }
}
$sendOTPObject = new SendOTP();
if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
  echo $sendOTPObject->$_REQUEST['action']($_REQUEST);
} else {
  echo "Error Wrong api";
}
}
else{
	header('location:index.php');
}
?>