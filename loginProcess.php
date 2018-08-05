<?php 
	session_start(); //start Session here because it can't start within the html tag!
	$_SESSION['logged'] = false; //set flag to handle the session.	
	include ("header.php");	
	include ("includes/db_connection.php"); //connect to the database.
	error_reporting(E_ERROR); //hide errors.
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/loginForm.css">
</head>
<body>        
<?php
	//Get values from form in login.php file.
	$email = $_POST['email'];
	$escapedPW = $_POST['pass'];
	
	//Initialise variables for error handling.
	$emailErr = $passErr = "";	
	
	//to prevent mysql injection
	$email = stripslashes($email);
	$escapedPW = stripslashes($escapedPW);
	$email = mysqli_real_escape_string($conn,$email);
	$escapedPW = mysqli_real_escape_string($conn,$escapedPW);
	
	//query the database for email
	$saltQuery="select SALT from users where EMAIL='$email'";
	if ($conn->query($saltQuery)){
		$result=$conn->query($saltQuery);	
		$row=$result->fetch_assoc();
		$salt=$row['SALT'];
		$saltedPW =  $escapedPW . $salt;
		$hashedPW = hash('sha256', $saltedPW);
		//query the database for email and password.			
		$sql="select * from users where EMAIL = '$email' and PASS = '$hashedPW'";
		if ($conn->query($sql)) {		
			$row=$conn->query($sql)->fetch_array();	
		} 
	}
	else {
	//if an error occurs regarding the query, show it.
			echo "<h5>An error occured!</h5>"; 
	}	
	
	if (empty($email)) {
        $emailErr = "*Email is required";
        } else {
                $email = test_input($email);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format!";                                     
        }
	}
	if (empty($escapedPW)) {
       $passErr = "*Password is required";									
       } else {
			   if (strlen( $escapedPW) < 8)
			   {
				 $passErr="Password should be at least 8 characters";
			   } else {
					   if ($row['PASS']!=$hashedPW)
					   {
						  $passErr="Wrong Password or Email.";
					   }
			   }
	}
    
	function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }	   
	
	if ($emailErr!="" || $passErr!="")
	{
?>
<h1>Sign in Form</h1>
<hr>
<form action="loginProcess.php" method="POST">
    <table>
		<tr>
		  <td>Email:</td>
		  <td>		     
		     <input type="text" id="email" name="email" placeholder="name@example.com" value="<?php if (isset($_COOKIE["email"])) { echo $_COOKIE["email"];} ?>" />
			 <span class="error"><?php echo $emailErr;	?></span>
		  </td>
		  </td>
		</tr>
		<tr>
		  <td>Password:</td>
		  <td>
		      <input type="password" id="pass" name="pass" maxlength="20" placeholder="at least 8 characters" value="<?php if (isset($_COOKIE["pass"])) { echo $_COOKIE["pass"];} ?>" />
			  <span class="error"><?php echo $passErr;	?></span>
	    </td>		  
		</tr>
		<tr>
		  <td><input type="checkbox" name="remember" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?>/></td>
		  <td>Remember me</td>		  
		</tr>
		<tr>
		  <td>	
			<input type="submit" id="btn" name="submit" value="Log in">
		  </td>
		</tr>		  
    </table>
</form>	
<hr>
<?php
} else {
		$_SESSION['logged']=true;
		$_SESSION['email']=$email;		
		
		//to prevent mysql injection
		$email = stripslashes($email);
		$escapedPW = stripslashes($escapedPW);
		$email = mysqli_real_escape_string($conn,$email);
		$escapedPW = mysqli_real_escape_string($conn,$escapedPW);
				
		//query the database for email
		$saltQuery="select SALT from users where EMAIL='$email'";
		if ($conn->query($saltQuery)){
			$result=$conn->query($saltQuery);	
			$row=$result->fetch_assoc();
			$salt=$row['SALT'];
			$saltedPW =  $escapedPW . $salt;
			$hashedPW = hash('sha256', $saltedPW);
			//query the database for email and hashed password.			
			$sql="select * from users where EMAIL = '$email' and PASS = '$hashedPW'";
			if ($conn->query($sql)) {		
				$row=$conn->query($sql)->fetch_array();	
			} 
		}
		else {
		//if an error occurs regarding the query, show it.
				echo "<h5>An error occured!</h5>"; 
		}
		
		if ($row['EMAIL'] == $email && $row['PASS']==$hashedPW) {
		
		if (!empty($_POST["remember"])) //in case the user has checked Remember me box.
		{
			setcookie("email",$_POST["email"],time()+ (2592000)); //30 days remain remembered.
			setcookie("pass", $_POST["pass"], time()+ (2592000));
		}
		else //if box not checked email and password fields will be emoty after logout.
		{	
			if (isset($_COOKIE["email"]))
			{
				setcookie ("email", "");
			}
			if (isset($_COOKIE["pass"]))
			{
				setcookie ("pass", "");
			}
		}		
	    header ("Location:welcome.php");
	    exit();		
		}		
	}
	$conn->close();	   
?>
<div id="footer" align="center">
<?php
	include("footer.php");
?>
</div>
</body>
</html>