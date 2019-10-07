<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

// Escape all $_POST variables to protect against SQL injections
$firstname = $mysqli->escape_string($_POST['firstname']);
$lastname = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$mobile = $mysqli->escape_string($_POST['mobile']);
$rfid = $mysqli->escape_string($_POST['rfid']);
$bloodgroup = $mysqli->escape_string($_POST['bloodgroup']);
$dob = strtotime($_POST['dob']);
$dob=date("Y-m-d",$dob);
$address = $mysqli->escape_string($_POST['address']);

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM patient WHERE mobile='$mobile' or rfid='$rfid'") or die($mysqli->error());

// User email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this mobile or RFID already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database,

    // active is 0 by DEFAULT
    $sql = "INSERT INTO patient (firstname, lastname, email, mobile, rfid, bloodgroup, dob, address) 
			VALUES ('$firstname','$lastname','$email','$mobile','$rfid','$bloodgroup','$dob','$address')";

    // Add user to the database
    if ( $mysqli->query($sql) ){
        $_SESSION['message'] =
                
                 "Patient's data added to database";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Thankyou (Hospital ERP)';
        $message_body = '
        Hello '.$firstname.',

        Thank you for visiting hospital!
        Your RF TagID is: '.$rfid.'';  
        //mail( $to, $subject, $message_body );
		
		$message_body = wordwrap($message_body,70);
		
		$mail = new PHPMailer();
		$mail ->IsSmtp();
		$mail ->SMTPDebug = 0;
		$mail ->SMTPAuth = true;
		$mail ->SMTPSecure = 'ssl';
		$mail ->Host = "smtp.gmail.com";
		$mail ->Port = 465; // or 587
		$mail ->IsHTML(true);
		$mail ->Username = "milan.chhatralia@gmail.com";
		$mail ->Password = "M!L@N963852";
		$mail ->SetFrom("no-reply@hospitalERP.com");
		$mail ->Subject = $subject;
		$mail ->Body = $message_body;
		$mail ->AddAddress($to);
		$mail->Send();
		
        header("location: profile.php"); 
    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}