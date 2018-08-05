<?php
	include("header.php");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/httpXML.css">
<body>
<div class="divXML">
<button type="button" onclick="callProducts()">Display Products</button>
</div>
<table id="prod_id"></table>

<script>
function callProducts() {
  var xmlhttp = new XMLHttpRequest();
  
  if (window.XMLHttpRequest) {
	//code for modern browsers
 httpRequest=new XMLHttpRequest();
  } else {
	//code for old IE browsers
     httpRequest=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  httpRequest.onreadystatechange = function() { //execute when the ready state changes.
    if (this.readyState == 4 && this.status == 200) { //performs the action when the data is read.
      Products(this);
    }
  };
  //send asynchronous request so as to javascript not wait for the response.
  httpRequest.open("GET", "ProductDetails.xml", true); 
  httpRequest.send();
}
function Products(xml) {
  var i;
  var xmlInfo = xml.responseXML; //returns the response as XML.
  var table="<tr><th>CATEGORY&nbsp;TITLE</th><th>PRODUCT TITLE</th><th>DESCRIPTION</th><th>Price</th></tr>";
  var x = xmlInfo.getElementsByTagName("PRODUCTS");
  for (i = 0; i <x.length; i++) { 
    table += "<tr><td style=\"text-align:center\">" +
    x[i].getElementsByTagName("CATEGORYTITLE")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("PRODUCTTITLE")[0].childNodes[0].nodeValue +
    "</td><td>" +
	x[i].getElementsByTagName("DESCRIPTION")[0].childNodes[0].nodeValue +
    "</td><td>" + "$" +
	x[i].getElementsByTagName("PRICE")[0].childNodes[0].nodeValue +
    "</td></tr>";
  }
  document.getElementById("prod_id").innerHTML = table;
}
</script>
<a class="link" href="index.php">Home&nbsp;Page</a>
</body>
</html>