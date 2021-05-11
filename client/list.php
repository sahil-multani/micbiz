<?php session_start();
	$user = 1 // $_SESSION['uid'];
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

    <div class="wrapper hide">
        <?php require_once '../assets/nav/top.php';
	        require_once '../assets/nav/sidebar.php'; ?>
	    <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Playlists</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action list-group-flush p-3 h2">create
                                        new playlist</li>
	                                <?php $sql = "SELECT * FROM `playlist` WHERE uname = 'sahil'";
		                                $res = mysqli_query($conn, $sql);
		                                if (mysqli_num_rows($res) > 0) {
			                                while ($r = mysqli_fetch_assoc($res)) {
				                                $id = $r['id'];
				                                echo "<a href='list.php?p={$id}'><li class='list-group-item list-group-item-action list-group-flush p-3 h2' href='123'>{$r['pname']} </li></a>";
			                                }
		                                }
	                                ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
	    require_once '../assets/footer/player/main.php';
	    $js = '../';
	    require_once '../req/js.php';
	    require_once '../assets/footer/player/script.php'; ?>
</body>

</html>