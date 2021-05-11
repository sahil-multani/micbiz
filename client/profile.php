<?php require_once "../session.php";

	$sql = "SELECT * FROM `user` WHERE `uname` = '{$user}'";
	$res = mysqli_query($conn, $sql);
    mysqli_num_rows($res);
?>
<!doctype html>
<html lang="en" data-theme="dark">
<?php
	require_once '../req/css.php'; ?>
<? if (mysqli_num_rows($res) > 0){
   while ($row = mysqli_fetch_assoc($res)) {
   	$img = '/music/src/uploads/' . $row['img'];
   	$mail = $row['mail'];
   	$uname = $row['uname'];
   	$fname = $row['fname'];
   	$lname = $row['lname'];
   	$pn = $row['pn'];
   	$fb = $row['fb'];
   	$tw = $row['tw'];
   	$ig = $row['ig'];
   	$theme = $row['theme']==0 ? 'dark' : 'light'; ?>

<head>
<div id="inj">
            <?php require_once '../req/css.php'; ?>
    </div>

</head>

<body class="sidebar-main-active right-column-fixed">
   <!-- loader Start -->

   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <?php require_once '../assets/nav/top.php';
         require_once '../assets/nav/sidebar.php';?>
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row profile-content">
               <div class="col-12 col-md-12 col-lg-4">
                  <div class="iq-card">
                     <div class="iq-card-body profile-page">
                        <div class="profile-header">
                           <div class="cover-container text-center">

                              <img src="<?= $img; ?>"
                                 alt="profile-bg" class="rounded-circle img-fluid">
                              <div class="profile-detail mt-3 mb-3">
                                 <h3><?= $uname;?>
                                 </h3>
                              </div>
                              <div class="iq-social d-inline-block align-items-center">
                                 <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                    <li>
                                       <a href="<?=$fb;?>"
                                          class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i
                                             class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                       <a href="<?=$tw;?>"
                                          class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i
                                             class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>

                                    <li>
                                       <a href="<?=$ig;?>"
                                          class="avatar-40 rounded-circle bg-primary pinterest"><i
                                             class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                        <div class="iq-header-title">
                           <h4 class="card-title mb-0">Personal Details</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-inline p-0 mb-0">
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Username</h6>
                                 <p class="mb-0"><?=$uname;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>First Name</h6>
                                 <p class="mb-0"><?=$fname;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Last Name </h6>
                                 <p class="mb-0"><?=$pn;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Email</h6>
                                 <p class="mb-0"><a href="javascript:void();" class="__cf_email__">[<?=$mail;?>]</a>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Twitter</h6>
                                 <p class="mb-0"><?=$tw;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Instagram</h6>
                                 <p class="mb-0"><?=$ig;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Facebook</h6>
                                 <p class="mb-0"><?=$fb;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Mobile </h6>
                                 <p class="mb-0"><?=$pn;?>
                                 </p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div> -->
                <!--   <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                        <div class="iq-header-title">
                           <h4 class="card-title mb-0">Skill Progress</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-inline p-0 mb-0">
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Biography</h6>
                                 <div class="iq-progress-bar-linear d-inline-block mt-1 w-50">
                                    <div class="iq-progress-bar iq-bg-primary">
                                       <span class="bg-primary" data-percent="70"></span>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Horror</h6>
                                 <div class="iq-progress-bar-linear d-inline-block mt-1 w-50">
                                    <div class="iq-progress-bar iq-bg-danger">
                                       <span class="bg-danger" data-percent="50"></span>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Comic Book</h6>
                                 <div class="iq-progress-bar-linear d-inline-block mt-1 w-50">
                                    <div class="iq-progress-bar iq-bg-info">
                                       <span class="bg-info" data-percent="65"></span>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between">
                                 <h6>Adventure</h6>
                                 <div class="iq-progress-bar-linear d-inline-block mt-1 w-50">
                                    <div class="iq-progress-bar iq-bg-success">
                                       <span class="bg-success" data-percent="85"></span>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div> -->
               </div>
               <div class="col-12 col-md-12 col-lg-8">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                              <div class="iq-header-title">
                                 <h4 class="card-title mb-0">Recently Played

                                 </h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <ul class="list-inline p-0 mb-0">
                                 <li class="d-flex mb-4 align-items-center">
                                    <div class="profile-icon bg-secondary"><span><i class="ri-music-fill"></i></span>
                                    </div>
                                    <div class="media-support-info ml-3">
                                       <h6>music1</h6>
                                       <p class="mb-0">test</p>
                                    </div>
                                    <div class="iq-card-toolbar ml-auto">
                                       <div class="dropdown">
                                          <span class="font-size-24" id="dropdownMenuButton01" data-toggle="dropdown"
                                             aria-expanded="false">
                                             <i class="ri-more-line"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right p-0" style="">
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-user-unfollow-line mr-2"></i>Share</a>
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-close-circle-line mr-2"></i>Delete</a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="d-flex mb-4 align-items-center">
                                    <div class="profile-icon bg-secondary"><span><i class="ri-music-fill"></i></span>
                                    </div>
                                    <div class="media-support-info ml-3">
                                    <div class="media-support-info ml-3">
                                       <h6>music1</h6>
                                       <p class="mb-0">test</p>
                                    </div>
                                    </div>
                                    <div class="iq-card-toolbar ml-auto">
                                       <div class="dropdown">
                                          <span class="font-size-24" id="dropdownMenuButton02" data-toggle="dropdown"
                                             aria-expanded="false">
                                             <i class="ri-more-line"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right p-0" style="">
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-user-unfollow-line mr-2"></i>Share</a>
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-close-circle-line mr-2"></i>Delete</a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="d-flex mb-4 align-items-center">
                                    <div class="profile-icon bg-secondary"><span><i class="ri-music-fill"></i></span>
                                    </div>
                                    <div class="media-support-info ml-3">
                                    <div class="media-support-info ml-3">
                                       <h6>music1</h6>
                                       <p class="mb-0">test</p>
                                    </div>
                                    </div>
                                    <div class="iq-card-toolbar ml-auto">
                                       <div class="dropdown">
                                          <span class="font-size-24" id="dropdownMenuButton03" data-toggle="dropdown"
                                             aria-expanded="false">
                                             <i class="ri-more-line"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right p-0" style="">
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-user-unfollow-line mr-2"></i>Share</a>
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-close-circle-line mr-2"></i>Delete</a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="d-flex mb-4 align-items-center">
                                    <div class="profile-icon bg-secondary"><span><i class="ri-music-fill"></i></span>
                                    </div>
                                    <div class="media-support-info ml-3">
                                    <div class="media-support-info ml-3">
                                       <h6>music1</h6>
                                       <p class="mb-0">test</p>
                                    </div>
                                    </div>
                                    <div class="iq-card-toolbar ml-auto">
                                       <div class="dropdown">
                                          <span class="font-size-24" id="dropdownMenuButton04" data-toggle="dropdown"
                                             aria-expanded="false">
                                             <i class="ri-more-line"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right p-0" style="">
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-user-unfollow-line mr-2"></i>Share</a>
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-close-circle-line mr-2"></i>Delete</a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="d-flex align-items-center">
                                    <div class="profile-icon bg-secondary"><span><i class="ri-music-fill"></i></span>
                                    </div>
                                    <div class="media-support-info ml-3">
                                    <div class="media-support-info ml-3">
                                       <h6>music1</h6>
                                       <p class="mb-0">test</p>
                                    </div>
                                    </div>
                                    <div class="iq-card-toolbar ml-auto">
                                       <div class="dropdown">
                                          <span class="font-size-24" id="dropdownMenuButton05" data-toggle="dropdown"
                                             aria-expanded="false">
                                             <i class="ri-more-line"></i>
                                          </span>
                                          <div class="dropdown-menu dropdown-menu-right p-0" >
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-user-unfollow-line mr-2"></i>Share</a>
                                             <a class="dropdown-item" href="#"><i
                                                   class="ri-close-circle-line mr-2"></i>Delete</a>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                           <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                              <div class="iq-header-title">
                                 <h4 class="card-title mb-0">playlists</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <ul class="list-inline p-0 mb-0">
                                 <li>
                                    <div class="iq-details mb-2">
                                       <span class="title">plalist1</span>
                                       <div class="percentage float-right text-primary">95 <span>%</span></div>
                                       <div class="iq-progress-bar-linear d-inline-block w-100">
                                          <div class="iq-progress-bar">
                                             <span class="bg-primary" data-percent="95"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="iq-details mb-2">
                                       <span class="title">playlist2</span>
                                       <div class="percentage float-right text-warning">72 <span>%</span></div>
                                       <div class="iq-progress-bar-linear d-inline-block w-100">
                                          <div class="iq-progress-bar">
                                             <span class="bg-warning" data-percent="72"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="iq-details mb-2">
                                       <span class="title">playlist3</span>
                                       <div class="percentage float-right text-info">75 <span>%</span></div>
                                       <div class="iq-progress-bar-linear d-inline-block w-100">
                                          <div class="iq-progress-bar">
                                             <span class="bg-info" data-percent="75"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="iq-details mb-2">
                                       <span class="title">playlsit4</span>
                                       <div class="percentage float-right text-danger">70 <span>%</span></div>
                                       <div class="iq-progress-bar-linear d-inline-block w-100">
                                          <div class="iq-progress-bar">
                                             <span class="bg-danger" data-percent="70"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="iq-details">
                                       <span class="title">playlist5</span>
                                       <div class="percentage float-right text-success">80 <span>%</span></div>
                                       <div class="iq-progress-bar-linear d-inline-block w-100">
                                          <div class="iq-progress-bar">
                                             <span class="bg-success" data-percent="80"></span>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                        <div class="iq-header-title">
                           <h4 class="card-title mb-0">Daily Sales</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <div class="dropdown">
                              <span class="dropdown-toggle text-primary" id="dropdownMenuButton05"
                                 data-toggle="dropdown">
                                 <i class="ri-more-fill"></i>
                              </span>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton05">
                                 <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                 <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                 <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                 <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                 <a class="dropdown-item" href="#"><i
                                       class="ri-file-download-fill mr-2"></i>Download</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="perfomer-lists m-0 p-0">
                           <li class="d-flex mb-4 align-items-center">
                              <div class="user-img img-fluid"><img class="img-fluid avatar-50 rounded-circle"
                                    src="/music/src/images/user/06.jpg" alt=""></div>
                              <div class="media-support-info ml-3">
                                 <h5>Reading on the World</h5>
                                 <p class="mb-0">Lorem Ipsum is simply dummy test</p>
                              </div>
                              <div class="iq-card-header-toolbar d-flex align-items-center ml-auto">
                                 <span class="text-dark"><b>+$82</b></span>
                              </div>
                           </li>
                           <li class="d-flex mb-4 align-items-center">
                              <div class="user-img img-fluid"><img class="img-fluid avatar-50 rounded-circle"
                                    src="/music/src/images/user/07.jpg" alt=""></div>
                              <div class="media-support-info ml-3">
                                 <h5>Little Black Book</h5>
                                 <p class="mb-0">Lorem Ipsum is simply dummy test</p>
                              </div>
                              <div class="iq-card-header-toolbar d-flex align-items-center ml-auto">
                                 <span class="text-dark"><b>+$90</b></span>
                              </div>
                           </li>
                           <li class="d-flex mb-4 align-items-center">
                              <div class="user-img img-fluid"><img class="img-fluid avatar-50 rounded-circle"
                                    src="/music/src/images/user/08.jpg" alt=""></div>
                              <div class="media-support-info ml-3">
                                 <h5>See the More Story</h5>
                                 <p class="mb-0">Lorem Ipsum is simply dummy test</p>
                              </div>
                              <div class="iq-card-header-toolbar d-flex align-items-cener ml-auto">
                                 <span class="text-dark"><b>+$85</b></span>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div> --> <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                        <div class="iq-header-title">
                           <h4 class="card-title mb-0">Personal Details</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="list-inline p-0 mb-0">
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Username</h6>
                                 <p class="mb-0"><?=$uname;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>First Name</h6>
                                 <p class="mb-0"><?=$fname;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Last Name </h6>
                                 <p class="mb-0"><?=$pn;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Email</h6>
                                 <p class="mb-0"><a href="javascript:void();" class="__cf_email__">[<?=$mail;?>]</a>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Twitter</h6>
                                 <p class="mb-0"><?=$tw;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Instagram</h6>
                                 <p class="mb-0"><?=$ig;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Facebook</h6>
                                 <p class="mb-0"><?=$fb;?>
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                 <h6>Mobile </h6>
                                 <p class="mb-0"><?=$pn;?>
                                 </p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                        <div class="iq-header-title">
                           <h4 class="card-title mb-0">Top Products</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <div class="dropdown">
                              <span class="dropdown-toggle text-primary" id="dropdownMenuButton05"
                                 data-toggle="dropdown">
                                 <i class="ri-more-fill"></i>
                              </span>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton05">
                                 <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                 <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                 <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                 <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                 <a class="dropdown-item" href="#"><i
                                       class="ri-file-download-fill mr-2"></i>Download</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="perfomer-lists m-0 p-0">
                           <li class="row mb-3 align-items-center justify-content-between">
                              <div class="col-md-8">
                                 <h5>Find The Wave Book</h5>
                                 <p class="mb-0">General Book</p>
                              </div>
                              <div class="col-md-4 text-right">
                                 <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <span class="text-primary mr-3"><b>+$92</b></span>
                                    <div class="iq-progress-bar-linear d-inline-block mt-1 w-100">
                                       <div class="iq-progress-bar iq-bg-primary">
                                          <span class="bg-primary" data-percent="92"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="row mb-3 align-items-center justify-content-between">
                              <div class="col-md-8">
                                 <h5>A man with those Faces</h5>
                                 <p class="mb-0">Biography Book</p>
                              </div>
                              <div class="col-md-4 text-right">
                                 <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <span class="text-danger mr-3"><b>+$85</b></span>
                                    <div class="iq-progress-bar-linear d-inline-block mt-1 w-100">
                                       <div class="iq-progress-bar iq-bg-danger">
                                          <span class="bg-danger" data-percent="85"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php
   }
}

	require_once '../req/js.php'; ?>

</body>

</html>