<?php
	session_start();
	session_id();
	$session_id=session_id();
	include ("includes/db_connection.php");
	//retrieve data.
	$sel_item_qty=$_POST['SEL_ITEM_QTY'];
	$sel_item_id=$_POST['SEL_ITEM_ID'];
	
	//checks whether the product has already been added to the shopping cart.
	$sqlCheck="select * from store_shoppertrack where SEL_ITEM_ID='$sel_item_id'";
	$resultCheck=$conn->query($sqlCheck);	
	if ($resultCheck->num_rows>=1) {
		#$msg="This product has already been added to your shopping cart!"; 
		$sqlUpdate="update store_shoppertrack SET SEL_ITEM_QTY='$sel_item_qty' where SEL_ITEM_ID='$sel_item_id'";
		if ($conn->query($sqlUpdate)) { //Update the quantity if the product is in the shopping cart.
			header ("Location: showcart.php");
		}
		else {
			echo "An error occured";
		}
	} else {

	//retrieve data from displayProducts.php.
	$prod_item_id=$_GET['prod_item_id'];
	$prod_id=$_GET['PROD_ID'];
	//join tables products and product_item to handle the products per category.
	$sql="select p.PROD_TITLE, pi.ITEM_TITLE, pi.ITEM_PRICE, pi.ITEM_DESCRIPTION, pi.ITEM_IMAGE from product_item as pi left join products as p on p.PROD_ID=pi.PROD_ID where pi.PROD_ITEM_ID='$prod_item_id'";
	$result2=$conn->query($sql);
	if (!$result2)
	{
		echo "An error occured";
	} else {
		$row=$result2->fetch_array(MYSQLI_BOTH); //for numbers.e.g.[1] and words ["abc"].
		//check whether there are products.
		if ($result2->num_rows<1) {
			echo "<h3>This product does not exist.</h3>";
		} else {
			//display the category of the chosen product.
			echo "<a class=\"products\" href=\"displayProducts.php?PROD_ID=".$prod_id."\">Back&nbsp;to&nbsp;category</a>";
			} 
				//add the order to the database.
				$sqlAdd="insert into store_shoppertrack (SESSION_ID, SEL_ITEM_ID, SEL_ITEM_QTY, DATE_ADDED) VALUES ('$session_id', '$sel_item_id', '$sel_item_qty', NOW())";		
				if ($conn->query($sqlAdd)) {						
					header ("Location: showcart.php");
				} else { 
				  echo "An error occured"; //shows error regarding the query.
				}
			}  
	}	
	$conn->close();
?>