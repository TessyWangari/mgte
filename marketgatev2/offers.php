<?php ob_start(); include("./dbconfig/dbconfig.php"); include("./dbconfig/shoppingmall.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Offers</title>

</head>

<body>
<form method="post">
<div class="beauty_bgskin">
<?php include("./mallnav.php");?>
<br />
<br />
	<!--title-->
	<div align="center">
		<div class="beauty_left_ttle"></div>
		<div class="beauty_ttle">Shopping Mall </div>
		<div class="beauty_left_ttle"></div>
	</div>
	<!--title-->
	<br />
<br />
<div align="center">
		<?php while($homepageprods_res=mysqli_fetch_array($offerpageprods_query)){
		$homeprodimgkey=$homepageprods_res['prod_id'];
		$hmeprodimg_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE image_itemid='$homeprodimgkey'");
		$hmeprodimg_res=mysqli_fetch_array($hmeprodimg_query);?>
			<!--prod cart-->
				<div class="beauty_prodtray">
					<img src="<?php if($hmeprodimg_res['image_url']==''){ echo $logoimg; }else{echo $pathimages.str_replace("./","",$hmeprodimg_res['image_url']); }?>" class="beauty_prodlistimg"/>
					<div class="beauty_prodlist_descr">
					<strong ><?php echo $homepageprods_res['prod_name'];?></strong>
					<hr />

							Price : <?php echo $homepageprods_res['prod_price']; ?> /=
						</span> 
					<?php   $cutted = substr($homepageprods_res['prod_descr'], 0, 100) . '.....'; echo $cutted; ?>
						<br />
<br />

						<div class="beauty_homebtn" style="margin:1px; margin-bottom:10px;">  
						<a href="./productprof?prodid=<?php echo base64_encode($homepageprods_res['prod_id']); ?>" style="text-decoration:none;">View More</a>
						</div>
					</div>
				</div>
			<!--prod cart-->

		<?php }?>
		</div>
		<br />
<br />
<br />

<?php include("./footer.php");?></div>


</form>
</body>
</html>
