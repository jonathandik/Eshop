<?php
	//include function is called not to write again the content of the called file.
	include ("header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/registration.css">
</head>
<body>
<?php
	/*error_reporting function is used to hide errors that do 
	not affect the functionality of the program.*/
	error_reporting(E_ERROR);
	include ("includes/db_connection.php"); //connect to the database.
						
	//The following variables retrieve data from form in registration.php.
	$firstName=$_POST['firstname'];        
	$lastName=$_POST['lastname']; 
	$age=$_POST['agerange'];     
	$gender=$_POST['sex'];   
	$phone=$_POST['phone'];
	$email=$_POST['email'];                       
	$pass=$_POST['password'];
	$confPass=$_POST['confirmpassword'];
	$speOffer=$_POST['specialoffers'];         
							
	//The following variables have been initialised to validate the form and handle relative errors.
	$firstnameErr = $lastnameErr= $genderErr = $phoneErr= $emailErr = $passErr = $passmatchErr = "";
				
	if ($_SERVER["REQUEST_METHOD"] == "POST") { //Retrieves the form method from registration.php.
		$sql = "SELECT * FROM users WHERE EMAIL = '".$email."'";
		$result=$conn->query($sql); //checks for email conflict.		
								 
		/*The following functions check if the user has entered the 
		information correctly,else they display according messages.*/
		if (empty($firstName)) {
			$firstnameErr = "*First name is required";
			} else {
					$firstName = test_input($firstName);
					//check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
					   $firstnameErr = "Only letters and white space allowed!"; 
			}
		}
				
		if (empty($lastName)) {
			$lastnameErr = "*Last name is required";
			} else {
				   $lastName = test_input($lastName);
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
					$phone=test_input($phone);
					//check if phone number is well-formed.
                    if (!preg_match("/^[+0-9]{3}-[0-9]{3}-[0-9]{7}$/", $phone)) {
                       $phoneErr="Invalid Phone Number!";
            }
        }
							
        if (empty($email)) {
            $emailErr = "*Email is required";
            } else {
                    $email = test_input($email);
                    //check if e-mail address is well-formed.
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format!";                                     
                        } else {
							    if ($result->num_rows>=1) {
									$emailErr="Email already exists";
				}
			}
		}
                            
		if (empty($pass)) {
            $passErr = "*Password is required";									
            } else {
					if (strlen( $pass) < 8) {
						$passErr="Password should be at least 8 characters";
					} else if(!preg_match('/^[a-zA-Z0-9]+$/', $pass)) {
						$passErr = "Only letters and numbers allowed!";
				}
		}	
							
        if ($confPass!=$pass && strlen($pass) >= 8 && strlen($confPass) >= 8) {
            $passmatchErr = "Password does not match!";
        } 
    }
							
	/*The following function is called to make sure
	that any unwanted character is removed.*/
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
	//htmlspecialchars() converts special characters to HTML entities.
    $data = htmlspecialchars($data); 
    return $data;
    }
      
	//Check whether there are errors.
    if ($firstnameErr !="" || $lastnameErr!="" || $genderErr!="" || $phoneErr!="" || $emailErr!="" || $pass=="" || strlen($pass) < 8 || $pass!=$confPass || ($result->num_rows>=1))
    {                                                                         
?>
<h1>Registration Form</h1>
<hr>
<h4>Please complete the information below to register with this site.</h4>
<h5><span class="error">* required field.</span></h5>
<form method="POST" action="register.php">
    <table align="center">
        <tr>
            <td>First Name:</td>
            <td>
                <input type="text" name="firstname" size="25" value="<?php echo $firstName;?>">
                <span class="error"><?php echo $firstnameErr;?></span>                        
            </td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td>
                <input type="text" name="lastname" size="25" value="<?php echo $lastName;?>">
                <span class="error"><?php echo $lastnameErr;?></span>                      
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
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="error"><?php echo $genderErr;?></span>
            </td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td>
                <input type="text" name="phone" size="25" maxlength="15" placeholder="+XX-XXX-XXXXXXX" value="<?php echo $phone;?>">
                <span class="error"><?php echo $phoneErr;?></span>
            </td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td>
                <input type="text" name="email" size="25" placeholder="name@example.com" value="<?php echo $email;?>">				
                <span class="error"><?php echo $emailErr; ?></span>					
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>               
        <tr>
            <td>Password:</td>
            <td>
                <input type="password" name="password" size="20" maxlength="20" placeholder="at least 8 characters" value="<?php echo $pass;?>">				
                <span class="error"><?php echo $passErr;?></span>
            </td>
        </tr>
        <tr>
            <td>Confirm password:</td>
            <td>
                <input type="password" name="confirmpassword" size="20" maxlength="20">
                <span class="error"><?php echo $passmatchErr;?></span>
            </td>
        </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="specialoffers" <?php if (isset($speOffer)&& $speOffer!="") { echo "checked"; } ?> value=" "></td>                    
                <td>Check the box to receive special offers from us via email.</td>                    
            </tr>
			<tr>
				<td><input type="submit" value="Submit Registration Information"></td>
			</tr>
    </table>                     
</form>
<hr>			

<?php
	/*if the user has entered the correct data properly,display them(except password) in a new page
	  and execute a query to insert their data into the database.*/
    }else {		 
		echo "<h1>You entered the following information:</h1><br><hr>";
		/*stripslashes() function is useful to remove unnecessary characters like \,
		while mysqli_real_escape_string is used for security*/
		$firstname=stripslashes($_POST['firstname']);
		$firstname=mysqli_real_escape_string($conn, $_POST['firstname']);
		echo "<h3>Full Name: $firstName $lastName</h3>";  
		$lastname=stripslashes($_POST['lastname']);  
		$lastname=mysqli_real_escape_string($conn, $_POST['lastname']);         		 
		echo "<h3>Age range: $age</h3>"; 
		$agerange=$_POST['agerange'];	 
		echo "<h3>Sex: $gender</h3>";
		$gender=$_POST['sex'];
		echo "<h3>Phone number:$phone</h3>";
		$phone=stripslashes($_POST['phone']);
		$phone=mysqli_real_escape_string($conn, $_POST['phone']); 
		echo "<h3>Email address: $email</h3>";
		$email=stripslashes($_POST['email']);
		$email=mysqli_real_escape_string($conn, $_POST['email']);             
		$password=stripslashes($_POST['password']);   
		$escapedPW=mysqli_real_escape_string($conn,$_POST['password']); 
		/*hash and salt are used for more security,this combination 
		 is considered more effective than md5() against mysql injection.*/
		$salt=bin2hex(random_bytes(32));
		$saltedPW=$escapedPW . $salt;
		$hashedPW = hash('sha256', $saltedPW);
		$confirmpassword=$_POST['confirmpassword'];        
		$speOffer=$_POST['specialoffers'];
			
		/*If the user has filled the ckecbox the following message
		is displayed and then inserted into the database.*/
		if ($speOffer!=NULL)
		{	 		 
			$speOffer="You would like to receive details of special offers.";				 
		}			
		$sql="INSERT INTO users (FIRSTNAME,LASTNAME,AGE,GENDER,PHONE,EMAIL,PASS,SALT,SPEOFFER) VALUES ('$firstname','$lastname','$agerange','$gender','$phone','$email','$hashedPW','$salt','$speOffer')";	
		if ($conn->query($sql)){
?>
		<div class="login"><?php echo "$speOffer"; ?></div>
		<div><h4><strong>Thank you for registering.</strong></h4><br><hr></div>
		<div class="login"><a class="register" href="index.php">Home Page</a></div>
		<div class="login"><a class="register" href="login.php">Sign In</a></div>
<?php		
		} else{
			//if an error occurs regarding the query, show it.
			echo "<h5>$conn->error;</h5>"; 
			}				
		}  	
	$conn->close();
?>
<div align="center" style="margin-top:5%">
<?php
	include ("footer.php");
?>
</div>
</body>
</html>
