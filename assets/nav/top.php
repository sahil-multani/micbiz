<?php
	$img = isset($_SESSION['data']['img']) && $_SESSION['data']['img'] != NULL ? "/music/src/uploads/" . $_SESSION['data']['img'] : "/music/src/images/user/11.png";
?>
<div class="iq-top-navbar">
   <div class="iq-navbar-custom">
      <nav class="navbar navbar-expand-lg navbar-light p-0">
         <div class="iq-menu-bt d-flex align-items-center">
            <div class="wrapper-menu">
               <div class="main-circle"><i class="las la-bars"></i></div>
            </div>
            <div class="iq-navbar-logo d-flex justify-content-between">
               <a href="index.html" class="header-logo">
                  <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                  <div class="pt-2 pl-2 logo-title">
                     <span class="text-primary text-uppercase">CitBij</span>
                  </div>
               </a>
            </div>
         </div>
         <button
		         class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		         aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
            <i class="ri-menu-3-line"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="list-unstyled iq-menu-top d-flex justify-content-between mb-0 p-0">
               <li class="active"><a href="index.html">Home</a></li>
               <li><a href="latest.html">Latest</a></li>
               <li><a href="albums.html">Albums</a></li>
            </ul>
            <ul class="navbar-nav ml-auto navbar-list">
               <li class="nav-item nav-icon search-input">
                  <a href="javascript:void();;" class="search-toggle iq-waves-effect text-black rounded">
                     <i class="ri-search-line text-black"></i>
                     <span class=" dots"></span>
                  </a>
               </li>
               <li class="nav-item nav-icon " title="change theme">
                  <a href="#" class="search-toggle iq-waves-effect text-black rounded" id="chTheme">
                     <i class="las la-cog"></i>
                     <span class=" dots"></span>
                  </a>

               </li>
               <li class="line-height pt-3">
                  <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                     <img src="<?= $img; ?>" class="img-fluid rounded-circle" alt="user">
                  </a>
                  <div class="iq-sub-dropdown iq-user-dropdown">
                     <div class="iq-card shadow-none m-0">
                        <div class="iq-card-body p-0 ">
                           <div class="bg-primary p-3 ">
                              <h5 class="mb-0 text-white line-height mt-2 ">hello <?=$_SESSION['data']['uname'];?></h5>
                           </div>
                           <a href="/music/client/profile.php" class="iq-sub-card iq-bg-primary-hover">
                              <div class="media align-items-center">
                                 <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-file-user-line"></i>
                                 </div>
                                 <div class="media-body ml-3">
                                    <h6 class="mb-0 ">My Profile</h6>
                                    <p class="mb-0 font-size-12">View personal profile details.</p>
                                 </div>
                              </div>
                           </a>
                           <a href="/music/client/edit.php" class="iq-sub-card iq-bg-primary-hover">
                              <div class="media align-items-center">
                                 <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-profile-line"></i>
                                 </div>
                                 <div class="media-body ml-3">
                                    <h6 class="mb-0 ">Edit Profile</h6>
                                    <p class="mb-0 font-size-12">Modify your personal details.</p>
                                 </div>
                              </div>
                           </a>
                           <!--<a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                              <div class="media align-items-center">
                                 <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-account-box-line"></i>
                                 </div>
                                 <div class="media-body ml-3">
                                    <h6 class="mb-0 ">Account settings</h6>
                                    <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                 </div>
                              </div>
                           </a>-->
<!--                           <a href="#" class="iq-sub-card iq-bg-primary-hover" id='chTheme'>-->
<!--                              <div class="media align-items-center">-->
<!--                                 <div class="rounded iq-card-icon iq-bg-primary">-->
<!--                                    <i class="ri-lock-line"></i>-->
<!--                                 </div>-->
<!--                                 <div class="media-body ml-3">-->
<!--                                    <h6 class="mb-0 ">Change Theme</h6>-->
<!--                                    <p-->
<!--		                                    class="mb-0 font-size-12"-->
<!--		                                    id="themeState">--><?//= isset($_SESSION['theme']) ? $_SESSION['theme'] : 'dark '; ?>
<!--	                                    theme</p>-->
<!--                                 </div>-->
<!--                              </div>-->
<!--                           </a>-->
                           <div class="d-inline-block w-100 text-center p-3">
                              <a class="bg-primary iq-sign-btn" href="sign-in.html" role="button">Sign out<i
			                              class="ri-login-box-line ml-2"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
   </div>
</div>

                                       <input
		                                       type="checkbox" class="custom-control-input bg-dark" id="customSwitch05"
		                                       checked="" style="opacity:0;" hidden>

