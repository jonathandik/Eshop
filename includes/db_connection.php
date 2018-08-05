<?php
	$db_host="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="eshopDB";
	$conn=new mysqli($db_host,$db_user,$db_pass,$db_name);
	
	//Create class for database connection and handle any possible error.
	try {		
		$pdo = new PDO("mysql:$db_host,$db_name,$db_user,$db_pass");		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		die ("ERROR: Could not connect. " . $e->getMessage());
	}
?>