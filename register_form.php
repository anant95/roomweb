
<div class="col-md-3" id="login_box">

<form role="form" id="form_id" method="POST">
  	<div id="form_box">
  	<h2 id="login_header">Registration Form</h2>
						    <div class="form-group">
						      <label for="username">FirstName:</label>
						       <!-- Email Icon -->
						      <div class="input-group margin-bottom-sm">
						       <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
						  	   <i class="fa fa-user fa-lg" style="color: rgb(255,255,255);"></i></span>
						       <input type="username" class="form-control" required="required" id="username" name="username2" placeholder="Enter your name">
						      </div>
						    </div>
						    
						    <!-- mobile for the security that two people do not have same name and password so mobile will be used i.e.unique-->
						    <div class="form-group">
						      <label for="contact">Contact:</label>
						      <!-- Contact Icon -->
						      <div class="input-group">
						        <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
						     	<i class="fa fa-phone fa-lg"style="color: rgb(255,255,255);"></i></span>
						        <input type="text" class="form-control" required="required" id="contact" name="mobile2" placeholder="Enter Contact No.">
						      </div>
						    </div>
						    
						    <!-- Address -->
						    <div class="form-group">
						      <label for="address">Address:</label>
						       <!-- address icon -->
						       <div class="input-group margin-bottom-sm">
						         <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
						         <i class="fa fa-map-marker fa-lg" style="color: rgb(255,255,255);"></i></span>
						         <input type="text" class="form-control" required="required" name="address" id="address" placeholder="Enter Address">
						       </div>
						   </div>
						   
   				<!-- City -->
				          <div class="form-group">
						      <label for="city">City:</label>
						       <!-- address icon -->
						       <div class="input-group margin-bottom-sm">
						         <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
						         <i class="fa fa-map-marker fa-lg" style="color: rgb(255,255,255);"></i></span>
						         <input type="text" class="form-control" required="required" name="city" id="city" placeholder="Enter your city">
						       </div>
						  </div>
						   
			    <!-- State -->
				          <div class="form-group">
						      <label for="state">State:</label>
						       <!-- address icon -->
						       <div class="input-group margin-bottom-sm">
						         <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);">
						         <i class="fa fa-map-marker fa-lg" style="color: rgb(255,255,255);"></i></span>
						         <input type="text" class="form-control" required="required" name="state" id="state" placeholder="Enter your state">
						       </div>
						  </div>
						   
			 
   
					    <div class="form-group">
					      <label for="pwd">Password:</label>
					      <!-- password Icon -->
					      <div class="input-group">
					     <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);"><i class="fa fa-key fa-fw"style="color: rgb(255,255,255);"></i></span>
					      <input type="password" class="form-control" required="required" id="pwd" name="password2" placeholder="Enter password">
					      </div>
					    </div>
    <!--  hide remember me part
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    -->
    
    <label>Employer </label>
    
    <select name ="employer" required="required">
    	<option selected="selected"> Fresher</option>
    	<option>TCS</option>
    	<option>Wipro</option>
    	<option>Google</option>
    	<option>Facebook</option>
    	<option>Apple</option>
    	<option>Others</option>
    </select>
    
    <br /><br />
    <button type="submit" class="btn btn-default" id="button_id" name="submit2">Submit</button>
    </div>
  </form>
  </div>