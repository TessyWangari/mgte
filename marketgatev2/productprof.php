<?php ob_start(); include("./dbconfig/dbconfig.php"); include("./dbconfig/shoppingmall.php"); 

$urltoshare=str_replace(".php","","http://".$_SERVER['HTTP_HOST'].''. $_SERVER['PHP_SELF']."?prodid=".base64_encode($prodres['prod_id']));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Profile - <?php echo $prodres['prod_name'];?></title>
</head>

<body>
<div align="center" class="coverdivagehome">
	<?php include("mallnav.php");?>
<!--wrapper-->
<div class="fashion_contwrapper">
	<div class="fashion_top_banner">
		<div class="fashion_topbannercover">
		<br />
		<br />

			<!--title-->
	<div align="center">
		<div class="beauty_left_ttle"></div>
		<div class="beauty_ttle"><?php echo $prodres['prod_name'];?></div>
		<div class="beauty_left_ttle"></div>
	</div>
	<!--title-->
		</div>
	<div class="busdescrdiv beauty_bgskin">
	<!--proprofile-->
	<div class="fashion_proftile">
		<!--thumb-->
		<div class="fashion_thumbnailstrip">
		<a href="productprof?prodid=<?php echo base64_encode($prodkey); ?>#imgnav">
		<img src="./images/upnaway.png" style="height:40px; width:40px;" />
		</a>
		<?php while($imgthumb=mysqli_fetch_array($allprodprofimg_query)){?>
		<img src="<?php  echo $pathimages.str_replace("./", "",$imgthumb['image_url']); ?>" class="fashion_thumbimg" />
		<?php } ?> 
		<a href="productprof?nxtimg=<?php echo base64_encode($prodprofimg_res['imgkey']); ?>&amp;prodid=<?php echo base64_encode($prodkey); ?>#imgnav">
		<img src="./images/downarrow.png" style="height:40px; width:40px;" />
		</a>
		</div>
		<!--thumb-->
		<!--barr-->
		<div class="fashion_decsrprod">
			<h3 class="fashion_headttle"><?php echo $prodres['prod_name'];?></h3>
				<br />			
			<span style="font-size:12px; font-weight:bold;">
			Price: <?php echo $prodres['prod_price']; ?>/=
			</span>
			<br />
<br />
			<!--cont-->
			<?php echo nl2br($prodres['prod_descr']); ?>
			<br />
<!--book recoomend-->
<br />
<br />

		<div class="fashionshare_actionbtn">
			<a href="#">
				<img src="./images/checkout.png" class="beauty_socialicon" style="margin-top:3px;" />
				<?php echo $bookbutton;?>
			</a>
		</div>
		<div class="fashionshare_actionbtn">
				<a href="#">
					<img src="<?php echo "./images/thumb_up.png";?>" class="beauty_socialicon" style="margin-top:3px;" />
				<span style="font-family:Arial, Helvetica, sans-serif; margin-right:3px;"> Recommend</span>
				</a>
		</div>
		<div class="fashionshare_actionbtn">
				<a href="./itemlist?payitem&itemtkn=<?php echo base64_encode($prodres['prod_id']);?>">
					<img src="<?php echo "./images/checkout.png";?>" class="beauty_socialicon" style="margin-top:3px;" />
				<span style="font-family:Arial, Helvetica, sans-serif; margin-right:3px;"> Pay Via M-pesa</span>
				</a>
		</div>
		<!--book recoomend-->	
		</div>
	<div class="fashion_thumbnailstrip">
		<!--share buttons -->
		
		<span style="vertical-align:top;">Share</span>
			<br />
			<br />

				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $urltoshare;?>" target="_blank" rel="nofollow" class="a__share_fb">
					<img src="./images/fbtop.png" class="beauty_socialicon"/>
				</a>
				<a href="https://twitter.com/share" target="_blank" class="twitter-share-button"{count} data-url="<?php echo $urltoshare;?>" data-text="Hi check this one, <?php echo " MarketGate - ".$prodres['prod_name'];?>" data-via="Clearphrases"> 
					<img src="./images/tweet.png" class="beauty_socialicon"/>
				</a>
				<a href="whatsapp://send?text=Hi check this one, <?php "MarketGate - ".$prodres['prod_name'];?> | <?php echo $urltoshare;?>" data-action="share/whatsapp/share" >
				<img src="./images/watsap.png" class="beauty_socialicon"/>
				</a><br/>
<!-- Place this tag in your head or just before your close body tag. -->
				<script src="https://apis.google.com/js/platform.js" async defer></script>
				
				<!-- Place this tag where you want the share button to render. -->
				<div class="g-plus" data-action="share" data-height="24" data-href="<?php echo $urltoshare;?>"></div>
		<!--share buttons -->
		
	</div>				
				<img src="<?php echo $prodprofimg; ?>" class="fashion_mainimg" />

	<!--title-->
	<div align="center">
		<div class="beauty_left_ttle"></div>
		<div class="beauty_ttle">Related</div>
		<div class="beauty_left_ttle"></div>
	</div>
	<!--title-->
	<br />
	<br />
	
	</div>

	<!--proprofile-->
	<!--related-->
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
		<br />
		<div class="beauty_homebtn"><a href="./offers">View More</a>	</div>
		<!--related--->	
	<br />
<br />
<br />

	</div>
	<?php include("./footer.php");?>

	</div>
	
</div>	
<br />
<br />


</div>
</body>
</html>