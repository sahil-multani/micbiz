<?php
	$conn = mysqli_connect('localhost', 'root', '', 'music') or die(mysqli_error());
	$i = $_POST['data'];
	$sql = '';
	foreach ($i as $row) {
		$id = $row['id'];
		$title = $row['title'];
		$img = $row['img'];
		$url = $row['url'];
		$user = $row['user'];
		if ($sql != '') {
			$sql .= ',';
		}
		$sql .= "(NULL, {$id}, '{$title}', '{$img}', '{$url}', '{$user}')";
	}
	if ($sql != '') {
		 $sql = 'INSERT INTO `songs` (`id`, `mid`, `title`, `img`, `url`, `user`) VALUES  ' . $sql;
		if (mysqli_query($conn, $sql)) {
			$check = "DELETE s1 from songs as s1 INNER join songs as s2 where s1.id < s2.id and s1.mid  = s2.mid";
			mysqli_query($conn, $check);
			echo mysqli_affected_rows($conn);
			
		}
	}
?>
