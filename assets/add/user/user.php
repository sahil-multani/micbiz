<?php
$img = $_POST['img'];
$fb = $_POST['fb'];
$tw=$_POST['tw'];
$ig=$_POST['ig'];
$li=$_POST['li'];
$fn=$_POST['fn'];
$ln=$_POST['ln'];
$cn=$_POST['cn'];
$mn= $_POST['mn'];
$mail =$_POST['mail'];
$zip= $_POST['zip'];
$uname = $_POST['uname'];

$errors= array();
$file_name = $_FILES['img']['name'];
$file_size =$_FILES['img']['size'];
$file_tmp =$_FILES['img']['tmp_name'];
$file_type=$_FILES['img']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));

$extensions= array("jpeg","jpg","png");

if(in_array($file_ext,$extensions)=== false){
   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
}

if($file_size > 2097152){
   $errors[]='File size must be excately 2 MB';
}

if(empty($errors)==true){
   move_uploaded_file($file_tmp,"users/".$file_name);
   echo "Success";
}else{
   print_r($errors);
}
}
?>