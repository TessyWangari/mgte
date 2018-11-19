<?php ob_start(); include("./dbconfig/dbconfig.php"); include("./dbconfig/shoppingmall.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>MarketGate - Home</title>

</head>

<body>
<div class="beauty_bgskin">
<?php include("./mallnav.php");?>
<!-- slide show -->
	<div class="beauty_mainbgdiv beauty_animate_left">
	<img src="./images/theme_images/s1.jpg" class="beauty_sslimg">
	<!--slide show animation-->
		<div class="beauty_coverdiv">
		<!--triodivcont-->
			<div class="beauty_coverdiv_cont beauty_animate_textnbtn_left">
			<br/><br/><br/><br/>
			<hr/>
			<h4 class="beauty_animate_textnbtn_left">Great Place</h4>
			<br/>
			<div align="center"><div class="beauty_homebtn beauty_animate_textnbtn_left"><a href="./offers">Get started</a></div></div>
			<br/><br/><hr/><br/><br/>
		</div>
		<!--triodivcont-->
	</div>
	<!--triodiv-->
</div>
<!-- slide show -->
<!-- slide show -->
	<div class="beauty_mainbgdiv beauty_animate_left">
	<img src="./images/theme_images/s2.jpg" class="beauty_sslimg">
	<!--slide show animation-->
		<div class="beauty_coverdiv">
		<!--triodivcont-->
			<div class="beauty_coverdiv_cont beauty_animate_textnbtn_left">
			<br/><br/><br/><br/>
			<hr/>
			<h4 class="beauty_animate_textnbtn_left">Great People</h4>
			<br/>
			<div align="center"><div class="beauty_homebtn beauty_animate_textnbtn_left"><a href="./offers">Get started</a></div></div>
			<br/><br/><hr/><br/><br/>
		</div>
		<!--triodivcont-->
	</div>
	<!--triodiv-->
</div>
<!-- slide show -->
<!-- slide show -->
	<div class="beauty_mainbgdiv beauty_animate_left">
	<img src="./images/theme_images/s3.jpg" class="beauty_sslimg">
	<!--slide show animation-->
		<div class="beauty_coverdiv">
		<!--triodivcont-->
			<div class="beauty_coverdiv_cont beauty_animate_textnbtn_left">
			<br/><br/><br/><br/>
			<hr/>
			<h4 class="beauty_animate_textnbtn_left">Great Businesses</h4>
			<br/>
			<div align="center"><div class="beauty_homebtn beauty_animate_textnbtn_left"><a href="./offers">Get started</a></div></div>
			<br/><br/><hr/><br/><br/>
		</div>
		<!--triodivcont-->
	</div>
	<!--triodiv-->
</div>
<!-- slide show -->
	<br />

	<!--title-->
	<div align="center">
		<div class="beauty_left_ttle"></div>
		<div class="beauty_ttle">Some of our <?php echo $bus_type;?> </div>
		<div class="beauty_left_ttle"></div>
	</div>
	<!--title-->
	<br />
	<br />
	<!--summary prods-->
	<div align="center">
	<?php while($homepageprods_res=mysqli_fetch_array($homepageprods_query)){
		$homeprodimgkey=$homepageprods_res['prod_id'];
		$hmeprodimg_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE image_itemid='$homeprodimgkey'");
		$hmeprodimg_res=mysqli_fetch_array($hmeprodimg_query);?>
  <a href="./productprof?prodid=<?php echo base64_encode($homepageprods_res['prod_id']); ?>" style="text-decoration:none;">
  	<div class="beauty_cartegory_home">
		<img src="<?php if($hmeprodimg_res['image_url']==''){ echo $logoimg; }else{echo $pathimages.str_replace("./","",$hmeprodimg_res['image_url']); }?>" class="beauty_cartegory_homeimg"/>
		<br />
		<br />
	<strong><?php echo $homepageprods_res['prod_name'];?></strong>
	<hr />

  </div>
  </a>
  <?php } ?>
  </div>
  	<!--summary prods-->
<br />
<br />
<!--busdescr-->
	<div align="center">
	<div class="beauty_sitecont">
	<br />
	<br />
	<!--title-->
	<div align="left">
		<div class="beauty_left_ttle"></div>
		<div class="beauty_ttle">Brief about us </div>
		<div class="beauty_left_ttle"></div>
	</div>
	<!--title-->
	<br />
		<?php echo $bus_descr;?>
<br />

	</div>
	</div>
	<!--busdescr-->
	<div align="center">
	<br />
<br />

		<!--title-->
	<div align="center">
		<div class="beauty_left_ttle"></div>
		<div class="beauty_ttle">Featured <?php echo $bus_type;?> </div>
		<div class="beauty_left_ttle"></div>
	</div>
	<!--title-->
	<br />
<br />

		<?php while($prodcartgrouphome_res=mysqli_fetch_array($prodcartgrouphome_query)){
			$homeprodimgkey=$prodcartgrouphome_res['prod_id'];
			$hmeprodimg_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE image_itemid='$homeprodimgkey'");
			$hmeprodimg_res=mysqli_fetch_array($hmeprodimg_query);
			?>
			<!--prod cart-->
				<div class="beauty_prodtray">
					<img src="<?php if($hmeprodimg_res['image_url']==''){ echo $logoimg; }else{echo $pathimages.str_replace("./","",$hmeprodimg_res['image_url']); }?>" class="beauty_prodlistimg"/>
					<div class="beauty_prodlist_descr">
					<strong ><?php echo $prodcartgrouphome_res['prod_name'];?></strong>
					<hr />

							Price : <?php echo $prodcartgrouphome_res['prod_price']; ?> /=
						</span> 
					<?php   $cutted = substr($prodcartgrouphome_res['prod_descr'], 0, 100) . '.....'; echo $cutted; ?>
						<br />
<br />

						<div class="beauty_homebtn" style="margin:1px; margin-bottom:10px;">  
						<a href="./productprof?prodid=<?php echo base64_encode($prodcartgrouphome_res['prod_id']); ?>" style="text-decoration:none;">View More</a>
						</div>
					</div>
				</div>
			<!--prod cart-->
			
			<?php } ?>	
			<br />
			<br />
			<br />
			<div class="beauty_homebtn" style="margin:1px; margin-bottom:10px;">  
				<a href="./offers" style="text-decoration:none;">View All</a>
			</div>
			<br />
			<br />
			<?php //include("./footer.php");?>
		</div>

<script type="text/javascript">
///======homeanime==============
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("beauty_mainbgdiv");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5500);    
}
///======homeanime==============
</script>
</div>
</body>
</html>
