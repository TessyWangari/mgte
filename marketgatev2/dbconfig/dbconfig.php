<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 

$mysqliconn=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 

$marketgate='marketgate'; // database name

//check account id

$siteid='';

if(isset($_SESSION['marketgate_siteid'])){
$siteid=$_SESSION['marketgate_siteid'];
}
//check account id

//echo $siteid;

//createuserid
function first7nos($length = 7) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//uniqueify
function uniquiefy($length = 5) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


//uniqueify
function accno($length = 4) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//===============compress image=========================
function compress($source, $destination, $quality) {

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif') 
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png') 
			$image = imagecreatefrompng($source);
		elseif ($info['mime'] == 'image/bmp') 
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}
//===============compress image=========================

function uploadpic($pathstr, $inputfile,$imgprefix) {

global $uploadedpicname;
if(!empty($_FILES[$inputfile]["name"])){
$newpicname=''.$imgprefix.'-'.first7nos() .'-'. uniquiefy();

$target_dir = $pathstr;
$target_file= $target_dir . basename($_FILES[$inputfile]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$temp = explode(".", $_FILES[$inputfile]["name"]);
$newfilename = $newpicname. '.' . end($temp);

$target_file2=$target_dir .$newfilename;

$uploadOk = 1;
// Check file size
if ($_FILES[$inputfile]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
//================mini ui alert box
$notificmsg ="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$alert_popbox='<div class="marketgate_alertmsgbox_placard" id="msgcard" ><div align="center" ><br/>'.$notificmsg.'<br/><br/><div class="popclose" Onclick="document.getElementById('."'msgcard'".').style.display='."'none'".';">Close</div><br/></div></div>';
echo $alert_popbox;
//================mini ui alert box
    $uploadOk = 0;
}else{
move_uploaded_file($_FILES[$inputfile]["tmp_name"], $target_file2);
}
//==============compimg
$source_img = $target_file2;
$destination_img = $target_file2;
if ($_FILES[$inputfile]["size"] > 90000) {

$d = compress($source_img, $destination_img, 20);
}
$uploadedpicname=$destination_img;

return $uploadedpicname;
}else{
//================mini ui alert box
$notificmsg ="Sorry, Please Select an image to upload.";
$alert_popbox='<div class="marketgate_alertmsgbox_placard" id="msgcard" ><div align="center" ><br/>'.$notificmsg.'<br/><br/><div class="popclose" Onclick="document.getElementById('."'msgcard'".').style.display='."'none'".';">Close</div><br/></div></div>';
echo $alert_popbox;
//================mini ui alert box
}
}

$pathimages="./";
$filelim=file_get_contents("./reclimfile.txt");
  if($filelim==''){
  $fh = fopen("./reclimfile.txt", 'w') or die("can't open file");
	fwrite($fh, "10");
	fclose($fh);
	}

//================== read file limit=========================

//=================================  table limt function ==============================


?>