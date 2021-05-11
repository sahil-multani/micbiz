<?php
session_start();
$user = $_SESSION['user'];
?>
<!doctype html>
<html lang="en">
<head>

                 <div id="inj">
        <?php require_once '../req/css.php';
        require_once '../assets/db/db.php'; ?>
    </div>
</head>
<body>
  <div class="wrapper">
        <?php require_once '../assets/nav/top.php';
        require_once '../assets/nav/sidebar.php'; ?>
	  <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                </div></div></div></div>
</body>
</html>
