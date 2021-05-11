<?php
session_start();
?>
	<!Doctype html>
	<html lang="en">

<head>
   <div id="inj">
      <?php require_once 'req/css.php'; ?>
   </div>
   <style>
      .checkpwd,
      .error {
	      width: 100%;
	      margin-top: .25rem;
	      font-size: 80%;
	      color: #dc3545
      }
   </style>
</head>

<body class="sidebar-main-active right-column-fixed">
   <section class="sign-in-page">
      <div class="container">

         <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-md-6 col-sm-12 col-12 align-self-center">
               <div class="sign-user_card">
                  <div class="alert text-white bg-primary" role="alert" id="alert">
                     <div class="iq-alert-icon">
                        <i class="ri-alert-line"></i>
                     </div>
                     <div class="iq-alert-text">Wrong <b>Username</b> or <b>Password</b>!</div>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="ri-close-line"></i>
                     </button>
                  </div>
                  <div class="sign-in-page-data">
                     <div class="sign-in-from w-100 pt-5 m-auto">
                        <h1 class="mb-3 text-center">Sign in</h1>

                        <form class="needs-validation " novalidate method="POST">
                           <div class="form-group">
                              <label for="exampleInputEmail2">User name</label>
                              <input
		                              type="text" class="form-control mb-0" id="exampleInputEmail2"
		                              placeholder="Username " name="uname" required>
                              <div class="invalid-feedback">
                                 Please provide a valid Username.
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputPassword2">Password</label>
                              <input
		                              type="password" class="form-control mb-0" id="exampleInputPassword2"
		                              placeholder="Password" name="pwd" required>
                              <div class="invalid-feedback">
                                 Password is required.
                              </div>
                           </div>
                           <div class="sign-info">
                              <button type="submit" class="btn btn-primary mb-2">Sign in</button>
                              <span class="dark-color d-block line-height-2">Don't have an account? <a
			                              href="sign-up.html">Sign up</a></span>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="mt-2">
                     <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="client/signup.php" class="ml-2">Sign Up</a>
                     </div>
                     <div class="d-flex justify-content-center links">
                        <a href="pages-recoverpw.html">Forgot your password?</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	   <?php require_once 'req/js.php'; ?>
</body>

</html>
	<script>
   $("#alert").hide();
</script>
<?php
	require_once 'assets/db/db.php';
	if (isset($_POST['uname'])) {
		$uname = $_POST['uname'];
		$pwd = $_POST['pwd'];
		$sql = "SELECT * from user where uname = '{$uname}' and pwd ='{$pwd}'";
		$num = mysqli_num_rows(mysqli_query($conn, $sql));
		$res = mysqli_query($conn, $sql);
		if ($num > 0) {
			while ($r = mysqli_fetch_assoc($res)) {
				$_SESSION['user'] = $r['uname'];
				$_SESSION['uid'] = $r['id'];
			}
			?>
			<script type="text/javascript">
   window.location.href = 'index.php';
</script>
			<?
		}
		else {
			?>
			<script>
      let query = $("#alert").show();
      </script>
			<?
		}
	}