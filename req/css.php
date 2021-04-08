
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php

//echo $i = isset($_SESSION['theme']) ?  $_SESSION['utheme']: 'dark';
$theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'dark';
$theme == 'light' ? $css = '/music/src/css' : $css = '/music/src/dark';?>

<!-- Favicon -->
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