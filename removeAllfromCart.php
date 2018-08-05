<?php
	error_reporting(E_ERROR); //hide errors.
	session_start();
	session_id();
	$session_id=session_id();
	include ("includes/db_connection.php"); //database connection
	//delete all the added products from the shopping cart.	
	$sqlDelete="delete from store_shoppertrack";
	$result=$conn->query($sqlDelete);
	if(!$result) {
		echo "An error occured.";
	} else {
	  header ("Location:showcart.php");
	  exit;
	}
	$conn->close();
?>