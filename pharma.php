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
	$prescription = $_SESSION['prescription'];
	$medicine = $_SESSION['medicine'];
	echo $medicine;
	$arr=explode(",",$medicine);
	echo $arr[1];
	
	//$arr=explode(",",$medicine);
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
		align: left;
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
		<?php if($medicine != null){?>  
		<div>
			<div>
				<h3>Prescription</h3>
			</div>
			<div>
				<h4><?php echo ''.$prescription.''; ?></h4>
			</div>
			<div>
				<h3>Medicine</h3>
			</div>
			
			<table id="table">
				<?php for($i=0;$i<count($arr);$i++){?>
				<tr>
					<td><h4><?= $arr[$i] ?></h4></td>
				</tr>
				<?php }?>
			</table>	
		</div>
		<div class="field-wrap">
			<form action="patientprofile.php" method="post">
			<div class="field-wrap">
				<button type="submit" class="button button-block" name="pdf" >Generate Invoice</button>
			</div>
			<div class="field-wrap">
				<button type="submit" class="button button-block" name="newuser" >Close Session</button>
			</div>
			</form>
		</div>
		<?php }else{ ?>
		<div class="center">
			<h2 style="color:red;margin: 25px;">Please Consult Doctor.</h2>
		</div>
		<div class="field-wrap">
			<form action="patientprofile.php" method="post">
			<!-- <div class="field-wrap">
				<button type="submit" class="button button-block" name="pdf" >Generate Invoice</button>
			</div> -->
			<div class="field-wrap">
				<button type="submit" class="button button-block" name="newuser" >Close Session</button>
			</div>
			</form>
		</div>
			
		<?php }	?>
          <p class="forgot"><a href="logout.php">Logout!</a></p>
    </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
