<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?=$name ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1><?php echo 'Hello '.$name.'!'; ?></h1>
          
          <p>
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']))
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          
          ?>
          
          <!--<h2><?//php echo 'Hello '.$name.'!'; ?></h2>
          <p><?//= $email ?></p>-->

          <div class="top-row">
            <div class="field-wrap">
              <a href="newpatient.php"><button class="button button-block" name="newpatient" />New Patient</button></a>
            </div>
        
            <div class="field-wrap">
              <a href="checkpatient.php"><button class="button button-block" name="checkpatient" />Check Patient</button></a>
            </div>
          </div>
		  <form action="profile.php" method="post">
			
		</form>
		  

          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
