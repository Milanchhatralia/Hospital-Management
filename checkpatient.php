<?php 
require 'db.php';
session_start();
?>
<?php

if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['checkpatientdata'])) { //check patient's data

        $checkno = $mysqli->escape_string($_POST['check']);
		$result = $mysqli->query("SELECT * FROM patient WHERE mobile='$checkno' or rfid='$checkno'");
		if ( $result->num_rows == 0 ){ // patient doesn't exist
			$_SESSION['message'] = "<div class='info'>
              Check weather Mobile or RFID No. is correct?
              </div>";
			header("location: checkpatient.php");
		}else { // User exists
			$user = $result->fetch_assoc();
				$_SESSION['firstname'] = $user['firstname'];
				$_SESSION['lastname'] = $user['lastname'];
				$_SESSION['rfid'] = $user['rfid'];
				$_SESSION['bloodgroup'] = $user['bloodgroup'];
				$_SESSION['dob'] = $user['dob'];	
				$_SESSION['mobile'] = $user['mobile'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['address'] = $user['address'];
				$_SESSION['prescription'] = $user['prescription'];
				$_SESSION['medicine'] = $user['medicine'];
				
				// This is how we'll know the user is logged in
				$_SESSION['plogged_in'] = true;

				header("location: patientprofile.php");
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>ERP | Check Patient's Data</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
<div class="form">  
        <div>   
        <h1>Check Patient's Data</h1>
        <p>
		<?php 
		if( isset($_SESSION['message']) ){
			
			echo $_SESSION['message'];
			//unset( $_SESSION['message'] );
		}
		?>
		</p>
        <form action="checkpatient.php" method="post" autocomplete="off">
				<div class="field-wrap">
					<label>
						RFID No. or Mobile No.<span class="req">*</span>
					</label>
					<input type="text" required autocomplete="off" name="check"/>
				</div>
				<div class="field-wrap">
					<button type="submit" class="button button-block" name="checkpatientdata" >Check</button>
				</div>
		  </form>
		</div>
		<p class="forgot"><a href="logout.php">Logout!</a></p>
		
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
<script src="js/mqttws31.js"></script>
<script src="js/mqtt.js"></script>
</body>
</html>