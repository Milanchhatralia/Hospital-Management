<?php 
require 'db.php';
session_start();
?>
<?php

if (isset($_GET['javasmsg'])) {
	$checkno=$_GET['javasmsg'];
	if($checkno != "\0"){
		$result = $mysqli->query("SELECT * FROM patient WHERE rfid='$checkno'");
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