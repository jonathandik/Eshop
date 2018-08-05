<?php
error_reporting(E_ERROR); //hide errors.
include ("header.php");
include ("includes/db_connection.php"); //database connection
//retrieve the selected category from the database.
$sql="SELECT PROD_ID, PROD_TITLE, PROD_DESCRIPTION from PRODUCTS WHERE PROD_ID";	
$result=$conn->query($sql);
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/displayProducts.css">
</head>
<body>

<div class="prodDiv">
<?php
$prod_id=$_GET['PROD_ID'];	
		
if ($result->num_rows>0) {	 //check whether there are products.
	echo "<h1 class=\"prodTable\"><strong>Select Product</strong></h1>";
	//if the query is true display product categories.
	while ($row=$result->fetch_assoc()) {				
		$prod_id2=$row['PROD_ID'];		
		$prod_title=strtoupper(stripslashes($row['PROD_TITLE']));
		$prod_desc=stripslashes($row['PROD_DESCRIPTION']);
		echo "<table class=\"prodTable\">";	
		//display the details of each category's products within the same page.
		echo "<tr><td><a class=\"productsHeaders\" href='$_SERVER[PHP_SELF]?PROD_ID=".$prod_id2."'><strong>$prod_title</strong></a></td></tr><hr>";		
		echo "<tr><td>$prod_desc</td></tr>";							
		echo "</table>";
		
		//match the selected categories with those in the database.
		if ($prod_id==$prod_id2) {	
				$sql2="select PROD_ITEM_ID,ITEM_TITLE,ITEM_PRICE from PRODUCT_ITEM WHERE PROD_ID='$prod_id'";
				$result2=$conn->query($sql2);					
				 {											
					while ($productItems=$result2->fetch_assoc()) {
						$prod_item_id=$productItems['PROD_ITEM_ID'];
						$item_title=stripslashes($productItems['ITEM_TITLE']);
						$item_price=$productItems['ITEM_PRICE'];
						
						//show each product's details in a new page.
						echo "<a class=\"productsDetails\" href='showitem.php?prod_item_id=".$prod_item_id."&PROD_ID=".$prod_id."'>$item_title</a> (\$$item_price)<br>";						
						}						
					}							
				}
			}
		} else {
				echo "An error occured"; //if an error ocurs show it.
		}
$conn->close();
?>
</div>
<div align="center" style="margin-top:2%;">
<?php
	include ("footer.php");
?>
</div>
</body>
</html>