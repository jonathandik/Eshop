<?php
	error_reporting(E_ERROR);
	session_start();	
	include ("includes/db_connection.php");	
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/changePassword.css">
</head>
<body>
<?php	
	$email=$_SESSION['email'];
	$currentPassword=$_POST['currentPassword'];
	$newPassword=$_POST['newPassword'];
	$confirmPassword=$_POST['confirmPassword'];
	
	$currentPassword = stripslashes($currentPassword);
	$currentPassword = mysqli_real_escape_string($conn,$currentPassword);
	
	$newPassword = stripslashes($newPassword);
	$newPassword = mysqli_real_escape_string($conn,$newPassword);	
	
	//query the database for email
	$saltQuery="select SALT from users where EMAIL='$email'";
	if ($conn->query($saltQuery)){
		$result=$conn->query($saltQuery);	
		$row=$result->fetch_assoc();
		$salt=$row['SALT'];
		$saltedPW =  $currentPassword . $salt;
		$hashedPW = hash('sha256', $saltedPW);
		//query the database for email and password.			
		$sql="select * from users where EMAIL = '$email' and PASS = '$hashedPW'";
	if ($conn->query($sql)) {	
		$result=$conn->query($sql);
		$row=$result->fetch_array();				
		} 
	}
	else {
	//if an error occurs regarding the query, show it.
			echo "<h5>An error occured</h5>"; 
	}				
	if (empty($currentPassword)) {
       $curPassErr = "*Current password";									
       } else {
			   if (strlen($currentPassword) < 8)
			   {
				 $curPassErr="Enter at least 8 characters";
			   } else {
					   if ($row['PASS']!=$hashedPW)
					   {
						  $curPassErr="Wrong Password";
				}
		}
	}
	
	if (empty($newPassword)) {
       $newPassErr = "*New password";									
       } else {
			   if (strlen($newPassword) < 8)
			   {
				 $newPassErr="Enter at least 8 characters";
			   } else { 
					  if (!preg_match('/^[a-zA-Z0-9]+$/', $newPassword)) {
					  $newPassErr = "Only letters and numbers are allowed!";
					  } else {
							  if ($newPassErr==$row['PASS']) {								  
							      $newPassErr = "Password exists";
							  }
					  }
			}
			
	}	
	
	if (($confirmPassword!=$newPassword && strlen($currentPassword) >= 8 && strlen($newPassword) >= 8 && strlen($confirmPassword) >= 8)) {
           $passmatchErr = "Password does not match!";
    }

	if ($curPassErr!="" || $newPassErr!="" || $passmatchErr!="" || $confirmPassword=="")
	{
?>
<form method="POST" action="welcomePasswordProcess.php">
    <table class="changePassword">
		<tr>
            <td>Current Password:</td>
		</tr>
		<tr>
            <td>
                <input type="password" name="currentPassword" size="20" maxlength="20" placeholder="at least 8 characters">                
				<span class="error"><?php echo $curPassErr;	?></span>
            </td>
        </tr>
		<tr>
            <td>New Password:</td>
		</tr>
		<tr>
            <td>
                <input type="password" name="newPassword" size="20" maxlength="20" placeholder="at least 8 characters">                
				<span class="error"><?php echo $newPassErr;	?></span>
            </td>
        </tr>
		<tr>
            <td>Confirm New Password:</td>
		</tr>
		<tr>
            <td>
                <input type="password" name="confirmPassword" size="20" maxlength="20" placeholder="at least 8 characters">                
				<span class="error"><?php echo $passmatchErr; ?></span>
            </td>
        </tr>
		<tr>
			<td>
				<input type="submit" value="Save new Password">
			</td>
		</tr>		
	</table>
</form>
<?php
	} else {
		$currentPassword = stripslashes($currentPassword);
		$currentPassword = mysqli_real_escape_string($conn,$currentPassword);
		
		$newPassword = stripslashes($newPassword);
		$newPassword = mysqli_real_escape_string($conn,$newPassword);	
		
		//query the database for email
		$saltQuery="select SALT from users where EMAIL='$email'";
		if ($conn->query($saltQuery)){
			$result=$conn->query($saltQuery);	
			$row=$result->fetch_assoc();
			$salt=$row['SALT'];
			$saltedPW =  $currentPassword . $salt;
			$hashedPW = hash('sha256', $saltedPW);
			//query the database for email and password.			
			$sql="select * from users where EMAIL = '$email' and PASS = '$hashedPW'";
			if ($conn->query($sql)) {		
				$row=$conn->query($sql)->fetch_array();				
			} 
		}
		else {
		//if an error occurs regarding the query, show it.
				echo "<h5>An error occured</h5>"; 
		}	

		if ($hashedPW==$row['PASS']) {
			if ($row['EMAIL'] == $email && $row['PASS']==$hashedPW && $newPassword==$confirmPassword) {
				$salt2=bin2hex(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
				$saltedPW2=$newPassword . $salt2;
				$hashedPW2 = hash('sha256', $saltedPW2);
				$sql = "UPDATE users SET PASS='$hashedPW2', SALT='$salt2' WHERE EMAIL='$email'";
				echo "<script>setTimeout(\"location.href = 'login.php';\",3000);</script>"; //Redirect page in 3 seconds.
				echo "<h3>Your password has changed.Logging out...</h3>";
				session_destroy();
				if (!$conn->query($sql)) {
					//if an error occurs regarding the query, show it.
					echo "<h5>An error occured</h5>";
				}	
			}			
		}
	}
	$conn->close();
?>
</body>
</html>