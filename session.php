<?php session_start();
  if (!isset($_SESSION['user'])) {
	?>
	<script type="text/javascript" >
	  window.location.href = '/music/login.php';
	</script >
  <? }
  else {
	$user = $_SESSION['user'];
	$uid = $_SESSION['uid'];
	$conn = mysqli_connect("localhost", "root", "", "music");
	$sql = "SELECT * FROM user WHERE id = '{$uid}'";
	$res = mysqli_query($conn, $sql);
	if (mysqli_num_rows($res) > 0) {
	  while ($r = mysqli_fetch_assoc($res)) {
		$_SESSION['data'] = $r;
		$_SESSION['user'] = $r['uname'];
		$_SESSION['uid'] = $r['id'];
	  }
	}
	// fetch liked songs //
	$i = 0;
	$likes = [];
	$liked = "select * from liked where uid = '{$uid}'";
	$res2 = mysqli_query($conn, $liked);
	if (mysqli_num_rows($res2) > 0) {
	  while($l = mysqli_fetch_assoc($res2)){
	    $mid = $l['mid'];
	    $likes[$i] = $mid;
	    $i++;
	    
	  }
	}
	}
	?>