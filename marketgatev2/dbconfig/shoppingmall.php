<?php
$prodkey="";
if(isset($_GET['prodid'])){
$prodkey=base64_decode($_GET['prodid']);
}




//=============== bussiness details

$bussattr_query=mysqli_query($mysqliconn,"SELECT * FROM `$marketgate`.`bus_attributes`  ");
$bussattr_res=mysqli_fetch_array($bussattr_query);

$bus_name="MarketGate";
$bus_email="info@marketgate.com";
$bus_tel="0764234643";
$bus_location="Nairobi west";
$bus_descr="Great people great place";
$bus_facebook="#";
$bus_twitter="#";
$bus_slogan="#";
$bus_vision="#";
$bus_type="shopping Mall";
$bus_othercontacts="";
$bookbutton="Place Order";
$logoimg="./images/marketgatelogo.png";
//======= bussiness details

//===========siteimages
$sitessimages_query=mysqli_query($mysqliconn,"SELECT * FROM `$marketgate`.`webtemp_images`   WHERE image_type='Slideshow'");

$sitebgimg_query=mysqli_query($mysqliconn,"SELECT * FROM `$marketgate`.`webtemp_images`   WHERE image_type='Custbgimg'");

$sitebgimg_res=mysqli_fetch_array($sitebgimg_query);
//===========siteimages

//==============products listings
$homepageprods_query=mysqli_query($mysqliconn,"SELECT * FROM `$marketgate`.`product_services`   WHERE prod_id!='$prodkey' LIMIT 4");
if(isset($_POST['offersearchbtn'])){
$offersearchtxt=$_POST['offersearchtxt'];
$offerpageprods_query=mysqli_query($mysqliconn,"SELECT * FROM `$marketgate`.`product_services` WHERE (prod_descr LIKE '%".$offersearchtxt."%' OR prod_name LIKE '%".$offersearchtxt."%' OR prod_price LIKE '".$offersearchtxt."')");
}elseif(isset($_GET['dropquery'])){
$offersearchtxt=$_GET['dropquery'];
$offerpageprods_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services` WHERE prod_type='$offersearchtxt'");
}else{
$offerpageprods_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services` ");
}
//==============products

//=============== single prodprofile

$prodprof_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services` WHERE prod_id='$prodkey'");
$prodres=mysqli_fetch_array($prodprof_query);
if(isset($_GET['nxtimg'])){
$imgnavkey=base64_decode($_GET['nxtimg']);
$prodprofimg_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE image_itemid='$prodkey' AND imgkey > '$imgnavkey' ");

}else{
$prodprofimg_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE image_itemid='$prodkey'");
}

$prodprofimg_res=mysqli_fetch_array($prodprofimg_query);

$prodprofimg=$pathimages.str_replace("./", "",$prodprofimg_res['image_url']);

if($prodprofimg_res['image_url']==""){ 
$prodprofimg=$logoimg;
}
$allprodprofimg_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`webtemp_images` WHERE  image_itemid='$prodkey'");

//===============prodprofile


//==sel

$prodcartgroup_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services`   GROUP BY prod_type LIMIT 10");

$prodcartgrouphome_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services`   GROUP BY prod_type LIMIT 4");

$allprodcartgroup_query=mysqli_query($mysqliconn, "SELECT * FROM `$marketgate`.`product_services`   GROUP BY prod_type LIMIT 100");


?>