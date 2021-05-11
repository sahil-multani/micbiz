<?php
	session_start();
	$uid = $_SESSION['uid'];
	$conn = mysqli_connect("localhost", "root", "", "music");
	if (isset($_POST['like'])) {
		$add = $_POST['like'];
		$sql = "insert into liked values (null ,'{$uid}','{$add}')";
		mysqli_query($conn, $sql);
	}
	if (isset($_POST['rmlike'])) {
		$rm = $_POST['rmlike'];
		$sql = "delete from liked  where uid = '{$uid}' and mid = '{$rm}'";
		mysqli_query($conn, $sql);
	}