<?php

session_start();
require_once '../db/db.php';
 $theme = $_POST['theme']==0?'dark':'light';
 $_SESSION['theme'] = $theme;
 if (isset($_SESSION['user'])) {
 	$sql = "UPDATE `user` SET `theme` = '{$theme}' WHERE `uname` = 'sahil' ";
 	mysqli_query($conn, $sql);
 }
 ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php


// echo $theme = isset($_POST['theme']) ? $_POST['theme']==0?'dark':'light' : 'dark';
  $theme == 'light' ? $css = '/music/src/css' : $css = '/music/src/dark';
 ?>



<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="<?= $css; ?>/variable.css">
<link rel="shortcut icon" href="/music/images/favicon.ico" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= $css; ?>/bootstrap.min.css">
<!-- Typography CSS -->
<link rel="stylesheet" href="<?= $css; ?>/typography.css">
<!-- Style CSS -->
<link rel="stylesheet" href="<?= $css; ?>/style.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?= $css; ?>/responsive.css">
<link rel="stylesheet" href="<?= $css; ?>/toaster.css">