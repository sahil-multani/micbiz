<?php require_once 'session.php';?>
<!doctype html>
<html lang="en">

<head>
	<div id="inj">
		<?php require_once '../req/css.php';?>
	</div>
</head>

<body>
	<div class="wrapper hide">
		<?php require_once '../assets/nav/top.php';
require_once '../assets/nav/admin/sidebar.php';?>
		<!-- Page Content  -->
		<div id="content-page" class="content-page">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 ">
						<div class="iq-card">
							<div class="iq-card-header d-flex justify-content-between">
								<div class="iq-header-title">
									<h4 class="card-title"> Featured</h4>
								</div>
							</div>
							<div class="iq-card-body">
								<p>add songs to create Featured page </p>
								<form method='post'>

									<div class="form-group">
										<div class="table-responsive">
											<table class=" table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th style="width: 5%;">No</th>
														<th style="width: 5%;">Image</th>
														<th style="width: 15%;">Song Name</th>
														<th style="width: 10%;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php $sql = 'select * from songs';
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
																class="img-fluid avatar-50 rounded"
																alt="author-profile">
														</td>
														<td><?=$r['title'];?>
														</td>
														<td>
															<div class="flex align-items-center list-user-action">
																<div class="custom-control custom-checkbox custom-control-inline"
																	data-toggle="tooltip" data-placement="top" title=""
																	data-original-title="add">
																	<input type="checkbox"
																		class="custom-control-input addmid"
																		data-mid="<?=$r['mid'];?>"
																		id="<?=$i;?>">
																	<label class="custom-control-label"
																		for="<?=$i;?>"></label>
																</div>
															</div>
														</td>
													</tr>
													<?php $i++;
    }
}?>
												</tbody>
											</table>
										</div>
									</div>
									<button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="2"
										id="submit">add now!
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
require_once '../req/js.php';
?>
</body>

</html>
<script>
	$(".error").hide();
	var addmid = [];




	$("form").on("submit", function(e) {
		e.preventDefault();
		let arr = [];
		let obj = [];
		let data = $(this).serializeArray();
		//let val = data[0]['value'];
		$(".addmid:checked").each(function() {
			let data = $(this).data('mid');
			arr.push(data);
		});
		obj = [{

			data: arr,
		}];
		//console.log(obj);
		$.ajax({
			type: 'POST',
			url: '/music/assets/add/featured.php',
			data: {
				data: obj
			},
			success: function(res) {
				console.log(res);
				if (res == 200) {
					toastr['info']('inserted succesfull !');
					$(".addmid:checked").each(function() {
						$(this).attr("checked", false)
					})
				} else if (res == 501) {
					toastr['error']('internal server error');
				} else if (res == 401) {
					toastr['warning']('select data to insert !');
				} else if (res == 101) {
					toastr['info']('inserted succesfull !');
					$(".addmid:checked").each(function() {
						$(this).attr("checked", false)
					})
					setTimeout(() => {
						toastr['info']('duplicates removed	 !');
					}, 800);
				}
			}
		});
	});
</script>