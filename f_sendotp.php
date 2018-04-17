<?php
session_start();
if(isset($_SESSION['mobile2'])){

class SendOTP {
    private  $baseUrl = "https://sendotp.msg91.com/api";
    public function callGenerateAPI($request) {
        $data = array("countryCode" => "91", "mobileNumber" => $_SESSION['mobile2'],"getGeneratedOTP" => true);
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
       $_SESSION["f_oneTimePassword"] = $OTP;
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
        if($this->saveOTP($response["response"]["f_oneTimePassword"])){
            $resp['message'] = "OTP SENT SUCCESSFULLY";
			header('location:f_prompt0.php');
            //return json_encode($resp);
			
        }
    }
    public function verifyOTP($request){
        //This is the sudo logic you have to customize it as needed.
        //your verify logic here
        if($_SESSION['f_otp'] != $_SESSION["f_oneTimePassword"]){
            $resp['message'] = "NUMBER VERIFIED SUCCESSFULLY";
      
          header('location:update_pass.php');

        }
        else{

            header('Location:f_prompt.php?x=1');
		  //$resp['message'] =  "OTP INVALID";
            
        }
        return json_encode($resp);
        // OR get the OTP from your db and check against the OTP from client
    }
    
    public function verifyBySendOtp($request)
    {
        $data = array("countryCode" => "91", "mobileNumber" => $request['mobileNumber'], "oneTimePassword" => $request['f_oneTimePassword']);
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