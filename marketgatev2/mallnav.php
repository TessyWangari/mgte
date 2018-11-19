<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<meta name="viewport" content="width=device-width, initial - scale=1.0">
<link rel="stylesheet" type="text/css" href="./css/shoppingmall.css">

<link rel="icon" href="./images/marketgatelogo.png">
<div class="beauty_topmost">
		<div class="beauty_socialdiv">
		<a href="<?php echo $bus_facebook; ?>" target="_blank" style="text-decoration:none;">
			<img src="./images/fbtop.png" class="beauty_socialicon" />
		</a>
		<a href="<?php echo $bus_twitter; ?>" target="_blank" style="text-decoration:none;">
		<img src="./images/tweet.png" class="beauty_socialicon" />
		</a>
		<?php echo $bus_tel;?>
		<a href="<?php echo $bus_twitter; ?>" target="_blank" style="text-decoration:none;">
		<img src="./images/phone.png" class="beauty_socialicon" />
		</a>
		</div>
</div>
<div class="beauty_navdiv">
<a href="./home">
	<img src="./images/marketgatelogo.png" class="beauty_logoimgdesk"/>
		<div align="center" class="beauty_busname">
			<?php echo $bus_name;?><br />
 			<span class="beauty_slogan">One Stop Shopping Mall</span>
		</div>
	</a>
	<div class="beauty_menulinks"><a href="./home">Home</a></div>
<!--navelem-->
			<div class="beauty_menulinks dropdwn_container">
			  <div class="dropdwn_navelem"><a href="./offers">Shopping mall</a></div>
				<div class="dropdwn_cartdiv">
				<?php while($prodcartgroup_res=mysqli_fetch_array($prodcartgroup_query)){?>
				<a href="./offers?dropquery=<?php echo $prodcartgroup_res['prod_type'];?>"><?php echo $prodcartgroup_res['prod_type'];?></a>

				<?php } ?>
				<a href="./offers">View All</a>

			  </div>
			</div>
			<!--navelem-->
	<div class="beauty_menulinks"><a href="#">Contact Us</a></div>
	<div class="beauty_menulinks"><a href="./itemlist">My Account</a></div>

	<!--desknav-->
</div>