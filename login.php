<?php	
	include ("header.php");
?>
<!doctype html>
<html> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/loginForm.css">
</head>
<body>
    <h1>Sign in Form</h1>
	<hr>
    <form action="loginProcess.php" method="POST">
	  <table>
		<tr>
		  <td>Email:</td>		  
		  <td><input type="text" id="email" name="email" placeholder="name@example.com" value="<?php if (isset($_COOKIE["email"])) { echo $_COOKIE["email"];} ?>" /></td>
		  </td>
		</tr>
		<tr>
		  <td>Password:</td>
		  <td><input type="password" id="pass" name="pass" maxlength="20" placeholder="at least 8 characters" value="<?php if (isset($_COOKIE["pass"])) { echo $_COOKIE["pass"];} ?>" /></td>		  
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
<div id="footerAlignment">
	<div id="footer" align="center">					
<?php
	include ("footer.php");
?>
	</div>
</div>
</body>
</html>