<?php session_start();
	if (!isset($_SESSION['admin'])) {

		?>
		<script type="text/javascript">
            window.location.href = '/music/admin/login.php';
         </script>
	<? }
	else {
		$user = $_SESSION['admin'];
		$uid = $_SESSION['aid'];
		$conn = mysqli_connect("localhost", "root", "", "music");
		$sql = "SELECT * FROM admin WHERE id = '{$uid}'";
		$res = mysqli_query($conn, $sql);
		if (mysqli_num_rows($res) > 0) {
			while ($r = mysqli_fetch_assoc($res)) {
				$_SESSION['data'] = $r;
			}
		}
	}
?>