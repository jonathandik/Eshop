<?php
	session_start();
	include ("includes/db_connection.php");
	$email=$_SESSION['email'];
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/changeInfo.css">
</head>

<form method='POST' action='welcomeChangeInfoProcess.php'>
    <table>
      <tr>
        <td>First Name:</td>
        <td><input type="text" name="firstname" size="25"></td>
      </tr>
      <tr>
        <td>Last Name:</td>
        <td><input type="text" name="lastname" size="25"></td>
      </tr>
      <tr>
        <td>Age:</td>
        <td><select name="agerange" size="1">
        <option>Under 18</option>
        <option>18 - 24</option>
        <option>25 - 34</option>
        <option>35 - 44</option>
        <option>45 - 54</option>
        <option>55 - 64</option>
        <option>65 and older</option>
        </select> </td>
      </tr>
      <tr>
        <td>Sex:</td>
        <td><input type="radio" name="sex" value="Male">Male 
            <input type="radio" name="sex" value="Female">Female
        </td>
      </tr>
      <tr>
        <td>Phone Number:</td>
        <td>
        <input type="text" name="phone" size="25" maxlength="15" placeholder="+XX-XXX-XXXXXXX"></td>
      </tr>
      <tr>
        <td>E-mail:</td>
        <td><input type="text" name="email" size="25" placeholder="name@example.com"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>        
      </tr>            
      <tr>
        <td>&nbsp;</td>       
      </tr>
	  <tr>
        <td>&nbsp;</td>       
      </tr>
	  <tr>
        <td>&nbsp;</td>       
      </tr>
	   <tr>
        <td>&nbsp;</td>       
      </tr>
	  <tr>
		<td>&nbsp;</td>
	</tr>	
	<tr>
		<td>&nbsp;</td>
	</tr>
	</table>
	<table style="width:100%">
      <tr>        
        <td style="font-size:14px;"><input type="checkbox" name="specialoffers" value=" "> Check the box to receive special offers from us via email</td>
      </tr>
	  <tr>
		<td><input type="submit" class="submit" VALUE="Update Information"></td>
	  </tr>
    </table>  
</form>
</html>