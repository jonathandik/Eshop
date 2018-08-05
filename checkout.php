<?php
error_reporting(E_ERROR); //hides errors.
include ("header.php");
include ("includes/db_connection.php"); //database connection
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/orders.css">
</head>
<body>
<h1>Cart Description</h1>
<table class="tableOne">
  <tr>
	<th style="border: 1px solid blue;">Product</th>	
	<th style="border: 1px solid blue;">Total Price</th>
  </tr>
<?php
	//show the selected products and the total cost before completing the order.
	$sql="select st.ORDER_ITEM_ID, pi.ITEM_TITLE, pi.ITEM_PRICE, st.SEL_ITEM_QTY from store_shoppertrack as st left join product_item as pi on pi.PROD_ITEM_ID=st.SEL_ITEM_ID where SESSION_ID='$session_id'";
	$result=$conn->query($sql);
	if (!$result) {
		echo "An error occured!";
	}
	 while ($cart=$result->fetch_array()) {
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
	 }	
	//display grand total.
	$cartTotal=$_POST['cartTotal'];					
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
		<td><input type="text" name="address" size="25"></td>
	</tr>
	 <tr>
		<td>ZIP Code:</td>
		<td>
		  <select name="countryCode">
			<option>US</option>
			<option>UK</option>
			<option>CA</option>       
			</select>&nbsp;
		  <input type="text" name="zip" size="19" maxlength="20">
		</td>
	</tr>
	 <tr>
		<td>EMAIL:</td>
		<td><input type="text" name="email" placeholder="name@example.com" size="25"></td>
	</tr>
	 <tr>	    
		<td><input type="submit" class="submitTwo" value="Complete Order"></td>
	  </tr>
  </table>
</form>

</body>
</html>