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
  <script type="text/javascript" src="script/jquery-3.2.0.js"></script>
  <link href="css/picAnimation.css" rel="stylesheet">
  <script type="text/javascript" src="script/ProdImages.js"></script>
  <script src="script/animation.js"></script>
  <script src="script/description.js"></script>
</head>
<body>
<div class="wrapper" style="margin-left:10%;">
  <div class="content">	
	<div class="main">
      <h1>Bluetooth Speakers</h1>
      <h2>Logitech Bluetooth Speaker</h2>
      <div class="prod_description">
        Logitech Bluetooth Speakers are known for their water resistance and gesture controlls.
      </div>
      <h2>KEF Muo Bluetooth Speaker</h2>
       <div class="prod_description">
        The KEF Muo is a gorgeous compact wireless speaker crafted from metal.
       </div>
      <h2>JBL Clip 2 Portable Speaker</h2>
     <div class="prod_description">
        The recently launched JBL Clip 2 has a battery that can last up to eight hours.
      </div>
      <h2>Libratone ZIPP Bluetooth Speaker</h2>
       <div class="prod_description">
        The redesigned Libratone ZIPP is one of the most stylish portable wireless speakers available today.
      </div>
      <h2>AmazonBasics Nano Portable Speaker</h2>
       <div class="prod_description">
         This tiny Bluetooth speaker by AmazonBasics is cute, compact, and splash-resistant.
       </div>
	<h1>Animation</h1>
      <div id="animatedPicture">
        <img src="images/bluetoothSpeaker.jpg" alt="Gaming Headsets" id="photo">
        <div id="caption">Bluetooth Speakers</div>
      </div>
	<div id="submenu">
	<h1 style="color:White">Products' Photos</h1>
	<div id="submenu">
		<ul>
			<li>
				<a href="images/logitech.gif" alt="Logitech&nbsp;Bluetooth&nbsp;Speaker">Logitech Bluetooth Speaker</a>
			</li>
			<li>
				<a href="images/kefmuo.gif"  alt="KEF&nbsp;Muo&nbsp;Bluetooth&nbsp;Speaker">KEF Muo Bluetooth Speaker</a>
			</li>
			<li>
				<a href="images/jbl.gif"  alt="JBL&nbsp;Clip&nbsp;2&nbsp;Portable&nbsp;Speaker">JBL Clip 2 Portable Speaker</a>
			</li>
			<li>
				<a href="images/libratone.gif"  alt="Libratone&nbsp;ZIPP&nbsp;Bluetooth&nbsp;Speaker">Libratone ZIPP Bluetooth Speaker</a>
			</li>
			<li>
				<a href="images/amazon.gif"  alt="AmazonBasics&nbsp;Nano&nbsp;Portable&nbsp;Speaker">AmazonBasics Nano Portable Speaker</a>
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