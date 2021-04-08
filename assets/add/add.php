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
	 mysqli_query($conn, $sql);
}
