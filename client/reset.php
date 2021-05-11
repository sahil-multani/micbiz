<!doctype html>
<html lang="en">
<head>

            <?php require_once '../req/css.php'; ?>

    </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <section class="sign-in-page">
         <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
               <div class="col-md-6 col-sm-12 col-12 ">
                  <div class="sign-user_card ">
                     <div class="d-flex justify-content-center">
                        <div class="sign-user_logo">
                           <img src="images/login/user.png" class=" img-fluid" alt="Logo">
                        </div>
                     </div>
                     <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto pt-5">
                           <h1 class="mb-0">Reset Password</h1>
                           <p class="text-white">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                           <form class="mt-4">
                              <div class="form-group">
                                 <label for="exampleInputEmail1">Email address</label>
                                 <input
		                                 type="email" class="form-control mb-0" id="exampleInputEmail1"
		                                 placeholder="Enter email">
                              </div>
                              <div class="d-inline-block w-100">
                                 <a href="sign-in.html" class="btn btn-primary float-right">Reset Password</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php require_once "../req/js.php";?>
   </body>

</html>