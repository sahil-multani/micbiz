<?php require_once '../session.php';?>
<!doctype html>
<html lang="en">

<head>
<div id="inj">
      <?php require_once '../req/css.php';?>
   </div>
</head>
<body>
  <div class="wrapper hide">
        <?php require '../assets/nav/sidebar.php';
  require '../assets/nav/top.php'; ?>

<div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
<?php
$conn = mysqli_connect("localhost", "root", "", "music");
$sql = "select * from album";
$res = mysqli_query($conn, $sql);
$num = mysqli_num_rows($res);
$n = 1;
if ($num > 0) {

    while ($q = mysqli_fetch_assoc($res)) {
      $sql2 = "select `as`.id as sid, s.* from songs s join album_song `as` on s.mid = `as`.mid where as.aid ='{$q['id']}' ";
        $res2 = mysqli_query($conn, $sql2);
        $num2 = mysqli_num_rows($res2);
        
    if($num2>0){
        if ($n == 1) {?>
          <div class="col-lg-7">
                  <div class="iq-card iq-card-transparent  iq-song-back">
                     <div class="iq-card-body">
                        <div class="iq-music-img1">
                           <div class="equalizer1">
                              <span class="bar1 bar-1"></span>
                              <span class="bar1 bar-2"></span>
                              <span class="bar1 bar-3"></span>
                              <span class="bar1 bar-4"></span>
                              <span class="bar1 bar-5"></span>
                           </div>
                        </div>
                        <div class="player1 row">
                           <div class="details1 col-6 col-sm-6 col-lg-6">
                              <div class="now-playing1"></div>
                              <div class="track-art1"></div>
                              <div>
                                 <div class="track-name1 "><?=$q['aname'];?></div>
                                 
                              </div>
                           </div>
                           
                           
                        </div>
                     </div>
                  </div>
               </div>  
               <div class="col-lg-5">
                  <div class="iq-card iq-card-transparent">
                     <div class="iq-card-body p-0">
                        <ul class="list-unstyled row mb-0">
        <?} else {
          ?>
           <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"><?=$q['aname'];?></h4>
                        </div>
                        <? if ($num > 6) { ?>
              <div class="d-flex align-items-center iq-view">
                <b class="mb-0 text-primary"><a href="albums.html">View More <i
                      class="las la-angle-right"></i></a></b>
              </div>
              <? } ?>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-unstyled row iq-box-hover mb-0">
          <?}
        }

        
        if ($num2 > 0) {
            while ($r = mysqli_fetch_assoc($res2)) {
                if ($n == 1) {?>
                  <li class="col-lg-6 col-md-6">
                              <div class="iq-card iq-card-transparent">
                                 <div class="iq-card-body p-0">
                                    <div class="media align-items-center">
                                       <div class="iq-thumb-hotsong playmcs" id="m_<?= $i; ?>"
                        data-id="<?= $i; ?>"
                        data-pid="<?= $r['id']; ?>">
                                          <div class="iq-music-overlay"></div>
                                          <a href="music-player.html"><img src="<?=$r['img'];?>"  class="img-fluid avatar-60" alt="">
                                          </a>
                                          <div class="overlay-music-icon">
                                              <a href="javascript:void(0)">
                                                <i class="las la-play-circle font-size-24"></i>
                                             </a>
                                          </div>
                                       </div>
                                       <div class=" feature-list media-body ml-3" title="<?= $r['title']; ?>">
                                          <h6 class="mb-0"><?= $r['title']; ?></h6>
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
                <?} else {
                   ?>
                   <li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
                  <div class="iq-card">
                    <div class="iq-card-body p-0">
                      <div class="iq-thumb playmcs"
                        id="m_<?= $i; ?>"
                        data-id="<?= $i; ?>"
                        data-pid="<?= $q['id']; ?>">
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
                      <div class="feature-list  justify-content-between"
                        title="<?= $r['title']; ?>">
                        <h6 class="font-weight-600 mb-0"><?= $r['title']; ?>
                        </h6>
                        <div>
                          <p class="mb-0 textin"><?= $r['user']; ?>
                          </p>
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
                   <?
                }
            }
            //end tags 
            ?>
            </ul>
        </div>
    </div>
</div>

            <?
        }
        $n++;}
}?>
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
<script type="text/javascript">
  $(document).on("click", ".playmcs", function() {
    let no = $(this).data("id");
    //console.log(no);
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
   $('.dashboard').addClass('active');
    $("#dashboard").attr("aria-expanded", true);
    $("#dashboard").addClass("show")
    $(".albums").addClass("active");
</script>