<?php
	include ("header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>

<div id="location" style="width:80%;height:600px; margin-left:10%; margin-top:4%"></div>

<script>
function eshopLocation() {
  var myLocation = new google.maps.LatLng(37.571015,-85.738512);
  var mapCanvas = document.getElementById("location");
  var mapOptions = {center: myLocation, zoom: 14,mapTypeId:google.maps.MapTypeId.HYBRID};  
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myLocation, animation: google.maps.Animation.BOUNCE});
  marker.setMap(map);
  var addressInfo = new google.maps.InfoWindow({
    content: "175 Fictitious Street<br>Hodgenville,Kentucky<br>42748"
  });
  addressInfo.open(map,marker);	
  // Zoom to 9 when clicking on marker
  google.maps.event.addListener(marker,'click',function() {

    map.setZoom(18);
    map.setCenter(marker.getPosition());
  });	
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQi7i1zcASL0HeiI-M0uEDs3hgt2IW2dY&callback=eshopLocation"></script>

<div style="margin-left:10%; margin-top:4%; bottom: 5%; color:blue">
	<strong>Email Address:</strong> <a class="contact" href="mailto:fictitiousshop@example.com">fictitiousshop@example.com</a><br>
	<strong>Phone number:</strong> +00-000-0000000
</div>

<div style="margin-top:4%; text-align:center">
<?php
	include ("footer.php");
?>
</div>
</body>
</html>