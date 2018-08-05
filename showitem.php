<?php
	include ("header.php");
	include ("includes/db_connection.php");
	session_start();	
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/products.css">
</head>
<body>

<div style="color:blue; margin-left:20%">	
<h2>&nbsp;Digital Store - Product Detail</h2>
<?php
	//retrieve data from displayProducts.php.
	$prod_item_id=$_GET['prod_item_id'];
	$prod_id=$_GET['PROD_ID'];
	//join tables products and product_item to handle the products per category.
	$sql="select p.PROD_TITLE, pi.ITEM_TITLE, pi.ITEM_PRICE, pi.ITEM_DESCRIPTION, pi.ITEM_IMAGE from product_item as pi left join products as p on p.PROD_ID=pi.PROD_ID where pi.PROD_ITEM_ID='$prod_item_id'";
	$result=$conn->query($sql);
	if (!$result)
	{
		echo "An error occured";
	} else {
		$row=$result->fetch_array(MYSQLI_BOTH);	 //for numbers.e.g.[1] and words ["abc"].
		//check whether there are products.
		if ($result->num_rows<1) {
			echo "<h3>This product does not exist.</h3>";
		} else {
?>
</div>
<div>	
	<div style="width:50%; margin-left:25%; border: 1px solid #eaeaec; box-shadow:0; padding:10px;" align="center">
	<?php echo "<img style=\"height:275px;\" src=images/$row[4] alt=\"Product image\">"; //display image that is in the database. ?> 
		<h3 class="text-info"><?php echo $row[0]; //display PROD_TITLE ?></h3>
		<h4 class="text-info"><?php echo $row[1]; //display ITEM_TITLE ?>		
		<h4 class="text-danger">Price:<?php echo "$".$row[2]; //display ITEM_PRICE ?></h4>
		<h4 class="text-info"><?php echo $row[3]; //display ITEM_DESCRIPTION ?>
		<form method="POST" action="<?php echo "addtocart.php?prod_item_id=".$prod_item_id."";?>">
			Select Quantity:
			  <select name="SEL_ITEM_QTY" size="1">
				<option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
			  </select>
		</h4>		
		<input type="hidden" name="SEL_ITEM_ID" value="<?php echo $_GET['prod_item_id']; ?>">		
		<h4>
		
<?php 
	}
	//display the category of the chosen product.
	echo "<a class=\"products\" href=\"displayProducts.php?PROD_ID=".$prod_id."\">Back&nbsp;to&nbsp;category</a>";
	}
	$conn->close();
?>
<input type="submit" name="submit" value="Add to cart"></h4>
</form>		
</div>
<div align="center" style="margin-top:2%;">
<?php
	include ("footer.php");
?>
</div>
</body>
</html>