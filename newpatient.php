<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['patientregister'])) { //enter into database

        require 'patientregister.php';
        
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>ERP | Register</title>
  <?php include 'css/css.html';?>
</head>

<body>
  <div class="form">

	<div>   
        <h1>REGISTER NEW PATIENT</h1>
          
        <form action="newpatient.php" method="post" autocomplete="off">
          
        <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
        </div>
		  
		<div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="on" name='email' />
        </div>
		  
		<div class="top-row">
            <div class="field-wrap">
              <label>
                Mobile No.<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='mobile' />
            </div>
			
			<div class="field-wrap">
            <label>
              RFID No.<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name='rfid' />
          </div>
		</div>
			
		
		  
		<div class="top-row">
            <div class="field-wrap">
              <label>
                Blood Group<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='bloodgroup' />
            </div>
			
			<div class="field-wrap">
			  <input type="date" name="dob"/>
            </div>
        </div>
		  
          <div class="field-wrap">
            <label>
              Address<span class="req">*</span>
            </label>
          
			<textarea rows="4" cols="50" name="address"></textarea>
          </div>
          
		<div class="field-wrap">
          <button type="submit" class="button button-block" name="patientregister" />Register</button>
        </div>
		</form>
    
	<p class="forgot"><a href="logout.php">Logout!</a></p>
		
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>
</html>
