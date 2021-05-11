<?php require_once "session.php";?>
<!doctype html>
<html lang="en">

<head>
<div id="inj">
      <?php require_once '../req/css.php';
function get($q)
{
    $conn = mysqli_connect("localhost", "root", "", "music");
    $sql = "select * from {$q}";
    $res = mysqli_query($conn, $sql);
    echo mysqli_num_rows($res);
}
function recent($q, $w, $n, $gid)
{
    $conn = mysqli_connect("localhost", "root", "", "music");
    $sql = "SELECT * FROM ( SELECT * FROM {$q} ORDER BY id DESC LIMIT 3 ) sub ORDER BY id "; //playlist_admin
    $res = mysqli_query($conn, $sql);
    $i = 0;
    $color = '';

    if (mysqli_num_rows($res) > 0) {
        while ($r = mysqli_fetch_assoc($res)) {
            if ($i == 0) {$color = 'primary';} elseif ($i == 1) {$color = 'success';} else { $color = 'danger';}
            $sql2 = "select s.id from songs s join {$w} `as` on s.mid = `as`.mid where as.$gid  ='{$r['id']}' "; //admin_song
            $res2 = mysqli_query($conn, $sql2);
            $num = mysqli_num_rows($res2);
            ?><li class="d-flex mb-3 align-items-center p-3 sell-list border border-<?=$color;?> rounded">
                              <div class="user-img img-fluid">
                                 <img src="images/user/02.jpg" alt="story-img" class="img-fluid rounded-circle avatar-40">
                              </div>
                              <div class="media-support-info ml-3">
                                 <h6><?=$r[$n]; //pname?></h6>
                                 
                              </div>
                              <div class="iq-card-header-toolbar d-flex align-items-center">
                                 <div class="badge badge-pill badge-<?=$color;?>"><?=$num;?></div>
                              </div>
                           </li>
         <?php
$i++;}
    }

}
?>
   </div>
</head>
<body>

   <div class="wrapper">
      <?php require_once '../assets/nav/top.php';
require_once '../assets/nav/admin/sidebar.php';?>
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <h6>users </h6>
                           <span class="iq-icon"><i class="ri-information-fill"></i></span>
                        </div>
                        <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                           <div class="iq-map text-primary font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                           <div class="d-flex align-items-center">
                              <h2><?php get("user")?></h2>
                              <div class="rounded-circle iq-card-icon iq-bg-primary ml-3"> <i class="ri-inbox-fill"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <h6>Music </h6>
                           <span class="iq-icon"><i class="ri-information-fill"></i></span>
                        </div>
                        <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                           <div class="iq-map text-success font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                           <div class="d-flex align-items-center">
                              <h2><?php get("songs");?></h2>
                              <div class="rounded-circle iq-card-icon iq-bg-success ml-3"><i class="ri-price-tag-3-line"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <h6>Playlists</h6>
                           <span class="iq-icon"><i class="ri-information-fill"></i></span>
                        </div>
                        <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                           <div class="iq-map text-danger font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                           <div class="d-flex align-items-center">
                              <h2><?php get("playlist_admin");?></h2>
                              <div class="rounded-circle iq-card-icon iq-bg-danger ml-3"><i class="ri-radar-line"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <h6>Albums</h6>
                           <span class="iq-icon"><i class="ri-information-fill"></i></span>
                        </div>
                        <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                           <div class="iq-map text-info font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                           <div class="d-flex align-items-center">
                              <h2><?php get("album");?></h2>
                              <div class="rounded-circle iq-card-icon iq-bg-info ml-3"><i class="ri-refund-line"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

                     <!--  -->

               <div class="col-lg-6">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"> Playlists</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton1" data-toggle="dropdown">
                              <i class="ri-more-fill"></i>
                              </span>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1" style="">
                                 <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-inline p-0 m-0">
                           <?php recent("playlist_admin", "admin_song", "pname", "pid");?>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Albums</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton1" data-toggle="dropdown">
                              <i class="ri-more-fill"></i>
                              </span>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1" style="">
                                 <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>

                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-inline p-0 m-0">
                          <?php recent("album", "album_song", "aname", "aid");?>
                        </ul>
                     </div>
                  </div>
               </div>


               <div class="col-lg-12">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Recently Added </h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <button class="btn btn-outline-primary">View All</button>
                        </div>
                     </div>
                     <div class="iq-card-body rec-pat">
                        <div class="table-responsive">
                           <table class="table table-striped mb-0 table-borderless">
                              <thead>

                                 <tr>
                                    <th>No</th>
                                    <th>image</th>
                                    <th>Name</th>
                                    <th>user</th>

                                 </tr>
                              </thead>
                              <tbody>
<?php
$sql = "SELECT * FROM ( SELECT * FROM songs ORDER BY id DESC LIMIT 10 ) sub ORDER BY id ";
$res = mysqli_query($conn,$sql);
$i=1;
if(mysqli_num_rows($res)>0){
   while($r = mysqli_fetch_assoc($res)){
      ?>
      
                                 <tr>
                                    <td><?=$i;?></td>
                                    <td><div class="media align-items-center text-center">
                                          <img src="<?=$r['img'];?>" class="img-fluid avatar-35 rounded" alt="image">
                                       </div>
                                       </td>
                                    <td>

                                          <div class="media-body ">
                                             <p class="mb-0"><?=$r['title'];?></p>

                                       </div>
                                    </td>
                                    <td><?=$r['user'];?></td>
                                 </tr>
                                 <?
   $i++;}
}
?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Wrapper END -->
<?php require_once '../req/js.php';?>
</body>
</html>
