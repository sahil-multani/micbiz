<?php

	$pid = $_POST['data'];
	$conn = new mysqli('localhost', 'root', '', 'music');
	$sql = "select s.mid,s.title,s.img,s.user,s.url from songs s join admin_song `as` on s.mid = `as`.mid where as.pid = '{$pid}'";
	$result = $conn->query($sql);
	$data = [];
	$i = 0;
	$arr = [];
	if (!isset($_COOKIE['recent'])) {
		//set recent played list
		$arr[] = $pid;
		setcookie('recent', serialize($arr), time() + 360000, '/', null);
	} else {
		// update existing playlist
		$recent = unserialize($_COOKIE['recent'], ['allowed_classes' => false]);
		$recent[] = $pid;
		$recent = array_unique($recent);
		setcookie('recent', serialize($recent), time() + 360000, '/', null);
	}
	if ($result) {
		while ($row = $result->fetch_object()) {
			$d[$i] = $row;
			array_push($data, $d);
			$i++;
		}
		echo json_encode($data);
	}
