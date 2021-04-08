<?php

	//vars
	 require_once '../db/db.php';
	 $fn = $_POST['fn'];
	  $ln = $_POST['ln'];
 $uname = $_POST['uname'];
	 $city = $_POST['city'];
	$pwd = $_POST['pwd'];
	 $mail = $_POST['mail'];

	//image upload
	$errors = [];
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$file_type = $_FILES['image']['type'];
	$explode = explode('.', $_FILES['image']['name']);
	$i = str_replace(' ', '', microtime());
$j = str_replace('.', '', $i);
	$file_ext = strtolower(end($explode));
	$extensions = ['jpeg', 'jpg', 'png'];

	//  echo $sql = "INSERT INTO user VALUES (NULL,`{$file_name}`,`{$mail}`,`{$uname}`,`{$pwd}`,`{$fn}`,`{$ln}`,`{$city}`,0)";

	if (in_array($file_ext, $extensions) === false) {
		$errors[] = 'extension not allowed, please choose a JPEG or PNG file.';
	}

	if ($file_size > 2097152) {
		$errors[] = 'File size must be excately 2 MB';
	}

	if (empty($errors) == true) {
		$file = $j . '.' . $file_ext;

		$sql = "INSERT INTO `user` (`id`, `img`, `mail`, `uname`, `pwd`, `fname`, `lname`, `city`, `theme`) VALUES (NULL, '{$file}', '{$mail}', '{$uname}', '{$pwd}', '{$fn}', ' {$ln}', '{$city}', '0')";

		if( mysqli_query($conn, $sql)){
            move_uploaded_file($file_tmp, '../../users/' . $file);

         }
	} else {
		echo $errors[0];
	}
