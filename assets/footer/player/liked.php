<?php session_start();
$ids = join("','",$_SESSION['liked']);
$sql =  "select * from songs where mid in ('{$ids}')";
$conn= mysqli_connect("localhost","root","","music");
$res = mysqli_query($conn,$sql);
$i=0;
$data = array();
if(mysqli_num_rows($res)>0){
	while($r = mysqli_fetch_assoc($res)){
		$d[$i] = $r;
		array_push($data, $d);
		$i++;
	}
}

echo json_encode($data);