<?php ob_start();  include("./dbconfig/dbconfig.php"); include("./dbconfig/democonf.php"); 

if(!isset($_SESSION['marketgate_app_logged'])){
header("location:./autologin");
exit;
}
;
?>
<!Doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial - scale=1.0">
<title>Online Shop</title></head>
<body id="fullnews">
<div align="center" class="bgplasma">
<form method="post" enctype="multipart/form-data">
<?php include("./navbar.php");?>
<div style="background-color:#FFF;color:#000; font-style:italic; padding:10px;">Click `items List` above to view your items</div>

<br/><br/>
	<?php if(isset($_GET['itemtkn'])){?>
	
		<div class="marketgate_buttonwidget marketgate_smallbuttonwidget" name="loginclientbtn" style="width:70px;">
			<a href="./itemlist?itemtkn=<?php echo base64_encode($singlesel_product_services_res['prod_id']);?>&remitem">Delete</a>
   	    </div>
	 <?php }?>

<br>
<br>

<!--entrytray-->
<div class="marketgate_tenant_bgtile_tray">
	<div class="marketgate_trayttle">
	<?php if(isset($_GET['itemtkn'])){ echo $singlesel_product_services_res['prod_name'];}else{echo "Item Details";}?></div>
	<div style="padding:10px; text-align:left;">
		<div class="marketgate_labelwidget">Product, service /Item Name</div>
		<input type="text" class="marketgate_textwidget" name="itemname" value="<?php echo $singlesel_product_services_res['prod_name'];?>" placeholder="Enter  Name" required/>
		<div class="marketgate_labelwidget">Category e.g (Groceries, fashion etc.)</div>
		<select name="txtcart" class="marketgate_textwidget" required>
		<option value="<?php echo $singlesel_product_services_res['prod_type'];?>"><?php echo $singlesel_product_services_res['prod_type'];?></option>
		<option>Fashion</option>
		<option>Groceries</option>
		<option>Dairy Products</option>
		<option>Electronics</option>
		<option>Others</option>
		</select>
		<div class="marketgate_labelwidget">Description</div>
		<textarea class="marketgate_textwidget" name="itemdescr" placeholder="Enter product descr"><?php echo $singlesel_product_services_res['prod_descr'];?></textarea>
		<div class="marketgate_labelwidget">Amount (below Ksh 10/ = for demo purposes)</div>
		<input type="number" class="marketgate_textwidget" name="itemamt" value="<?php echo $singlesel_product_services_res['prod_price'];?>" placeholder="Enter  amount" required/>
		<div class="marketgate_labelwidget">SMS Confirmation message <em style="font-size:11px;">(what client expects after payment. eg order will arrive within one day etc..)</em></div>
		<br/>
		<br/>
		<input type="text" class="marketgate_textwidget" name="confmsg" value="<?php echo $confimationmsg_res['confmsg'];?>" placeholder="Enter  Confirmation message " required/>
		<br/><br/>
		<div align="center">
		<?php if(isset($_GET['itemtkn'])){?>
		<input type="submit" class="marketgate_buttonwidget" name="itemupdtbtn" value="Update Details"/>
		<?php } else{?>
		<input type="submit" class="marketgate_buttonwidget" name="itemaddbtn" value="Save Details"/>
		<?php }?>
		</div>
	</div>
</div>
<!--entrytray-->
<!--entrytray-->
<?php if(isset($_GET['itemtkn'])){?>
<div class="marketgate_tenant_bgtile_tray">
	<div class="marketgate_trayttle">Item Images</div>
	<div style="padding:10px; text-align:left;">
		<div align="center" id="delimgcont" style="display:none;">
			<img src="./templates/images/cancel.png" style="width:10px; height:10px; margintop:15px;"/>
			<input type="submit" name="delitemimg"  class="marketgate_" style="margin:0;" value="Remove Image">
			<hr/>
		</div><br/>
	</div>
	<img src="<?php if($fimg_webtemp_images_res['image_url']==''){echo ("./images/bgimg.jpg");}else{ echo $fimg_webtemp_images_res['image_url'];}?>" class="marketgate_item_pic" id="nextimgdiv"/>
	<div align="center">
	    		<div class="marketgate_labelwidget">Upload an Image</div>
<br/>
		<input type="file" name="itemimgfile" class="marketgate_textwidget"/>
		<br/>
		<br>
		
		<input type="submit" class="marketgate_buttonwidget" name="btnuploaditemimg" value="Add Image"/>
		<hr/>
		<input type="hidden" class="marketgate_tms_buttonwidget" name="delimgkey" id="delimgkey" value=""/>
		<?php while($imgthumb_webtemp_images_res=mysqli_fetch_array($imgthumb_webtemp_images_query)){?>
		<img src="<?php echo $imgthumb_webtemp_images_res['image_url'];?>" class="marketgate_thumb_array" onClick="document.getElementById('nextimgdiv').src='<?php echo $imgthumb_webtemp_images_res['image_url'];?>';document.getElementById('delimgkey').value='<?php echo $imgthumb_webtemp_images_res['imgkey'];?>';nextimgpath1();"/>
		<?php }?>
	</div>
	<br/>
	<br/>
	</div>
</div>
<?php }?>
<!--entrytray-->


<script>
function nextimgpath1(){
document.getElementById('delimgcont').style.display='block';
}
</script>
</form>
</div>
</body>
</html>