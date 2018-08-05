<?php
	error_reporting(E_ERROR); //hide errors.
	session_start();
	include ("includes/db_connection.php");
	$email=$_SESSION['email'];	
	$sql="select FIRSTNAME, LASTNAME, AGE, EMAIL, GENDER, PHONE, SPEOFFER from users WHERE EMAIL='".$email."'";	
	if ($conn->query($sql)) {					
		$result=$conn->query($sql);
		$row=$result->fetch_array();
		}
	else {
	//if an error occurs regarding the query,show it.
		 echo "<h5>An error occured</h5>"; 
	}	
	$conn->close();
?>
<style>
h4 {
 color: red;
}
</style>
<h4>First Name: <?php echo $row["FIRSTNAME"]; ?></h4>
<h4>Last Name: <?php echo $row["LASTNAME"]; ?></h4>
<h4>Age Range: <?php echo $row["AGE"]; ?></h4>
<h4>Email Address: <?php echo $row["EMAIL"]; ?></h4>
<h4>Sex: <?php echo $row["GENDER"]; ?></h4>
<h4>Phone Number: <?php echo $row["PHONE"]; ?></h4>
<h4><?php echo $row["SPEOFFER"]; ?></h4>