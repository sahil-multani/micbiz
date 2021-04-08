<?php session_start(); ?>
<!doctype html>
<html lang="en">

<style>
   .checkpwd,
   .error {
      width: 100%;
      margin-top: .25rem;
      font-size: 80%;
      color: #dc3545
   }
</style>

<head>

<div id="inj">
            <?php require_once '../req/css.php'; ?>
    </div>
</head>

<body class="sidebar-main-active right-column-fixed">
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
   <!-- loader END -->
   <!-- Sign in Start -->
   <div class="wrapper hide">
      <section class="sign-in-page">
         <div class="container">
            <div class="row justify-content-center align-items-center height-self-center">
               <div class="col-md-8 col-sm-12 col-12 align-self-center">
                  <div class="sign-user_card ">
                     <div class="d-flex justify-content-center">
                        <div class="sign-user_logo">
                           <img class="profile-pic img-fluid" src="<?= $css;?>/images/user/11.png" alt="profile-pic">
                        </div>
                     </div>
                     <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto pt-5">
                           <h1 class="mb-3 text-center">Sign Up</h1>
                           <form class="needs-validation mt-4" novalidate method="POST" name="addUser"
                              enctype="multipart/form-data">



                              <div class="form-group">
                                 <label for="exampleInputEmail2">Username</label>
                                 <input type="text" class="form-control mb-0" id="exampleInputEmail2"
                                    placeholder="Your Username" required name="uname">
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                                 <div class="invalid-feedback">
                                    Please provide a valid Username.
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputEmail3">Email address</label>
                                 <input type="email" class="form-control mb-0" id="exampleInputEmail3"
                                    placeholder="Enter email" required name="mail">
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                                 <div class="invalid-feedback">
                                    Please provide a valid Email address.
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputPassword2">Password</label>
                                 <input type="password" class="form-control mb-0" id="exampleInputPassword2"
                                    placeholder="Password" name="pwd" required>
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                                 <div class="invalid-feedback">
                                    Password is required.
                                 </div>
                              </div>

                              <div class="sign-info mt-3">
                                 <button type="submit" class="btn btn-primary mb-2" name="pi">Sign Up</button>
                                 <div class="d-block line-height-2 text-white">Already Have Account ? <a
                                       href="sign-in.html">LogIn</a></div>
                                 <div class="error"></div>
                              </div>
                              <input class="file-upload" type="file" name="image" hidden />
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
   <?php $js='../';
    require_once '../req/js.php';?>
</body>

</html>


<script>
   $(".profile-pic").on("click", function() {
      $(".file-upload").click();
   })
</script>

<?php
if (isset($_FILES['image']['name'])) {
   	//vars
   	require_once '../assets/db/db.php';
   	//$fn = $_POST['fn'];
   	//$ln = $_POST['ln'];
   	$uname = $_POST['uname'];
   	//$city = $_POST['city'];
   	$pwd = $_POST['pwd'];
   	$mail = $_POST['mail'];

   	$check = "SELECT `mail`,`uname` FROM `user` WHERE `mail` ='{$mail}' OR `uname` = '{$uname}' ";
   	$res = mysqli_query($conn, $check);
   	$row = mysqli_num_rows($res);
   	if ($row > 0) {
   		$e = '<div class="text-white">Username or Email already exist !</div>';
   		echo "<script>$('.error').html('{$e}')</script>";
   	} else {
   		//image upload
   		$errors = [];
   		$file_name = $_FILES['image']['name'];
   		$file_size = $_FILES['image']['size'];
   		$file_tmp = $_FILES['image']['tmp_name'];
   		$file_type = $_FILES['image']['type'];
   		$explode = explode('.', $_FILES['image']['name']);
   		$i = str_replace(' ', '', microtime());
   		$j = str_replace('.', '', $i);
   		$file_ext = strtolower(end($explode));
   		$extensions = ['jpeg', 'jpg', 'png'];

   		if ($file_name != '') {
   			if (in_array($file_ext, $extensions) === false) {
   				$errors[] = 'extension not allowed, please choose a JPEG or PNG file.';
   			}

   			if ($file_size > 2097152) {
   				$errors[] = 'File size must be excately 2 MB';
   			}

   			if (empty($errors) == true) {
   				$file = $j . '.' . $file_ext;

   				$sql = "INSERT INTO `user` (`id`, `img`, `mail`, `uname`, `pwd`, `fname`, `lname`, `pn`, `fb`, `tw`, `ig`, `theme`) VALUES (NULL, '{$file}', '{$mail}', '{$uname}', '{$pwd}', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";

   				if (mysqli_query($conn, $sql)) {
   					$_SESSION['user'] = $uname;
   					move_uploaded_file($file_tmp, '../src/uploads/' . $file);
   					echo "<script>document.location.href='add-user.php'</script>";
   				}
   			} else {
   				echo "<script>$('.error').html('{$errors[0]}')</script>";
   			}
   		} else {
   			$sql = "INSERT INTO `user` (`id`, `img`, `mail`, `uname`, `pwd`, `fname`, `lname`, `pn`, `fb`, `tw`, `ig`, `theme`) VALUES (NULL, NULL, '{$mail}', '{$uname}', '{$pwd}', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
   			if (mysqli_query($conn, $sql)) {
   				$_SESSION['user'] = $uname;
   				echo "<script>document.location.href='add-user.php'</script>";
   			}
   		}
   	}
   }
