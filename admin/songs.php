<?php require_once 'session.php';?>
<!doctype html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<div id="inj">
		<?php require_once '../req/css.php';?>
	</div>
	<style>
		.modal-confirm {
			color: #636363;
			width: 400px;
		}

		.modal-confirm .modal-content {
			padding: 20px;
			border-radius: 5px;
			border: none;
			text-align: center;
			font-size: 14px;
		}

		.modal-confirm .modal-header {
			border-bottom: none;
			position: relative;
		}

		.modal-confirm h4 {
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -10px;
		}

		.modal-confirm .close {
			position: absolute;
			top: -5px;
			right: -2px;
		}

		.modal-confirm .modal-body {
			color: #999;
		}

		.modal-confirm .modal-footer {
			border: none;
			text-align: center;
			border-radius: 5px;
			font-size: 13px;
			padding: 10px 15px 25px;
		}

		.modal-confirm .modal-footer a {
			color: #999;
		}

		.modal-confirm .icon-box {
			width: 80px;
			height: 80px;
			margin: 0 auto;
			border-radius: 50%;
			z-index: 9;
			text-align: center;
			border: 3px solid #f15e5e;
		}

		.modal-confirm .icon-box i {
			color: #f15e5e;
			font-size: 46px;
			display: inline-block;
			margin-top: 13px;
		}

		.modal-confirm .btn,
		.modal-confirm .btn:active {
			color: #fff;
			border-radius: 4px;
			background: #60c7c1;
			text-decoration: none;
			transition: all 0.4s;
			line-height: normal;
			min-width: 120px;
			border: none;
			min-height: 40px;
			border-radius: 3px;
			margin: 0 5px;
		}

		.modal-confirm .btn-secondary {
			background: #c1c1c1;
		}

		.modal-confirm .btn-secondary:hover,
		.modal-confirm .btn-secondary:focus {
			background: #a8a8a8;
		}

		.modal-confirm .btn-danger {
			background: #f15e5e;
		}

		.modal-confirm .btn-danger:hover,
		.modal-confirm .btn-danger:focus {
			background: #ee3535;
		}

		.trigger-btn {
			display: inline-block;
			margin: 100px auto;
		}
	</style>
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
									<h4 class="card-title">update music</h4>
								</div>
								<div class="iq-card-header-toolbar d-flex align-items-center">
									<a href="admin-add-song.html" class="btn btn-primary">Add New Song</a>
								</div>
							</div>
							<div class="iq-card-body">
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
												<tbody id="getSongs">
												</tbody>
											</table>
										</div>
									</div>


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







<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm ">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>
				<h4 class="modal-title w-100">Are you sure?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
				<input type="text" id="rem" hidden>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger remove" data-dismiss="modal">Delete</button>
			</div>
		</div>
	</div>
</div>


<script>
	var remSong = [];
	$(document).on("click", ".delete", function() {
		let mid = $(this).data("mid");
		remSong[0] = mid
	})

	$(document).on("click", ".remove", function() {
		let mid = remSong[0];
		$.ajax({
			url: '/music/assets/forms/remsongs.php',
			type: 'POST',
			data: {
				mid: mid
			},
			success: function(res) {
				GetSongs()
			}
		})
	})


	function GetSongs() {
		$.ajax({
			url: '/music/assets/forms/songs.php',
			type: 'POST',
			success: function(res) {
				$("#getSongs").html(res);
			},
		});
	}
	GetSongs()
</script>