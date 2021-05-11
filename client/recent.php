<?php
require_once '../session.php';
?>
<!doctype html>
<html lang="en">

<head>
    <div id="inj">
        <?php require_once '../req/css.php'; ?>
    </div>
    <style>
        .playiton {
            display: block;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            border: none;
            background: var(--iq-primary) 0% 0% no-repeat padding-box;
            color: var(--iq-white);
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
            transform: none;
            color: var(--iq-white);

        }

        .playiton:hover {
            background: var(--iq-white);
            color: var(--iq-primary) !important;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php require_once './../assets/nav/top.php';
		require_once './../assets/nav/sidebar.php'; ?>
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="row">

                        <?php
                        if(isset($_COOKIE['recent'])){
						$recent =  unserialize($_COOKIE['recent'], ['allowed_classes' => false]);
                        $ids = join("','",$recent);
                        $sql = "select * from playlist_admin where id in ('{$ids}')";
                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($q = mysqli_fetch_assoc($res)) {
                                $i = 0;
                                $sql2 = "select `as`.id as sid, s.* from songs s join admin_song `as` on s.mid = `as`.mid where as.pid ='{$q['id']}' limit 6";
                                $res2 = mysqli_query($conn, $sql2);
                                $num = mysqli_num_rows($res2);
                                if (mysqli_num_rows($res2) > 0) { $mycls=  mysqli_num_rows($res);?>

                        <div
                            class="col-md-12 <?= $mycls==1?'col-lg-12':'col-lg-6';?>">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-header d-flex justify-content-between align-items-center">
                                    <div class="iq-header-title">
                                        <h4 class="card-title"><?=$q['pname'];?>
                                        </h4>
                                    </div>
                                    <? if ($num >= 6) { ?>
                                    <div class="d-flex align-items-center iq-view">
                                        <b class="mb-0 text-primary"><a href="albums.html">View More <i
                                                    class="las la-angle-right"></i></a></b>
                                    </div>
                                    <? } ?>
                                </div>
                                <div class="iq-card-body">
                                    <ul class="list-unstyled row hot-songs mb-0  list-unstyled    iq-box-hover mb-0  ">
                                        <? while ($r = mysqli_fetch_assoc($res2)) {?>
                                        <li class="col-lg-12">
                                            <div class="iq-card iq-card-transparent">
                                                <div class="iq-card-body p-0">
                                                    <div class="media align-items-center">
                                                        <div class="iq-thumb-hotsong playmcs"
                                                            id="m_<?= $i; ?>"
                                                            data-id="<?= $i; ?>"
                                                            data-pid="<?= $q['id']; ?>"
                                                            title="<?= $r['title']; ?>">
                                                            <div class="iq-music-overlay"></div>
                                                            <a href="javascript:void(0)">
                                                                <img src="<?= $r['img']; ?>"
                                                                    class="img-border-radius img-fluid w-100" alt="">
                                                            </a>
                                                            <div class="overlay-music-icon">
                                                                <a href="javascript:void(0)">
                                                                    <i class="las la-play-circle"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="media-body ml-3 ">
                                                            <h6 class="mb-0 iq-song-title"><?= $r['title']; ?>
                                                            </h6>
                                                            <small><?= $r['user']; ?></small>
                                                            <div class="  text-right " style="font-size: inherit">
                                                                <i class="fa <? echo in_array($r['mid'], $likes) ? 'fa-heart' : 'fa-heart-o'; ?> like m-1 "
                                                                    data-mid="<?= $r['mid']; ?>"></i>
                                                                <i class="ri-play-list-add-line m-1 "></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <?$i++;}?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?}?>
                        <?
            }
        }
    } else{?>
                        <div class="col-lg-12">
                            <div class="iq-card">
                                <div class="iq-card-body">
                                    <center>no recently played songs...</center>
                                </div>
                            </div>
                        </div>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
  require_once '../req/js.php';
  require_once '../assets/footer/player/main.php';
  require_once '../assets/footer/player/script.php';
?>
</body>

</html>

<script>
    $(document).on("click", ".playmcs", function() {
        let no = $(this).data("id");

        url = '/music/assets/footer/player/play.php';
        let pid = $(this).data("pid");
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                data: pid
            },
            success: function(dta) {
                playMyMusic(dta);

            },
            dataType: "json",
        });
        setTimeout(function() {
            getmusic(no);
        }, 300);
    });
    $('.lib').addClass('active');
    $("#lib").attr("aria-expanded", true);
    $("#lib").addClass("show")
    $(".recent").addClass("active");
</script>