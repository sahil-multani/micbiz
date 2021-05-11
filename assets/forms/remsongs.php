<?php $mid = $_POST['mid'];
$for = $_POST['for'];
$conn = mysqli_connect('localhost', 'root', '', 'music');
$sql = "delete from {$for} where mid = '{$mid}'";
echo mysqli_query($conn, $sql) ? '200' : 'error';
