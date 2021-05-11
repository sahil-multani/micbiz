<?php
  require_once 'session.php';
?>
<!Doctype html>
<html lang="en">

<head>
	<div id="inj">
		<?php require_once 'req/css.php'; ?>
	</div>
</head>

<body>
	<div class="wrapper hide">
		<?php require 'assets/nav/sidebar.php';
	require 'assets/nav/top.php'; ?>
		<div id="content-page" class="content-page">
			<div class="container-fluid">
				<?php $sql = "select id,pname from playlist_admin";
		$res = mysqli_query($conn, $sql);
		if (mysqli_num_rows($res) > 0) {
		  while ($q = mysqli_fetch_assoc($res)) {
			$i = 0;
			$sql2 = "select `as`.id as sid, s.* from songs s join admin_song `as` on s.mid = `as`.mid where as.pid ='{$q['id']}' limit 6";
			$res2 = mysqli_query($conn, $sql2);
			$num = mysqli_num_rows($res2);
			if (mysqli_num_rows($res2) > 0) { ?>
				<div class="col-lg-12">
					<div class="iq-card">
						<div class="iq-card-header d-flex justify-content-between">
							<div class="iq-header-title">
								<h4 class="card-title"><?= $q['pname']; ?>
								</h4>
							</div>
							<? if ($num > 6) { ?>
							<div class="d-flex align-items-center iq-view">
								<b class="mb-0 text-primary"><a href="albums.html">View More <i
											class="las la-angle-right"></i></a></b>
							</div>
							<? } ?>
						</div>
						<div class="iq-card-body">
							<ul class="list-unstyled row iq-box-hover mb-0">
								<? while ($r = mysqli_fetch_assoc($res2)) {?>
								<li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
									<div class="iq-card">
										<div class="iq-card-body p-0">
											<div class="iq-thumb playmcs"
												id="m_<?= $i; ?>"
												data-id="<?= $i; ?>"
												data-pid="<?= $q['id']; ?>">
												<div class="iq-music-overlay"></div>
												<a href="javascript:void(0)">
													<img src="<?= $r['img']; ?>"
														class="img-border-radius img-fluid w-100" alt="">
												</a>
												<div class="overlay-music-icon">
													<a href="javascript:void(0)">
														<i class="las la-play-circle"></i>
													</a>
												</div>
											</div>
											<div class="feature-list  justify-content-between"
												title="<?= $r['title']; ?>">
												<h6 class="font-weight-600 mb-0"><?= $r['title']; ?>
												</h6>
												<div>
													<p class="mb-0 textin"><?= $r['user']; ?>
													</p>
													<div class="  text-right " style="font-size: inherit">
														<i class="fa <? echo in_array($r['mid'], $likes) ? 'fa-heart' : 'fa-heart-o'; ?> like m-1 "
															data-mid="<?= $r['mid']; ?>"></i>
														<i class="ri-play-list-add-line m-1 "></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
								<?
				$i++;
			  }?>
							</ul>
						</div>
					</div>
				</div>
				<?
			} ?>
				<? }
		} ?>
			</div>
		</div>
	</div>

	<?php
  require_once 'req/js.php';
  require_once 'assets/footer/player/main.php';
  require_once 'assets/footer/player/script.php';
?>
</body>

</html>
<script>
	$(document).on("click", ".playmcs", function() {
		let no = $(this).data("id");
		//console.log(no);
		url = '/music/assets/footer/player/play.php';
		let pid = $(this).data("pid");
		$.ajax({
			type: 'POST',
			url: url,
			data: {
				data: pid
			},
			success: function(dta) {
				playMyMusic(dta);

			},
			dataType: "json",
		});
		setTimeout(function() {
			getmusic(no);
		}, 300);
	});
	$('#dashboard').attr("aria-expanded",true);
	$(".home").addClass('active');
	$("#dashboard").addClass('show');
	$('.dashboard').addClass('active')
</script>