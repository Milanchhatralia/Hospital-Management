<?php 
require 'db.php';
?>
<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['plogged_in'] != 1 ) {
  $_SESSION['message'] = "Please enter Mobile No. or RFID No.";
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
    if (isset($_POST['newuser'])) { //checkuser

		$_SESSION['plogged_in'] = false;
		header("location: checkpatient.php");
        
    }elseif (isset($_POST['submit'])) { //enter priscription to database
        
        $prescription = $_POST['prescription'];
        $medicinearr = $_POST['medicine'];
		
		//$med_str =implode(",",$medicinearr);
		
		$big_string = '';
		//echo $medicinearr[0];
		foreach($medicinearr as $key => $value){
			$big_string = $big_string.$value.', ';
		}
		$sql = "UPDATE patient SET prescription='$prescription', medicine='$big_string' WHERE rfid='$rfid'";
		if ( $mysqli->query($sql) ){
			$_SESSION['message']= "Data Submited";
			echo $_SESSION['message'];
			header("location: patientprofile.php");
		}
		
		
		
		/*foreach($_POST['medicine'] as $idx => $medicine) {
			$sql="INSERT INTO patient(medicine)VALUES('" . $_POST['medicine'][$idx] . "')";
			if( !$mysqli->query($sql) )
			{
				die('Error:'.mysqli_error($mysqli));
			}
		}*/
		
		
        /*for ($i=0; $i < count($medicinearr) ; $i++) { 
        	$medicinearr = $_POST['medicine'][$i];
        }
        /*foreach($_POST['medicine'] as $myarray) {
        	$medicinearr = $myarray;
		}
		echo "<pre>";
        print_r($medicinearr);
        echo "</pre>";*/
    }
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Diagnose | <?=$firstname ?></title>
  <?php include 'css/css.html'; ?>
  
  <script type="text/javascript">
	var i = 1;
	function textBoxCreate(){
    var y = document.createElement("input");
	document.getElementById("newdiv").appendChild(y);
    y.setAttribute("type", "text");
    y.setAttribute("name", "medicine[]");
    y.setAttribute("placeholder", "Medicine");
    i++;
  }
  </script>
</head>

<body>
  <div class="form">

          <h1><?php echo ''.$firstname.' '.$lastname.''; ?></h1>
          
        <form action="diagnose.php" method="post">
		<div class="field-wrap">
              <label>
                Prescription<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='prescription' />
        </div>
		
		<div class="field-wrap" id="newdiv">
              
              <input type="text" required autocomplete="off" name="medicine[]" placeholder="Medicine"/>
        </div>
		
		
		
		<div class="field-wrap">
			<button type="submit" class="button button-block" name="submit" >Submit</button>
		</div>
		</form>
		<form action="diagnose.php" method="post">
		<div class="field-wrap">
			<button type="submit" class="button button-block" name="newuser" >Close Session</button>
		</div>
		</form>
		<div class="top-row">
            <div class="field-wrap">
              <button class="button button-block" onclick="textBoxCreate()" />Add</button>
            </div>
			<div class="field-wrap">
			</div>
        </div>
			
		
          <p class="forgot"><a href="logout.php">Logout!</a></p>
    </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>
</html>
