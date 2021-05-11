<?php
$conn = mysqli_connect('localhost', 'root', '', 'music');

$q = isset($_POST['for']) ? $_POST['for'] : 'songs';
if ($q == 'songs') {
    $sql = 'select * from songs';
} else {
    $sql = "select * from songs s  join  new_relesed nw  on s.mid = nw.mid";
}

$res = mysqli_query($conn, $sql);
$i = 1;
if (mysqli_num_rows($res)) {
    while ($r = mysqli_fetch_assoc($res)) {
        ?>
<tr>
	<td><?=$i?>
	</td>
	<td>
		<img src="<?=$r['img'];?>"
			class="img-fluid avatar-50 rounded" alt="author-profile">
	</td>
	<td><?=$r['title'];?>
	</td>
	<td>
		<div class="flex align-items-center list-user-action">

			<a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
				href="admin-add-category.html"><i class="ri-pencil-line"></i></a>
			<a class="bg-primary trigger-btn delete"
				data-mid="<?=$r['mid'];?>"
				data-placement="top" title="" data-original-title="Delete" href="#myModal" data-toggle="modal"><i
					class="ri-delete-bin-line"></i></a>
			<div class="text-center">


			</div>
		</div>
	</td>
</tr>
<?php $i++;
    }
}
