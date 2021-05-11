<?php require_once "../session.php";
?>
<!Doctype html>
<html lang="en">

<head>
	<div id="inj">
		<?php require_once '../req/css.php'; ?>
	</div>
</head>

<body>
	<div class="wrapper hide">
		<?php require '../assets/nav/sidebar.php';
	require '../assets/nav/top.php'; ?>
		<div id="content-page" class="content-page">
			<div class="container-fluid">
				<div class="col-lg-12">
					<div class="iq-card">
						<div class="iq-card-header d-flex justify-content-between">
							<div class="iq-header-title">
								<h4 class="card-title">liked Songs</h4>
							</div>
						</div>
						<div class="iq-card-body">
							<ul class="list-unstyled row iq-box-hover mb-0">
								<?php
				$sql = "select  s.* from songs s join liked `l` on s.mid = `l`.mid where l.uid = '{$uid}' ";
				$res = mysqli_query($conn, $sql);
				$arr = [];
				if (mysqli_num_rows($res) > 0) {
				$i = 0;
				while ($q = mysqli_fetch_assoc($res)) {
				  $arr[] = $q['mid'];
				  ?>
								<li class="col-xl-2 col-lg-3 col-md-4 iq-music-box">
									<div class="iq-card">
										<div class="iq-card-body p-0">
											<div class="iq-thumb playmcs"
												id="m_<?= $i; ?>"
												data-id="<?= $i; ?>"
												data-mid="<?= $q['mid']; ?>">
												<div class="iq-music-overlay"></div>
												<a href="javascript:void(0)">
													<img src="<?= $q['img']; ?>"
														class="img-border-radius img-fluid w-100" alt="">
												</a>
												<div class="overlay-music-icon">
													<a href="javascript:void(0)">
														<i class="las la-play-circle"></i>
													</a>
												</div>
											</div>
											<div class="feature-list  justify-content-between"
												title="<?= $q['title']; ?>">
												<div>
												<h6 class="font-weight-600 mb-0"><?=$q['title']; ?>
												</h6>
													<p class="mb-0 textin"><?= $q['user']; ?>
													</p>
													<div class="  text-right " style="font-size: inherit">
														<i class="fa <? echo in_array($q['mid'], $likes) ? 'fa-heart' : 'fa-heart-o'; ?> like m-1 "
															data-mid="<?= $q['mid']; ?>"></i>
														<i class="ri-play-list-add-line m-1 "></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
								<?
				  $i++;
				}
				$_SESSION['liked'] = $arr; ?>
							</ul>
						</div>
					</div>
				</div>
				<?
		} ?>
				</ul>
			</div>
		</div>
	</div>
	</div>
	<?php
  require_once '../req/js.php';
  require_once '../assets/footer/player/main.php';
  require_once '../assets/footer/player/script.php';
?>
</body>

</html>
<script>
	$(document).on("click", ".playmcs", function() {
		let no = $(this).data("id");
		let url = '/music/assets/footer/player/liked.php';
		$.ajax({
			type: 'GET',
			url: url,
			data: {
				q: 'liked'
			},
			success: function(dta) {
				playMyMusic(dta);
			},
			dataType: "json"
		});
		setTimeout(function() {
			getmusic(no);
		}, 300);
	});
	$('.lib').addClass('active');
    $("#lib").attr("aria-expanded", true);
    $("#lib").addClass("show")
    $(".liked").addClass("active");
</script>