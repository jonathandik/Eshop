<?php
	include ("header.php");
	include ("includes/db_connection.php"); //database connection
	$email=$_POST["email"];	
	error_reporting(E_ERROR); //hide errors.
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">		
	<link rel="stylesheet" type="text/css" href="css/logout.css">	
	<script type="text/javascript" src="script/welcome.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/personal.css">
</head>

<body>
<h1><strong>My Account</strong></h1>
<div id="subMenu">	
  <div id="links">	
	 <table class="one">	
		<tr>
			<td><a class="welcome" href="profile.php">Profile</a></td>
		</tr>
		<tr>
			<td><a class="welcome" href="changePassword.php">Change Password</a></td>
		</tr>
		<tr>
			<td><a class="welcome" href="changeInfo.php">Change Information</a></td>
		</tr>
		<tr>
			<td><a class="welcome" href="deleteAccount.php">Delete Account</a></td>
		</tr>		
	 </table>	 
	 <table class="two">
		<tr>
		<td>
		<div id="newPageContent">
			<?php include ("changeInfoProcess.php"); ?>
		</div>
		</td>
		</tr>		
	  </table>
	</div>
</div>
<div class="bottom-left">
	<a class="welcome" href="index.php">Home Page</a><br>
	<a class="welcome" href="logout.php">Log out</a>	
</div>
<div id="footerAlignment">
	<div id="footer">					
<div align="center">	
<?php
	include ("footer.php");
?>
</div>
	</div>
</div>
</body>
</html>