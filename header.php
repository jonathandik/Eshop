<?php
	error_reporting(E_ERROR); //hides errors.
	session_start();
	session_id();
	$session_id=session_id();
	include ("includes/db_connection.php"); //connect to the database.	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>My Digital Store</title>
	<!-- The following tag is used to make the site responsive-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--The following library has been taken from http://fontawesome.io/-->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/headerMenuStyle.css">
	<!--The following library has been taken from https://www.w3schools.com-->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	<script type="text/javascript" src="script/generalScript.js"></script>
	<script type="text/javascript" src="script/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="script/rating.js"></script>	
</head>
<body>
<div align="center">
 <ul>
        <li><a href="index.php">Home</a></li>		
        <li><a href="displayProductsInfo.php">About</a></li>
		<li><a href="displayProducts.php">Store</a></li>
        <li>
            <a href="">Categories &#9662;</a>
            <ul class="dropdown">
                <li><a href="gamingheadsets.php">Gaming&nbsp;Headsets</a></li>
                <li><a href="wirelesschargers.php">Wireless&nbsp;Chargers</a></li>
                <li><a href="waterproofcases.php">Waterproof&nbsp;Cases</a></li>
				<li><a href="bluetoothspeakers.php">Bluetooth&nbsp;Speakers</a></li>
				<li><a href="smartwatches.php">Smartwatches</a></li>
            </ul>
        </li>		
		<?php 			
			if ($_SESSION['logged']==true) //User logged in
			{					
				$email=$_SESSION['email'];	
				$sql="select FIRSTNAME,EMAIL from users WHERE EMAIL='$email'";
				if ($conn->query($sql)) {					
					$result=$conn->query($sql);
					$row=$result->fetch_array();
				}
				else {
				//if an error occurs regarding the query, show it.
						echo "<h5>An error occured!</h5>"; 
				}
				echo "<li><a href=\"welcome.php\">Welcome ".$row['FIRSTNAME']."</a></li>";				
			} else if($_SESSION['logged']==false) {	 //User didn't log in.			
				echo "<li><a href=\"registration.php\">Sign Up</a></li>";
				echo "<li><a href=\"login.php\">Sign In</a></li>";
			}
			
			//show number of products in header.
			$sqlCart="select count(1) from store_shoppertrack where SESSION_ID='$session_id'";
			if ($conn->query($sqlCart)) {					
					$result2=$conn->query($sqlCart);					
					$row2=$result2->fetch_array();
					$totalProducts = $row2[0];
					
					if ($totalProducts<1) {
						$totalProducts="";  //if there isn't any product in the shopping cart unset the variable.
					}
				}
				else {
				//if an error occurs regarding the query, show it.
						echo "<h5>An error occured!</h5>"; 
				}
			//show the total products of the shopping cart in menu.
			echo "<li><a href=\"showcart.php\"><i class=\"fa fa-shopping-cart\">".$totalProducts." Cart</i></a></li>";
			$conn->close();
		?>
		<li><a href="contact.php">Contact</a></li>
    </ul>
</div>
</body>
</html>