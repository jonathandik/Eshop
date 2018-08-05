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
      <h1>Wireless Chargers</h1>
      <h2>Anker PowerPort Qi 10 Charger</h2>
      <div class="prod_description">
        The Anker PowerPort Qi can charge some devices faster than a standard wireless charger.
      </div>
      <h2>Satechi Charger</h2>
       <div class="prod_description">
        This charger has a stylish design and it can also protect your phone and prevent it from sliding around.
       </div>
      <h2>FLI Charger</h2>
     <div class="prod_description">
        Unlike most Qi chargers on the market,FLI chargers don’t have to be placed in a specific orientation in order to work.
      </div>
      <h2>Choetech Iron Stand</h2>
       <div class="prod_description">
        Choetech Iron Stand can work with any Qi-compatible smartphone and you can add receivers or cases to phones like the iPhone.
      </div>
      <h2>Montar Air Car Mount</h2>
       <div class="prod_description">
         Montar has created an excellent cradle for the car with built-in Qi wireless charging.
       </div>
	<h1>Animation</h1>
      <div id="animatedPicture">
        <img src="images/wirelessCharger.jpg" alt="Gaming Headsets" id="photo">
        <div id="caption">Wireless Chargers</div>
      </div>
	<div id="submenu">
	<h1 style="color:White">Products' Photos</h1>
	<div id="submenu">
		<ul>
			<li>
				<a href="images/anker.gif" alt="Anker&nbsp;PowerPort&nbsp;Qi&nbsp;10&nbsp;Charger">Anker PowerPort Qi 10 Charger</a>
			</li>
			<li>
				<a href="images/satechi.gif"  alt="Satechi&nbsp;Charger">Satechi Charger</a>
			</li>
			<li>
				<a href="images/fli.gif"  alt="FLI&nbsp;Charger">FLI Charger</a>
			</li>
			<li>
				<a href="images/choetech.gif"  alt="Choetech&nbsp;Iron&nbsp;Stand">Choetech Iron Stand</a>
			</li>
			<li>
				<a href="images/montar.gif"  alt="Montar&nbsp;Air&nbsp;Car&nbsp;Mount">Montar Air Car Mount</a>
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