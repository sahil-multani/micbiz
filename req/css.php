
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php

//echo $i = isset($_SESSION['theme']) ?  $_SESSION['utheme']: 'dark';
$theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'dark';
$theme == 'light' ? $css = '/music/src/css' : $css = '/music/src/dark';?>
<style >

  .checkpwd,
  .error {
	width: 100%;
	margin-top: .25rem;
	font-size: 80%;
	color: #dc3545
  }
  
  
  .searchmenus {
	/* background: #c2bebe; */
	width: 100vw !important;
	height: 100vh !important;
	position: absolute;
  }
  
  .searchbox {
	position: absolute;
	top: 20%;
	left: 50%;
	transform: translate(-50%, -50%);
  }
  
  .searchbox input:focus {
	outline: none;
	border: none;
	box-sizing: border-box;
	box-shadow: none;
  }
  
  .searchboxs input {
	font-size: 4.26rem;
	font-weight: bold;
	border: none;
	padding: 0;
	background-color: transparent;
	width: 100% !important;
	
  }
  
  .result {
	position: absolute;
	top: 100%;
  }</style >
<!-- Favicon -->
<link rel="stylesheet" href="<?= $css; ?>/variable.css" >
<link rel="shortcut icon" href="/music/images/favicon.ico" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= $css; ?>/bootstrap.min.css" >
<!-- Typography CSS -->
<link rel="stylesheet" href="<?= $css; ?>/typography.css" >
<!-- Style CSS -->
<link rel="stylesheet" href="<?= $css; ?>/style.css" >
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?= $css; ?>/responsive.css" >
<link rel="stylesheet" href="/music/src/css/toaster.css" >