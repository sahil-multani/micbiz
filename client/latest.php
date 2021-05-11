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
require '../assets/nav/top.php';?>
      <div id="content-page" class="content-page">
         <div class="container-fluid">
             <div class="col-lg-12">
                  <div class="iq-card iq-realease">
                     <div class="iq-card-header d-flex justify-content-between border-0">
                        <div class="iq-header-title">
                           <h4 class="card-title">New Realeases</h4>
                        </div>
                     </div>
                     <div class="iq-card-body  iq-realeses-back">
                        <div class="row">
                           <div class="col-lg-5 iq-realese-box ">
                              <div class="iq-music-img">
                                 <div class="equalizer">
                                    <span class="bar bar-1"></span>
                                    <span class="bar bar-2"></span>
                                    <span class="bar bar-3"></span>
                                    <span class="bar bar-4"></span>
                                    <span class="bar bar-5"></span>
                                 </div>
                              </div>
                              <div class="player1 row">
                                 <div class="details1 music-list col-6 col-sm-6 col-lg-6">
                                    <div class="now-playing1"></div>
                                    <div class="track-art1"></div>

                                 </div>

                              </div>
                           </div>
                           <div class="col-lg-7">
                              <ul class="list-unstyled iq-song-slide mb-0 realeases-banner">
                                 <?php
$sql = "select * from songs s  join  new_relesed nw  on s.mid = nw.mid";
$res = mysqli_query($conn, $sql);
$i = 0;
if (mysqli_num_rows($res) > 0) {
    while ($r = mysqli_fetch_assoc($res)) {?>
                                 <li class="row playmcs" id="m_<?=$i;?>"
                                    data-id="<?=$i;?>"
                                    data-pid="<?=$r['id'];?>">
                                    <div class="d-flex justify-content-between align-items-center">
                                       <div class="media align-items-center col-10 col-md-5">
                                          <div class="iq-realese-song ">
                                             <a href="music-player.html"><img src="<?=$r['img'];?> " class="img-border-radius avatar-60 img-fluid" alt=""></a>
                                          </div>
                                          <div class="media-body text-white ml-3  feature-list">
                                             <h6>
                                             <p class="mb-0"><?=$r['title'];?></p>

                                             </h6>
                                             <small><?=$r['user'];?></small>
                                          </div>
                                       </div>
                                       <p class=" mb-0 col-2 col-md-2"><i class="las la-play-circle font-size-32"></i></p>



                                 </li>
   <?php $i++;}}?>
                              </ul>
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
</div>
</div>
</div>
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
   $(".latest").addClass("active");
   </script>