<?php ob_start();  include("./dbconfig/dbconfig.php"); include("./dbconfig/democonf.php"); ?>
<!Doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial - scale=1.0">
<title>MarketGate - Item List</title></head>
<body id="fullnews">
<div align="center" class="bgplasma">
<form method="post" enctype="multipart/form-data">
<?php include("./navbar.php"); 
$sitetkn="";
$imgpath="";

if(!isset($_POST['btncheckout'])){?>
<br>
<br/>
<!--title-->
<div class="marketgate_left_ttilediv"></div>
<div class="marketgate_title_textdiv"><?php if(isset($_GET['payitem'])){ echo "Enter Mpesa phone below to make payments";}else{ echo "Item List";}?></div>
<div class="marketgate_right_titilediv"></div>
<!--title-->
<br>

		<div class="marketgate_buttonwidget marketgate_smallbuttonwidget" name="loginclientbtn" style="width:70px;">
			<a href="./itemlist?<?php echo $sitetkn;?>">Refresh</a>
		</div>
		<br>

<br>
<?php 
if($allcount_product_services_res==0){
$emptyitemmsg='You have not entered any items yet. <hr><a href="./uploaditem" style="font-size:14px;">click here to enter items</a> ';
echo $alert_popbox='<div class="marketgate_alertmsgbox_placard" id="msgcard" ><div align="center" ><br/>'.$emptyitemmsg.'<br/><br/><!--<div class="marketgate_popclose" Onclick="document.getElementById('."'msgcard'".').style.display='."'none'".';">Close</div>--><br/></div></div>';
; 
};
while($alllist_product_services_res=mysqli_fetch_array($alllist_product_services_query)){

$imgtknno=$alllist_product_services_res['prod_id'];

$listimg_webtemp_images_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE image_itemid = '$imgtknno'");

$listimg_webtemp_images_res=mysqli_fetch_array($listimg_webtemp_images_query);

?>
<!--entrytray-->
<div class="marketgate_tenant_bgtile_tray">
		<div style="padding:10px; text-align:left;">
		<!--title-->
		<div class="marketgate_left_ttilediv"></div>
		<div class="marketgate_title_textdiv"><?php echo $alllist_product_services_res['prod_name'];?></div>
		<div class="marketgate_right_titilediv" style="width:40%;"></div>
		<!--title-->
		<br/>
		<br>

		<img src="<?php if($listimg_webtemp_images_res['image_url']==''){echo "./images/bgimg.jpg";} else{ echo $imgpath.$listimg_webtemp_images_res['image_url'];}?>" class="marketgate_item_pic" id="nextimgdiv"/>
		<hr>
		<?php if(!isset($_GET['payitem'])){?>
		<div class="marketgate_labelwidget">Amount <?php echo $alllist_product_services_res['prod_price'];?>/=</div><br>
		<div class="marketgate_labelwidget">Details</div><br>
			<div class="marketgate_title_textdiv" style="font-size:12px; font-weight:normal;"><?php echo $alllist_product_services_res['prod_descr'];?></div>
		<hr>
		<?php } if(isset($_GET['payitem'])){?>
		<br>
		<div class="marketgate_labelwidget">Enter phone number for payments</div>
		<br>
		<input type="text" class="marketgate_textwidget" name="txtmpesatel" placeholder="Enter phone number for payments" required/>
		<br/><br/>
		<div align="center">
		<input type="submit" class="marketgate_buttonwidget" name="btncheckout" value="Proceed"/>
		<?php }?>
		<div align="center">
		<?php if(isset($_GET['edititems'])){?>
		<div class="marketgate_buttonwidget marketgate_smallbuttonwidget" name="loginclientbtn" style="width:70px;">
		<a href="./uploaditem?itemtkn=<?php echo base64_encode($alllist_product_services_res['prod_id']);?>">Edit</a></div>
		<?php }else{
		if(!isset($_GET['payitem'])){?>
		<div class="marketgate_buttonwidget marketgate_smallbuttonwidget" name="loginclientbtn" style="width:70px;">
			<a href="./itemlist?payitem&itemtkn=<?php echo base64_encode($alllist_product_services_res['prod_id']);?>&<?php echo $sitetkn;?>">Pay</a>
		</div>
		<?php }}?>
		</div>
	</div>
</div>
<!--entrytray-->
<?php }
}else{?>
<!--entrytray-->
<br>
<br>
		<div class="marketgate_buttonwidget marketgate_smallbuttonwidget" name="loginclientbtn" style="width:70px;">
			<a href="./itemlist?itemtkn=<?php echo ($_GET['itemtkn']);?>&<?php echo $sitetkn;?>">Close</a>
		</div>
<br>
<br>		<div class="marketgate_recmother" style="height:auto;background-color:#FFF;">
		<div style="padding:10px; text-align:left;">
		<div class="marketgate_labelwidget"><h2>Payment Placed !!</h2>
		<hr>
		Please check your phone to confirm transaction. <br/><br/>Incase you cant see a transaction request on your phone please try again or try Direct Lipa na M-Pesa below.<br><br>
<br>
Direct Lipa na M-Pesa
<hr>
1. Go to Lipa na M-Pesa
<br>
<br>

2. Select paybill
<br>
<br>

3. Enter 935816 as business number
<br>
<br>

4. Enter <?php echo 'PMD-'.$itemtkn;?> as account number
<br>
<br>

5. Enter <?php echo $singlesel_product_services_res['prod_price'];?> as Amount and confirm
<br>
<br>
<br>
<hr>
		<em style="color:brown;">After payments: <?php echo $confimationmsg_res['confmsg'];?></em>
 
		</div><br>
		</div>
	</div>
</div>
<!--entrytray-->

<?php }?>
</form>
</div>
</body>
</html>