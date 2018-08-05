<?php
error_reporting(E_ERROR); //hides errors.
include ("header.php");
session_start();
$session_id=session_id();
include ("includes/db_connection.php"); //database connection
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/orders.css">
</head>
<body>
<h1 style="margin-left:35%">Your Shopping Cart</h1>
<hr>
<table class="tableCart">
  <tr>
	<th class="tableCart">Product</th>
	<th class="tableCart">Item Price</th>
	<th class="tableCart">Quantity</th>	
	<th class="tableCart">Total Price</th>
	<th class="tableCart">Action</th>
  </tr>
<?php
$cartTotal=0;
//join store_shoppertrack and product_item,as both tables' information is needed for the shopping cart.
$sql="select st.ORDER_ITEM_ID, pi.ITEM_TITLE, pi.ITEM_PRICE, st.SEL_ITEM_QTY from store_shoppertrack as st left join product_item as pi on pi.PROD_ITEM_ID=st.SEL_ITEM_ID where SESSION_ID='$session_id'";
$result=$conn->query($sql);
if (!$result) {
	echo "An error occured!";
}
if ($result->num_rows<1) //check whether there are any products in the sopping cart.
{
	echo "<h3 style=\"margin-left:40%; color:blue;\">Your cart is empty.</h3>";
} else {	
  while ($cart=$result->fetch_array()) {
	$cartTotal+=$cart['ITEM_PRICE'] * $cart['SEL_ITEM_QTY']; //counts the total price of all chosen products and quantities.
	$id=$cart['ORDER_ITEM_ID'];
	$item_title=stripslashes($cart['ITEM_TITLE']);
	$item_price=$cart['ITEM_PRICE'];
	$item_qty=$cart['SEL_ITEM_QTY'];	
	$total_price=$item_qty * $item_price;	
?>
<tr>
  <td class="tableCart"><?php echo $item_title; ?></td>
  <td class="tableCart"><?php echo "$".$item_price; ?></td>
  <td class="tableCart"><?php echo $item_qty; ?></td>
  <td class="tableCart"><?php echo "$".number_format($total_price,2); //add .00 value ?></td>  
<?php echo "<td class=\"tableCart\"><a class=\"cart\" href=\"removefromcart.php?id=$id\">remove</a></td>"; 
	}	
 } 
 echo "<tr><td class=\"tableCart\"><a class=\"cart\" href=\"displayProducts.php\"><strong>Continue shopping</strong></a></td><td>&nbsp;</td><td>&nbsp;</td><td class=\"tableCart\"><strong>Grand Total: $".number_format($cartTotal,2)."</strong></td><td class=\"tableCart\"><a class=\"cart\" href=\"removeAllfromCart.php\"><strong>remove all</strong></a></td></tr>";
 $conn->close();	
?>
</table>
<hr>

<?php
	//display the checkout option only when there is at least one product in the shopping cart.
	if (isset($total_price)) {
	//display the grand total in a new page.
	echo "
		  <form method=\"POST\" action=\"checkout.php\">		   
		   <input type=\"hidden\" name=\"cartTotal\" value=\"$cartTotal\">
		   <input type=\"submit\" class=\"submitOne\" value=\"Checkout\">
		  </form>
		";				
	}
?>	
</body>
</html>