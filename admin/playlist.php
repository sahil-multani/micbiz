<? require_once "session.php"; ?>
<!doctype html>
<html lang="en" >
<head >
  <div id="inj" >
	<?php require_once '../req/css.php'; ?>
  </div >
</head >
<body >
<div class="wrapper hide" >
  <?php require_once '../assets/nav/top.php';
	require_once '../assets/nav/admin/sidebar.php'; ?>
  <!-- Page Content  -->
  <div id="content-page" class="content-page" >
	<div class="container-fluid" >
	  <div class="row" >
		<div class="col-sm-12 " >
		  <div class="iq-card" >
			<div class="iq-card-header d-flex justify-content-between" >
			  <div class="iq-header-title" >
				<h4 class="card-title" >Create Playlist</h4 >
			  </div >
			</div >
			<div class="iq-card-body" >
			  <p >insert a new playlist name to display it to users</p >
			  
			  <form  method="post" action="" autocomplete="off">
				<div class="form-group" >
				  <label for="email text-capitalize" >playlist name :</label >
				  <input type="text" class="form-control" id="email1" tabindex="1" name="pname">
					<div class="error">playlist alredy exist !</div>
				</div >
				<button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="2">add now!</button >
			  </form >
			</div >
		  </div >
		</div >
	  </div >
	</div >
  </div >
</div >
<?php
  require_once '../req/js.php';
  
?>
</body >
</html >
	<script >
		$(".error").hide();
	</script >
<?php if(isset($_POST['pname'])){
	$pname = $_POST['pname'];
	$sql = "insert into playlist_admin values (null,'{$pname}')";
    if(!mysqli_query($conn,$sql)){
    	echo mysqli_errno($conn);
    	if(mysqli_errno($conn) == 1062){
    		echo "<script>$('.error').show()
toastr['error']( 'playlist already exist !')</script>";
	    }
    }else{
      echo "<script>toastr['info']( 'playlist created !')</script>";
	}
    
}