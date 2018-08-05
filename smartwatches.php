<?php
	include ("header.php");
?>
<!DOCTYPE html>
<html>	
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/gallery.css">
  <script type="text/javascript" src="script/jquery-3.2.0.js"></script>  
   <link href="css/description.css" rel="stylesheet">  
  <link href="css/picAnimation.css" rel="stylesheet">
  <script type="text/javascript" src="script/ProdImages.js"></script>
  <script src="script/animation.js"></script>
  <script src="script/description.js"></script>
</head>
<body>
<div class="wrapper" style="margin-left:10%;">
  <div class="content">	
	<div class="main">
      <h1>Smartwatches</h1>
      <h2>Fitbit Blaze Smart Fitness Watch</h2>
      <div class="prod_description">
        Fitbit Blaze syncs automatically and wirelessly to 200+ leading iOS, Android and Windows devices using Bluetooth 4.0 wireless technology.
      </div>
      <h2>Pebble Time Steel Smartwatch</h2>
       <div class="prod_description">
        This smartwatch includes Pebble Health, a built-in activity and sleep tracker with daily reports and weekly insights.
       </div>
      <h2>Samsung Gear S3</h2>
     <div class="prod_description">
        This smartwatch is compatible with Android 4.4 (KitKat) and later with 1.5GB RAM.
      </div>
      <h2>ASUS ZenWatch 2</h2>
       <div class="prod_description">
        ASUS ZenWatch 2 Smartwatch has built-in Wi-Fi which extends the range and connectivity with your phone.
      </div>
      <h2>Apple Watch Series 2</h2>
       <div class="prod_description">
         This smartwatch consists of watchOS 3,accelerometer,gyroscope,light sensor,activity tracker,heart monitor,microphone and speaker,bluetooth.
       </div>
	<h1>Animation</h1>
      <div id="animatedPicture">
        <img src="images/smartWatch.jpg" alt="Gaming Headsets" id="photo">
        <div id="caption">Smartwatches</div>
      </div>
	<div id="submenu">
	<h1 style="color:White">Products' Photos</h1>
	<div id="submenu">
		<ul>
			<li>
				<a href="images/logitech.gif" alt="Fitbit&nbsp;Blaze&nbsp;Smart&nbsp;Fitness&nbsp;Watch">Fitbit Blaze Smart Fitness Watch</a>
			</li>
			<li>
				<a href="images/kefmuo.gif"  alt="Pebble&nbsp;Time&nbsp;Steel&nbsp;Smartwatch">Pebble Time Steel Smartwatch</a>
			</li>
			<li>
				<a href="images/jbl.gif"  alt="Samsung&nbsp;Gear&nbsp;S3">Samsung Gear S3</a>
			</li>
			<li>
				<a href="images/libratone.gif"  alt="ASUS&nbsp;ZenWatch&nbsp;2">ASUS ZenWatch 2</a>
			</li>
			<li>
				<a href="images/amazon.gif"  alt="Apple&nbsp;Watch&nbsp;Series&nbsp;2">Apple Watch Series 2</a>
			</li>			
		</ul>
	</div>
  </div>
  <div id="image_id">
	 <br>		
     <img id="placeholder" src="images/placeholder.jpg" alt="Products' Photos" width="300" height="300">
     <p id="ImageCaption" class="caption">&nbsp;</p>
  </div>
    </div>
  </div>
</div>
<div align="center">
<?php
	include ("footer.php");
?>
</div>
</body>
</html>