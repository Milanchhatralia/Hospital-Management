<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['plogged_in'] != 1 ) {
  $_SESSION['message'] = "You need to enter Mobile No. or RFID No.";
  header("location: checkpatient.php");    
}
else {
    // Makes it easier to read
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $rfid = $_SESSION['rfid'];
    $bloodgroup = $_SESSION['bloodgroup'];
    $dob = $_SESSION['dob'];
    $mobile = $_SESSION['mobile'];
    $email = $_SESSION['email'];
    $address = $_SESSION['address'];
    $prescription = $_SESSION['prescription'];
    $medicine = $_SESSION['medicine'];
	
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['newuser'])) { //enter into database

		$_SESSION['plogged_in'] = false;
		header("location: checkpatient.php");
        
    }elseif (isset($_POST['pharma'])) { //pharmacy
        
        header ("location: pharma.php");
        
    }elseif (isset($_POST['diagnose'])) { //registering
        
        header ("location: diagnose.php");
        
    }
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Profile | <?=$firstname?></title>
  <?php include 'css/css.html'; ?>
  <style>
	#table {
		border-collapse: collapse;
		width: 100%;
	}

	#table tr td{
		text-align: left;
		vertical-align:middle;
		//padding: 1px;
	}
  </style>
</head>

<body>
  <div class="form">

          <h1><?php echo ''.$firstname.' '.$lastname.''; ?></h1>
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          /*if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }*/
          
          ?>
		  
		<div>
			<table id="table">
				<tr>
					<td><h3>RFID</h3></td>
					<td><h4>:  <?= $rfid ?></h4></td>
				</tr>
				
				<tr>
					<td><h3>Date of Birth</h3></td>
					<td><h4>:  <?= $dob ?></h4></td>
				</tr>
				
				<tr>
					<td><h3>Mobile</h3></td>
					<td><h4>:  <?= $mobile ?></h4></td>
				</tr>
				
				<tr>
					<td><h3>E-mail</h3></td>
					<td><h4>:  <?= $email ?></h4></td>
				</tr>
				
				<tr>
					<td><h3>Blood Group</h3></td>
					<td><h4>:  <?= $bloodgroup ?></h4></td>
				</tr>
				
				<tr>
					<td><h3>Address</h3></td>
					<td><h4>:  <?= $address ?></h4></td>
				</tr>
			
				<!--<h2><?php //echo 'Hello '.$name.'!'; ?></h2>
				<p><?//= $email ?></p>-->
			</table>	
		</div>
		<div class="field-wrap">
			<form action="patientprofile.php" method="post">
			<div class="field-wrap">
				<button type="submit" class="button button-block" name="diagnose" >Diagnose</button>
			</div>
			<div class="field-wrap">
				<button type="submit" class="button button-block" name="pharma" >Pharmacy</button>
			</div>
			<div class="field-wrap">
				<button type="submit" class="button button-block" name="newuser" >Close Session</button>
			</div>
			</form>
		</div>
          <p class="forgot"><a href="logout.php">Logout!</a></p>
    </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
