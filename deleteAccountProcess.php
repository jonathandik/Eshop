<?php
session_start();
include ("includes/db_connection.php");
$emailToDelete=$_SESSION['email'];

if (isset($emailToDelete)) { //check whether there is a session.
	$sqlToDelete="delete from users where EMAIL='$emailToDelete'";
	$conn->query($sqlToDelete);
	if(!$conn->query($sqlToDelete))
	{
		echo $conn->error;
	} else {
			echo "<script>setTimeout(\"location.href = 'index.php';\",5000);</script>"; //Redirect page in 5 seconds.
			echo "<h3 style='color:red'>Your account has been deleted.<br>Logging out...</h3>";
			session_destroy();		
	}
}
$conn->close();	
?>