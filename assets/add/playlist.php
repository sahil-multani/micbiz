<option selected="" disabled="" value="">Choose...</option>
<?php
	$conn = mysqli_connect("localhost","root","","music");
	$sql = "select id,pname from playlist_admin ";
	$res = mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)>0 ){
		while($r = mysqli_fetch_assoc($res))
		{
			echo "<option value='{$r["id"]}'>{$r['pname']}</option>";
		}
	}
