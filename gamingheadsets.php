<?php
	include ("header.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/gallery.css"> 
   <link href="css/description.css" rel="stylesheet">  
  <link href="css/picAnimation.css" rel="stylesheet">
  <script type="text/javascript" src="script/jquery-3.2.0.js"></script>  
  <script type="text/javascript" src="script/ProdImages.js"></script>
  <script src="script/animation.js"></script>
  <script src="script/description.js"></script>
</head>
<body>
<div class="wrapper" style="margin-left:10%;">
  <div class="content">	
	<div class="main">
      <h1>Gaming Headsets</h1>
      <h2>Playstation VR</h2>
      <div class="prod_description">
        Playstation Virtual Reality Headsets provide a very high sound and video quality,particularly when playing 3D games.
      </div>
      <h2>Sony Wireless Stereo Headset 2.0</h2>
       <div class="prod_description">
        Sony Wireless Stereo Headsets do not only have a unique design but they are also compatible with every device.
       </div>
      <h2>Spartan Gear PS4</h2>
     <div class="prod_description">
        You will be able to face any opponent thanks to the comfort and sound quality of Spartan Gear Bluetooth Headset.
      </div>
      <h2>Sony PS4 Platinum Wireless Headset</h2>
       <div class="prod_description">
        Sony PS4 Platinum Wireless Headsets provide excellent communication with your teammates.
      </div>
      <h2>Turtle Beach Stealth 520</h2>
       <div class="prod_description">
         Turtle Beach Stealth 520 Headsets thanks to its great battery provide up to 15 hours gaming completely wirelessly!
       </div>
	<h1>Animation</h1>
      <div id="animatedPicture">
        <img src="images/gamingHeadset.jpg" alt="Gaming Headsets" id="photo">
        <div id="caption">Gaming Headsets</div>
      </div>
	<div id="submenu">
	<h1 style="color:White">Products' Photos</h1>
	<div id="submenu">
		<ul>
			<li>
				<a href="images/psvr.gif" alt="PS&nbsp;VR">PS VR</a>
			</li>
			<li>
				<a href="images/sonystereo.gif"  alt="Sony&nbsp;Stereo">Sony Stereo</a>
			</li>
			<li>
				<a href="images/spartan.gif"  alt="Spartan&nbsp;Gear&nbsp;PS4">Spartan Gear PS4</a>
			</li>
			<li>
				<a href="images/sonyplatinum.gif"  alt="Sony&nbsp;PS4&nbsp;Platinum">Sony PS4 Platinum</a>
			</li>
			<li>
				<a href="images/turtlebeach.gif"  alt="Turtle&nbsp;Beach&nbsp;Stealth&nbsp;520">Turtle Beach Stealth 520</a>
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