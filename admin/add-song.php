<? require_once "session.php";?>
<!doctype html>
<html lang="en">

<head>
	<div id="inj">
		<?php require_once '../req/css.php'; ?>
	</div>
</head>

<body>
	<div class="wrapper hide">
		<?php require_once '../assets/nav/top.php';
	require_once '../assets/nav/admin/sidebar.php'; ?>
		<!-- Page Content  -->
		<div id="content-page" class="content-page">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<div class="iq-card">
							<div class="iq-card-header d-flex justify-content-between">
								<div class="iq-header-title">
									<h4 class="card-title">Add Song</h4>
								</div>
							</div>
							<div class="iq-card-body">
								<div class="form-group">
									<label>Search Song:</label>
									<input type="text" class="form-control" onkeyup="goSearch(this.value)" tabindex="1">
								</div>
								<div class="form-group">
									<div class="iq-card " style="box-shadow:none;">
										<div class="iq-card-header d-flex justify-content-between">
											<div class="iq-header-title">search results ...</div>
										</div>
										<div class="iq-card-body">
											<ul class="list-unstyled row iq-box-hover mb-0 " id="getresult">
											</ul>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="iq-card " style="box-shadow:none;">
										<div class="iq-card-header d-flex justify-content-between">
											<div class="iq-header-title">songs to be added ...</div>
										</div>
										<div class="iq-card-body">
											<ul class="list-unstyled row iq-box-hover mb-0 " id="checkAdd">
											</ul>
											<button type="submit" class="btn btn-primary" id="addMusicDb">add</button>
										</div>
									</div>
								</div>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
  require_once '../req/js.php';
  require_once '../assets/footer/admin/main.php';
  require_once '../assets/footer/admin/script.php';
?>
</body>

</html>
<script>
	
	$(document).on("click", "input[name^='sahil']", function() {
		let no = $(this).data("no");
		let title = arr[no][no]["title"];
		let img = arr[no][no]["img"];
		let user = arr[no][no]["user"];
		let url = arr[no][no]["url"];
		let mid = $(this).data("id");
		let ischecked = $(this).is(":checked");
		let chk = addMusic.findIndex(({
			id
		}) => id == mid);
		if (ischecked) {
			Music = {
				"title": title,
				"img": img,
				"user": user,
				"url": url,
				"id": mid,
			}



			if (chk != -1 && addMusic[chk]["id"] == mid) {
				console.log("exists");
			} else {
				let isAdded = addMusic.push(Music) ? true : false;
				if (isAdded) {
					addMusicInit();
				}
			}
		} else {
			if (chk != -1 && addMusic[chk]["id"] == mid) {
				addMusic = arrayRemove(addMusic, mid);
				addMusicInit();
			}
			//console.log(1)
		}
	});

	function arrayRemove(arr, value) {
		return arr.filter(function(ele) {
			return ele.id != value;
		});
	}

	function addMusicInit() {
		$.ajax({
			type: 'POST',
			url: '/music/assets/add/song.php',
			data: {
				data: addMusic
			},
			success: function(response) {
				document.getElementById("checkAdd").innerHTML = response;
			}
		});
	}

	$(document).on("click", ".removeMusic", function() {
		let id = $(this).data("id");
		addMusic = arrayRemove(addMusic, id);
		addMusicInit();
	});
	$(document).on("click", "#addMusicDb", function() {
		if (addMusic.length != 0) {
			$.ajax({
				type: 'POST',
				url: '/music/assets/add/add.php',
				data: {
					data: addMusic
				},
				success: function(response) {
					toastr['warning'](addMusic.length - response + ' song(s) added');
					addMusic = [];
					if(response>0){
					setTimeout(function(){  toastr['info']( 'duplicates removed !')},800)
					}
					document.getElementById("checkAdd").innerHTML = '';
				}
			});
		}
	});
</script>