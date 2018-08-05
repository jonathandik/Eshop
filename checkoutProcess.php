<?php
	//include function is called not to write again the content of the called file.	
	include ("header.php");
	session_id();
	$session_id=session_id();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/orders.css">
</head>
<body>
<?php
	/*error_reporting function is used to hide errors that do 
	not affect the functionality of the program.*/
	error_reporting(E_ERROR);
	include ("includes/db_connection.php"); //connect to the database.
	//The following variables retrieve data from form in registration.php.
	$address=$_POST['address']; 
	$countryCode=$_POST['countryCode']; //match each country's code to its zip type.
	$zip=$_POST['zip'];
	$email=$_POST['email'];        	
		
	//The following variables have been initialised to validate the form and handle relative errors.
	$addressErr =  $zipErr = $emailErr = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") { //Retrieves the form method from registration.php.
		/*The following functions check if the user has entered the 
		information correctly,else they display according messages.*/
		if (empty($address)) {
			$addressErr = "Address&nbsp;is&nbsp;required";
			} else {					
					//check if address contains only letters, whitespace and numbers.
					if (!preg_match("/^[a-zA-Z ]+\ +[0-9]+$/",$address)) {
					   $addressErr = "Invalid&nbsp;Address"; 
			}
		}
		
		//Validate zip for each country
		$zipVal=array(
			"US"=>"^\d{5}([\-]?\d{4})?$",
			"UK"=>"^(GIR|[A-Z]\d[A-Z\d]??|[A-Z]{2}\d[A-Z\d]??)[ ]??(\d[A-Z]{2})$",
			"CA"=>"^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$"
		);
		
		if (empty($zip)) {
			$zipErr="Zip Code is required";
		} else { 
			if ($countryCode=="US" || $countryCode=="UK" || $countryCode=="CA") {
			   if ($zipVal[$countryCode]) {
				   if (!preg_match("/".$zipVal[$countryCode]."/i",$zip)) {
					   $zipErr="Invalid Zip Code";
					}
				}
			}
		}
		
		if (empty($email)) {
           $emailErr = "Email is required";
           } else {                    
                   //check if e-mail address is well-formed.
                   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                       $emailErr = "Invalid email format!";                                     
                   } 
			}
		}
		
	//Check whether there are errors.
	if ($addressErr !="" || $zipErr!="" || $emailErr!="")
	{
		
?>

<h1>Cart Description</h1>
<table class="tableOne">
  <tr>
	<th style="border: 1px solid blue;">Product</th>	
	<th style="border: 1px solid blue;">Total Price</th>
  </tr>
<?php	
	$cartTotal=0;
	//show the selected products and the total cost before completing the order.
	$sql="select st.ORDER_ITEM_ID, pi.ITEM_TITLE, pi.ITEM_PRICE, st.SEL_ITEM_QTY from store_shoppertrack as st left join product_item as pi on pi.PROD_ITEM_ID=st.SEL_ITEM_ID where SESSION_ID='$session_id'";
	$result=$conn->query($sql);
	if (!$result) {
		echo "An error occured";
	}
	 while ($cart=$result->fetch_array()) {
		 $cartTotal+=$cart['ITEM_PRICE'] * $cart['SEL_ITEM_QTY']; //counts the total price of all chosen products and quantities.
		 $item_title=stripslashes($cart['ITEM_TITLE']);			 
		 $item_title=stripslashes($cart['ITEM_TITLE']);
		 $item_price=$cart['ITEM_PRICE'];
		 $item_qty=$cart['SEL_ITEM_QTY'];	
		 $total_price=$item_qty * $item_price;		 
?>
	<tr>
	  <td style="border: 1px solid blue;"><?php echo $item_title; ?></td><td style="border: 1px solid blue;"><?php echo "$".number_format($total_price,2); ?></td>
	</tr>	
<?php		 
	} //end while.
?>
<tr>
  <td style="border: 1px solid blue;">&nbsp;</td><td style="border: 1px solid blue;"><strong>Grand Total: <?php echo "$".number_format($cartTotal,2); ?></strong></td>
</tr>
</table>
<form method='POST' action='checkOutProcess.php'>
<h1 class="userInfo">Customer's Information</h1>	
  <table class="tableTwo">        
    <tr>
		<td>Address:</td>
		<td>
			<input type="text" name="address" size="25" value="<?php echo $address;?>">
			<br>
			<span class="error"><?php echo $addressErr;?></span>
		</td>
	</tr>	
	 <tr>
		<td>ZIP Code:</td>
		<td>
		  <select name="countryCode">
			<option>US</option>
			<option>UK</option>
			<option>CA</option>       
			</select>&nbsp;
		  <input type="text" name="zip" size="19" maxlength="20" >
		  <br>
			<span class="error"><?php echo $zipErr; ?></span>
		</td>
	</tr>
	 <tr>
		<td>EMAIL:</td>
		<td>
			<input type="text" name="email" placeholder="name@example.com" size="25">
			<br>
			<span class="error"><?php echo $emailErr; ?></span>
		</td>	
	</tr>	
	 <tr>
		<td><input type="submit" class="submitTwo" value="Complete Order"></td>
	  </tr>
  </table>
</form>

<?php 
} else {  
  $cartTotal=0;
	//show the selected products and the total cost before completing the order.
	$sql="select st.ORDER_ITEM_ID, pi.ITEM_TITLE, pi.ITEM_PRICE, st.SEL_ITEM_QTY from store_shoppertrack as st left join product_item as pi on pi.PROD_ITEM_ID=st.SEL_ITEM_ID where SESSION_ID='$session_id'";
	$result=$conn->query($sql);
	if (!$result) {
		echo $conn->error;
	}
	 while ($cart=$result->fetch_array()) {
		 $cartTotal+=$cart['ITEM_PRICE'] * $cart['SEL_ITEM_QTY']; //counts the total price of all chosen products and quantities.
		 $item_title=stripslashes($cart['ITEM_TITLE']);			 
		 $item_title=stripslashes($cart['ITEM_TITLE']);
		 $item_price=$cart['ITEM_PRICE'];
		 $item_qty=$cart['SEL_ITEM_QTY'];	
		 $total_price=$item_qty * $item_price;			 
		} //end while.		 
	  /*stripslashes() function is useful to remove unnecessary characters like \,
	  while mysqli_real_escape_string is used for security*/
	  $address=stripslashes($_POST['address']);
	  $address=mysqli_real_escape_string($conn, $_POST['address']);
	   
	  $zip=stripslashes($_POST['zip']);  
	  $zip=mysqli_real_escape_string($conn, $_POST['zip']);
	 
	  $email=stripslashes($_POST['email']);  
	  $email=mysqli_real_escape_string($conn, $_POST['email']);
	  
	 //if the order is registered successfully the store_shoppertrack table's data will be deleted.
	 $sqlDelete="DELETE from store_shoppertrack WHERE SESSION_ID='$session_id'";
	 $resultDelete=$conn->query($sqlDelete);	
	 if (!$resultDelete) {
	   echo "<div style=\"color:red; text-align:center; font-size:20px;\">An error occurred!</div>";
	 } else {	  
		    $sql="INSERT INTO orders (ADDRESS,ZIP,EMAIL,TOTALPRICE,ORDER_DATE) VALUES ('$address','$zip','$email','$cartTotal',now())";	
		    $result=$conn->query($sql);
		
		    if (!$result) {
		  	  echo "<div style=\"color:red; text-align:center; font-size:20px;\">Your order could not be completed!</div>";
		    } else {		   		  
			  echo "<h1 style=\"color:red; margin-left:25%\">You entered the following information:</h1>";
			  echo "<h3 style=\"color:red; margin-left:25%\">Address: $address</h3>";
			  echo "<h3 style=\"color:red; margin-left:25%\">Zip Code: $zip</h3>";  
			  echo "<h3 style=\"color:red; margin-left:25%\">Email: $email</h3>";
			  echo "<h4 style=\"color:red; margin-left:25%\">Your order has been recorded,thank you for choosing our products.</h4>" ;		  		  		
			  echo "<script>setTimeout(\"location.href = 'index.php';\",5000);</script>"; //Redirect page in 5 seconds.
		   }
	   }
  }
  $conn->close();
?>
</body>
</html>