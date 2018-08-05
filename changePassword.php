<?php
	error_reporting(E_ERROR);
	session_start();
	include ("includes/db_connection.php");
	$email=$_POST["email"];
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/changePassword.css">
</head>
<body>
<form method="POST" action="welcomePasswordProcess.php">
    <table class="changePassword">
		<tr>
            <td>Current Password:</td>
		</tr>
		<tr>
            <td>
                <input type="password" name="currentPassword" size="20" maxlength="20" placeholder="at least 8 characters">                
            </td>
        </tr>
		<tr>
            <td>New Password:</td>
		</tr>
		<tr>
            <td>
                <input type="password" name="newPassword" size="20" maxlength="20" placeholder="at least 8 characters">                
            </td>
        </tr>
		<tr>
            <td>Confirm New Password:</td>
		</tr>
		<tr>
            <td>
                <input type="password" name="confirmPassword" size="20" maxlength="20" placeholder="at least 8 characters">                
            </td>
        </tr>
		<tr>
			<td>
				<input type="submit" value="Save new Password">
			</td>
		</tr>
	</table>
</form>
</body>
</html>