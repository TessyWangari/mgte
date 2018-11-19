<?php


//============ Start insert Query =============

//============Insert Variables =============

$itemtkn="";
if(isset($_GET['itemtkn'])){
$itemtkn=base64_decode($_GET['itemtkn']);

}
if(isset($_POST['loginclientbtn'])){


$admin_name="";
$admin_email=$_POST["txtclientmail"];
$admin_tel="";
$admin_pass=$_POST["txtclientpass"];
$site_id="MKGT-".first7nos().uniquiefy();

//========== start to check if email exists ====== 

$dup_webtemp_admin_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_admin` WHERE admin_email = '$admin_email'");

$dup_webtemp_admin_res=mysqli_num_rows($dup_webtemp_admin_query);

//========== end to check if email exists ====== 

//============ Insert new user if email does not exist and autologin =============
if($dup_webtemp_admin_res==0){
$insert_webtemp_admin_query=mysqli_query($mysqliconn, "INSERT INTO `$marketgate`.`webtemp_admin` (`adminkey`,`admin_name`,`admin_email`,`admin_tel`,`admin_pass`,`site_id`) VALUES (NULL,'$admin_name','$admin_email','$admin_tel','$admin_pass','$site_id')");

//=============================== auto login
$login_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_admin` WHERE admin_email = '$admin_email'");

$login_result=mysqli_fetch_array($login_query);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	$_SESSION['marketgate_app_logged']=TRUE;
	$_SESSION['marketgate_app_logged_editor']=TRUE;
	$_SESSION['marketgate_user_id']=$login_result['admin_id'];
	$_SESSION['marketgate_username']=$login_result['admin_name'];
	$_SESSION['marketgate_email']=$login_result['admin_email'];
	$_SESSION['marketgate_siteid']=$login_result['site_id'];
	
	header("Location: ./itemlist");
	
//=============================== auto login

}else{
//=============================== auto login
//============ login new user if email exist and autologin =============

$login_query2=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_admin` WHERE admin_email = '$admin_email'");

$login_result2=mysqli_fetch_array($login_query2);


if (!empty($login_result2['admin_email'])){

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	$_SESSION['marketgate_app_logged']=TRUE;
	$_SESSION['marketgate_app_logged_editor']=TRUE;
	$_SESSION['marketgate_username']=$login_result2['admin_name'];
	$_SESSION['marketgate_email']=$login_result2['admin_email'];
	$_SESSION['marketgate_siteid']=$login_result2['site_id'];
	
	header("Location: ./itemlist");
}
//=============================== auto login

}
}

//============ End insert Query ============= 


if(isset($_GET['logout'])){
	unset($_SESSION['marketgate_app_logged']);
	unset($_SESSION['marketgate_user_id']);
	unset($_SESSION['marketgate_username']);
	unset($_SESSION['marketgate_email']);
	unset($_SESSION['marketgate_siteid']);
	
		header("Location: ./autologin");

}

//================  item entry =============
if(isset($_POST['itemaddbtn'])){
$prod_id=first7nos();
$prod_name=mysqli_real_escape_string($mysqliconn, $_POST["itemname"]);
$prod_descr=mysqli_real_escape_string($mysqliconn, $_POST["itemdescr"]);
$prod_price=mysqli_real_escape_string($mysqliconn, $_POST["itemamt"]);
$site_id=$siteid;
$prod_type=mysqli_real_escape_string($mysqliconn, $_POST["txtcart"]);
$confmsg=mysqli_real_escape_string($mysqliconn, $_POST["confmsg"]);

//============ Insert Query SQL =============

$insert_product_services_query=mysqli_query($mysqliconn, "INSERT INTO `$marketgate`.`product_services` (`prodkey`,`prod_id`,`prod_name`,`prod_descr`,`prod_price`,`site_id`,`prod_type`) VALUES (NULL,'$prod_id','$prod_name','$prod_descr','$prod_price','$site_id','$prod_type')");

mysqli_query($mysqliconn, "UPDATE `$marketgate`.`webtemp_admin` SET confmsg='$confmsg' WHERE  site_id='$siteid'");


header("location:./uploaditem?itemtkn=".base64_encode($prod_id)."");

}//================  item entry =============


//============ Start Single item Query=============

$singlesel_product_services_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services` WHERE prod_id = '$itemtkn' AND site_id='$siteid'");

$singlesel_product_services_res=mysqli_fetch_array($singlesel_product_services_query);

if(isset($_GET['payitem'])){

$payitem=base64_decode($_GET['itemtkn']);
$alllist_product_services_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services` WHERE  prod_id = '$payitem' AND site_id='$siteid'");


}else{
$alllist_product_services_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services` WHERE  site_id='$siteid'");
}

$allcount_product_services_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services` WHERE  site_id='$siteid'");
$allcount_product_services_res=mysqli_num_rows($allcount_product_services_query);
//============ End Single item Query=============

//============ Start First image and thumbnail Query=============
$fimg_webtemp_images_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE image_itemid = '$itemtkn'");

$fimg_webtemp_images_res=mysqli_fetch_array($fimg_webtemp_images_query);

$imgthumb_webtemp_images_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE image_itemid = '$itemtkn'");

//============ End First image and thumbnail Query============= 

$confimationmsg_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_admin` WHERE  site_id='$siteid'");

$confimationmsg_res=mysqli_fetch_array($confimationmsg_query);

//============ Start item Update Query =============

//============ Update Variables =============
if(isset($_POST['itemupdtbtn'])){

$prod_name=mysqli_real_escape_string($mysqliconn, $_POST["itemname"]);
$prod_descr=mysqli_real_escape_string($mysqliconn, $_POST["itemdescr"]);
$prod_price=mysqli_real_escape_string($mysqliconn, $_POST["itemamt"]);
$confmsg=mysqli_real_escape_string($mysqliconn, $_POST["confmsg"]);
$prod_type=mysqli_real_escape_string($mysqliconn, $_POST["txtcart"]);

//============ Update Query=============
mysqli_query($mysqliconn, "UPDATE `$marketgate`.`webtemp_admin` SET confmsg='$confmsg' WHERE  site_id='$siteid'");

$update_product_services_query=mysqli_query($mysqliconn, "UPDATE `$marketgate`.`product_services` SET `prod_name`='$prod_name',`prod_descr`='$prod_descr',`prod_price`='$prod_price',`prod_type`='$prod_type'  WHERE `prod_id`='$itemtkn' AND site_id='$siteid'");


header("location:./uploaditem?itemtkn=".base64_encode($itemtkn)."");


} //============ End item Update Query ============= 


//============ Start image insert Query =============

//============Insert Variables =============

if(isset($_POST['btnuploaditemimg'])){


$image_itemid=$itemtkn;

$pathstr="./images/products/";
$inputfile="itemimgfile";
$imgprefix="PAYDEMO";

if(empty($_FILES[$inputfile]["name"])){
$emptyitemmsg='Please Browse an image';
echo $alert_popbox='<div class="office57_alertmsgbox_placard" id="msgcard" ><div align="center" ><br/>'.$emptyitemmsg.'<br/><br/><div class="office57_popclose" Onclick="document.getElementById('."'msgcard'".').style.display='."'none'".';">Close</div><br/></div></div>';
    
}else{
uploadpic($pathstr, $inputfile,$imgprefix);


$image_url=$uploadedpicname;

$image_type="";
$site_id=$siteid;
$PhotoCaption="";
$show_img="";
$cartegory_name="";

//============ Insert Query SQL =============

$insert_webtemp_images_query=mysqli_query($mysqliconn, "INSERT INTO `$marketgate`.`webtemp_images` (`imgkey`,`image_itemid`,`image_url`,`image_type`,`site_id`,`PhotoCaption`,`show_img`,`cartegory_name`) VALUES (NULL,'$image_itemid','$image_url','$image_type','$site_id','$PhotoCaption','$show_img','$cartegory_name')");

header("location:./uploaditem?itemtkn=".base64_encode($itemtkn)."");
}
}

//============ End image insert Query ============= 

if(isset($_POST['delitemimg'])){
//============ START Delete  IMAGE Query=============
$imgkey=$_POST['delimgkey'];


$delimg_webtemp_images_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE imgkey = '$imgkey'");

$del_webtemp_images_res=mysqli_fetch_array($delimg_webtemp_images_query);

$img2del=$del_webtemp_images_res['image_url'];
if($img2del!==''){
unlink($img2del);
}

$del_webtemp_images_query=mysqli_query($mysqliconn, "DELETE FROM `$marketgate`.`webtemp_images` WHERE imgkey= '$imgkey'");
header("location:./uploaditem?itemtkn=".base64_encode($itemtkn)."");

//============ END Delete  IMAGE Query=============

}

if(isset($_GET['remitem'])){

$delimg_webtemp_images_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE image_itemid = '$itemtkn' AND site_id='$siteid'");

while($del_webtemp_images_res=mysqli_fetch_array($delimg_webtemp_images_query)){

$img2del=$del_webtemp_images_res['image_url'];
if($img2del!==''){
unlink($img2del);
}
}
mysqli_query($mysqliconn, "DELETE FROM `$marketgate`.`webtemp_images` WHERE image_itemid = '$itemtkn'");
mysqli_query($mysqliconn, "DELETE FROM `$marketgate`.`product_services` WHERE prod_id ='$itemtkn' AND site_id='$siteid'");
;

header("location:./itemlist");
}

if(isset($_POST['btncheckout'])){

$itemamount=$singlesel_product_services_res['prod_price'];
$txtphone=$_POST['txtmpesatel'];
				
$messvars = 'onlinetrx=onlinetrx&accno=PMD-'.$itemtkn.'&paidamt='.$itemamount.'&telno='.$txtphone;

//echo $online_siteid;
$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
$ch = curl_init('https://clearphrases.com/sparkspot/onlinetrx.php');
curl_setopt( $ch, CURLOPT_POST, 1);

curl_setopt( $ch, CURLOPT_POSTFIELDS, $messvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
$sendsmsres = curl_exec( $ch );

//echo "Returned msg ".$sendsmsres;
}
?>
