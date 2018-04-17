
<div class="col-md-3" id="login_box">

<form role="form" id="form_id" method="POST">
  	<div id="form_box">
  	<h2 id="login_header">Login Form</h2>
    <div class="form-group">
      <label for="username">FirstName:</label>
       <!-- Email Icon -->
      <div class="input-group margin-bottom-sm">
  <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);"><i class="fa fa-user fa-lg" style="color: rgb(255,255,255);"></i></span>
      <input type="username" class="form-control" id="username" required="required" name="username" placeholder="Enter your name">
      </div>
    </div>
    <!-- mobile for the security that two people do not have same name and password so mobile will be used i.e.unique-->
    <div class="form-group">
      <label for="contact">Contact:</label>
      <!-- Contact Icon -->
      <div class="input-group">
     <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);"><i class="fa fa-phone fa-lg"style="color: rgb(255,255,255);"></i></span>
      <input type="text" class="form-control" id="contact" required="required" name="mobile" placeholder="Enter Contact No.">
      </div>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <!-- password Icon -->
      <div class="input-group">
     <span class="input-group-addon" style="background-color: rgba(0,0,0,.6);"><i class="fa fa-key fa-fw"style="color: rgb(255,255,255);"></i></span>
      <input type="password" class="form-control" id="pwd" required="required" name="password" placeholder="Enter password">
      </div>
    </div>
    <!--  hide remember me part
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    -->
    <div style="font-size: 19px;"><a href="forget1.php">Forgot password</a></div><br>
    <button type="submit" class="btn btn-default" id="button_id" name="submit1">Submit</button>
    </div>
  </form>
  </div>