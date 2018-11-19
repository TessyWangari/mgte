<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<meta name="viewport" content="width=device-width, initial - scale=1.0">
<link rel="stylesheet" type="text/css" href="./css/marketgate.css">
<link rel="icon" href="./images/marketgatelogo.png">
<style>
    .marketgate_name {
    width: auto;
    vertical-align: top;
    margin-top: 20px;
    font-weight: bold;
    display: inline-block;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
}
</style>
<div class="marketgate_navribbon">
    	<div class="e-walletlogobox" style="float:left;">
		<a href="./home">
		<img src="./images/marketgatelogo.png" style="width: 43px; height: 43px;">
		<div class="marketgate_name"><span style="color:#006633;">MarketGate </span><span  style="color:#006699">Portal</span></div>
		</a>
	</div>
	<div class="marketgate_bardiv_btn"><a href="./home">Home</a></div>
	<?php if(isset($_SESSION['marketgate_app_logged'])){?>
	<div class="marketgate_bardiv_btn"><a href="./uploaditem">Add New Item</a></div>
	<div class="marketgate_bardiv_btn"><a href="./itemlist?edititems">Manage items</a></div>
	<div class="marketgate_bardiv_btn"><a href="./itemlist">Item List</a></div>
	<div class="marketgate_bardiv_btn"><a href="./itemlist?logout">Logout</a></div>
	<?php }else{?>
	<div class="marketgate_bardiv_btn"><a href="./autologin">Start Here</a></div>	
	<?php }?>
</div>
