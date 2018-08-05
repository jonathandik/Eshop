<?php
	/*error_reporting function is used to hide errors that do 
	not affect the functionality of the program.*/
	session_start();
	$emailSesssion=$_SESSION['email'];
	error_reporting(E_ERROR); //hide errors.
	include ("includes/db_connection.php"); //connect to the database.
						
	//The following variables retrieve data from form in changeInfo.php.
	$firstName=$_POST['firstname'];        
	$lastName=$_POST['lastname']; 
	$age=$_POST['agerange'];     
	$gender=$_POST['sex'];   
	$phone=$_POST['phone'];
	$email=$_POST['email'];                       	
	$speOffer=$_POST['specialoffers'];         
							
	//The following variables have been initialised to validate the form and handle relative errors.
	$firstnameErr = $lastnameErr = $genderErr = $phoneErr= $emailErr = "";
				
	if ($_SERVER["REQUEST_METHOD"] == "POST") { //Retrieves the form method from changeInfo.php.											 		
		
		/*The following functions check if the user has entered the 
		information correctly,else they display according messages.*/
		if (empty($firstName)) {
			$firstnameErr = "*First name is required";
			} else {					
					//check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
					   $firstnameErr = "Only letters and white space allowed!"; 
			}
		}
								
		if (empty($lastName)) {
			$lastnameErr = "*Last name is required";
			} else {				   
				   //check if name only contains letters and whitespace.
				   if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
					  $lastnameErr = "Only letters and white space allowed!"; 
			}
		}						
        
		if (empty($gender)) {
			$genderErr = "*Please choose your gender";
		}
		
		if (empty($phone)) {
            $phoneErr = "*Phone number is required";
            } else {					
					//check if phone number is well-formed.
                    if (!preg_match("/^[+0-9]{3}-[0-9]{3}-[0-9]{7}$/", $phone)) {
                       $phoneErr="Invalid Phone Number!";
            }
        }
        						        
        if (empty($email)) {
            $emailErr = "*Email";
            } else {                    
                    //check if e-mail address is well-formed.
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format!";                                     
            }
		}				
      
	//Check whether there are errors.
    if ($firstnameErr !="" || $lastnameErr!="" || $genderErr!="" || $phoneErr!="" || $emailErr!="")
    {                                                                         
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/changeInfo.css">
</head>

<body>
<form method="POST" action="welcomeChangeInfoProcess.php">
    <table>
        <tr>
            <td>First&nbsp;Name:</td>
            <td>
                <input type="text" name="firstname" size="25" value="<?php echo $firstName;?>">
			</td>
				<tr><td>&nbsp;</td><td><span class="error"><?php echo $firstnameErr;?></span>
            </td>
        </tr>		
        <tr>
            <td>Last&nbsp;Name:</td>
            <td>
                <input type="text" name="lastname" size="25" value="<?php echo $lastName;?>">                                    
            </td>
			</td>
				<tr><td>&nbsp;</td><td><span class="error"><?php echo $lastnameErr;?></span>
            </td>
        </tr>		
        <tr>
            <td>Age:</td>
            <td>
                <select name="agerange" size="1">
                    <option>Under 18</option>
                    <option>18 - 24</option>
                    <option>25 - 34</option>
                    <option>35 - 44</option>
                    <option>45 - 54</option>
                    <option>55 - 64</option>
                    <option>65 and older</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Sex:</td>
            <td>
				<input type="radio" name="sex" <?php if (isset($gender)&& $gender=="Male")echo "checked";?> value="Male">Male
                <input type="radio" name="sex" <?php if (isset($gender)&& $gender=="Female")echo "checked";?> value="Female">Female                
            </td>
			</td>
				<tr><td>&nbsp;</td><td><span class="error"><?php echo $genderErr;?></span>
            </td>
        </tr>
        <tr>
            <td>Phone&nbsp;Number:</td>
            <td>
                <input type="text" name="phone" size="25" maxlength="15" placeholder="+XX-XXX-XXXXXXX" value="<?php echo $phone;?>">                
            </td>
			</td>
				<tr><td>&nbsp;</td><td><span class="error"><?php echo $phoneErr;?></span>
            </td>
        </tr>
		
        <tr>
            <td>E-mail:</td>
            <td>
                <input type="text" name="email" size="25" placeholder="name@example.com" value="<?php echo $email;?>">                			
            </td>
			</td>
				<tr><td>&nbsp;</td><td><span class="error"><?php echo $emailErr;?></span>
            </td>
        </tr>	
		<tr>
			<td>&nbsp;</td>
		</tr>	
		<tr>
			<td>&nbsp;</td>
		</tr>
	  </table>
	  <table style="width:100%">
        <tr>
            <td style="font-size:14px;"><input type="checkbox" name="specialoffers" <?php if (isset($speOffer)&& $speOffer!="") { echo "checked"; } ?> value=" ">                  
            Check the box to receive special offers from us via email.</td>                    
        </tr>
		<tr>
			<td><input type="submit" value="Update Information"></td>
		</tr>				
    </table>                     
</form>			

<?php
	/*if the user has entered the correct data properly,
	display them in a new page and execute a query to update their data.*/
    }else {		
?>

<div style="color:red">

<?php		
		echo "<h3>Your new information is the following:</h3>";
		/*stripslashes() function is useful to remove unnecessary characters like \,
		while mysqli_real_escape_string is used for security*/
		$firstname=stripslashes($_POST['firstname']);
		$firstname=mysqli_real_escape_string($conn, $_POST['firstname']);
		echo "<h4>Full Name: $firstName $lastName</h4>";  
		$lastname=stripslashes($_POST['lastname']);  
		$lastname=mysqli_real_escape_string($conn, $_POST['lastname']);         		 
		echo "<h4>Age range: $age</h4>"; 
		$agerange=$_POST['agerange'];	 
		echo "<h4>Sex: $gender</h4>";
		$gender=$_POST['sex'];
		echo "<h4>Phone number:$phone</h4>";
		$phone=stripslashes($_POST['phone']);
		$phone=mysqli_real_escape_string($conn, $_POST['phone']); 
		echo "<h4>Email address: $email</h4>";
		$email=stripslashes($_POST['email']);
		$email=mysqli_real_escape_string($conn, $_POST['email']);             		
		$speOffer=$_POST['specialoffers'];
			
		/*If the user has filled the ckecbox the following message
		is displayed and then update the fields in the database.*/
		if ($speOffer!=NULL)
		{	 		 
			$speOffer="You would like to receive details of special offers.";				 
		}
		echo "<h5>$speOffer </h5>";
		$sql="UPDATE users SET FIRSTNAME='$firstname', LASTNAME='$lastname', AGE='$agerange', GENDER='$gender', PHONE='$phone', EMAIL='$email', SPEOFFER='$speOffer' WHERE EMAIL='$emailSesssion'";
		
			
		echo "<h5>Your information has been updated.Logging out.</h5>";
		echo "<script>setTimeout(\"location.href = 'login.php';\",10000);</script>"; //Redirect page in 10 seconds.
		session_destroy();
		if (!$conn->query($sql)){								
			//if an error occurs regarding the query, show it.
			echo "<h5>\"An error occured\"</h5>";
			}				
		}
	}	
	$conn->close();
?>
</div>
</body>
</html>