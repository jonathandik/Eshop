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
      <h1>Waterproof Phone Cases</h1>
      <h2>Insten Waterproof Case</h2>
      <div class="prod_description">
        Insten Waterproof Cases are compatible with Samsung Galaxy S7,iPhone 6 and 5S HTC Desire smartphones.
      </div>
      <h2>Dry Pak Waterproof Case</h2>
       <div class="prod_description">
        Dry Pak Waterproof Cases have stylus holder on front with clear TPU back.
       </div>
      <h2>JETech Universal Waterproof Case</h2>
     <div class="prod_description">
        JETech Universal Waterproof Cases fit all smarthones up to 6.0" diagonal size.
      </div>
      <h2>Dirt Snow Proof Protective Case</h2>
       <div class="prod_description">
        Dirt Snow Proof Protective Cases are lighweight,durable and rugged.
      </div>
      <h2>Ozark Trail Waterproof Case</h2>
       <div class="prod_description">
         Ozark Trail Waterproof Cases are touchscreen-friendly.
       </div>
	<h1>Animation</h1>
      <div id="animatedPicture">
        <img src="images/waterproofPhoneCase.jpg" alt="Gaming Headsets" id="photo">
        <div id="caption">Waterproof Phone Cases</div>
      </div>
	<div id="submenu">
	<h1 style="color:White">Products' Photos</h1>
	<div id="submenu">
		<ul>
			<li>
				<a href="images/insten.gif" alt="Insten&nbsp;Waterproof&nbsp;Case">Insten Waterproof Case</a>
			</li>
			<li>
				<a href="images/drypak.gif"  alt="Dry&nbsp;Pak&nbsp;Waterproof&nbsp;Case">Dry Pak Waterproof Case</a>
			</li>
			<li>
				<a href="images/jetech.gif"  alt="JETech&nbsp;Universal&nbsp;Waterproof&nbsp;Case">JETech Universal Waterproof Case</a>
			</li>
			<li>
				<a href="images/dirtsnow.gif"  alt="Dirt&nbsp;Snow&nbsp;Proof&nbsp;Protective&nbsp;Case">Dirt Snow Proof Protective Case</a>
			</li>
			<li>
				<a href="images/ozark.gif"  alt="Ozark&nbsp;Trail&nbsp;Waterproof&nbsp;Case">Ozark Trail Waterproof Case</a>
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