<?php ob_start();  include("./dbconfig/dbconfig.php"); include("./dbconfig/democonf.php");?>
<!Doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial - scale=1.0">
<title>Market Gate Admin - Login</title></head>
<body id="fullnews">
<div align="center" class="bgplasma">
<form method="post" enctype="multipart/form-data">
<?php include("./navbar.php");?>

<br/><br/><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!--entrytray-->
<div class="marketgate_recmother" style="height:auto;">
		<div style="padding:10px; text-align:left;">
		<div class="marketgate_labelwidget">Enter Your details To Proceed</div>
		<br>
		<br/>
		<input type="email" class="marketgate_textwidget" name="txtclientmail" placeholder="Enter  Your Email" required/>
		<br/>
		<br/>
		<br/>
		<input type="password" class="marketgate_textwidget" name="txtclientpass" placeholder="Enter  Your password" required/>
		<br/>
		<br/>
		<div align="center">
		<input type="submit" class="marketgate_buttonwidget" name="loginclientbtn" value="Proceed"/>
		</div>
	</div>
</div>
<!--entrytray-->
</form>
</div>
</body>
</html>