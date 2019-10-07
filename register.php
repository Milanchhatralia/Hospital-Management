<?php
 
require 'PHPMailer-master/PHPMailerAutoload.php';

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];

// Escape all $_POST variables to protect against SQL injections
$name = $mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);
$ucode = $mysqli->escape_string($_POST['ucode']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM reception WHERE email='$email' UNION 
							SELECT * FROM doctor WHERE email='$email' UNION
							SELECT * FROM pharma WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database

    // active is 0 by DEFAULT
    $sql = "INSERT INTO doctor(name, email, ucode, password, hash) VALUES ('$name','$email','$ucode','$password','$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
		
		
		
        $to      = $email;
        $subject = 'Account Verification (Hospital ERP)';
		
        $message_body = '
        Hello '.$name.'

        Thank you for signing up!
        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;
		
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
		
        //mail( $to, $subject, $message_body);
        header("location: profile.php");
    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}