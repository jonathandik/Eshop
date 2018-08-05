<?php
	error_reporting(E_ERROR); //hide errors.
	session_start();
	session_id();
	$session_id=session_id();
	include ("includes/db_connection.php"); //database connection
	$id=$_GET['id'];
	//if the id is not empty delete it from the shopping cart.
	if($id !="") {
		$sqlDelete="delete from store_shoppertrack where ORDER_ITEM_ID='$id' and SESSION_ID='$session_id'";
		$result=$conn->query($sqlDelete);
		if(!$result) {
			echo "error";
		} else {
		header ("Location:showcart.php");
		exit;
		}
	}
	$conn->close();
?>