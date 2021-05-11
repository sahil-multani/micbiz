
<script src="/music/src/js/jquery.min.js" ></script >
<script src="/music/src/js/popper.min.js" ></script >
<script src="/music/src/js/bootstrap.min.js" ></script >
<!-- Appear JavaScript -->
<script src="/music/src/js/jquery.appear.js" ></script >
<!-- Countdown JavaScript -->
<script src="/music/src/js/countdown.min.js" ></script >
<!-- Counterup JavaScript -->
<script src="/music/src/js/waypoints.min.js" ></script >
<script src="/music/src/js/jquery.counterup.min.js" ></script >
<!-- Wow JavaScript -->
<script src="/music/src/js/wow.min.js" ></script >
<!-- Apexcharts JavaScript -->
<script src="/music/src/js/apexcharts.js" ></script >
<!-- Slick JavaScript -->
<script src="/music/src/js/slick.min.js" ></script >
<!-- Select2 JavaScript -->
<script src="/music/src/js/select2.min.js" ></script >
<!-- Owl Carousel JavaScript -->
<script src="/music/src/js/owl.carousel.min.js" ></script >
<!-- Magnific Popup JavaScript -->
<script src="/music/src/js/jquery.magnific-popup.min.js" ></script >
<!-- Smooth Scrollbar JavaScript -->
<script src="/music/src/js/smooth-scrollbar.js" ></script >
<!-- lottie JavaScript -->
<script src="/music/src/js/lottie.js" ></script >
<!-- am core JavaScript -->
<script src="/music/src/js/core.js" ></script >
<!-- am charts JavaScript -->
<script src="/music/src/js/charts.js" ></script >
<!-- am animated JavaScript -->
<script src="/music/src/js/animated.js" ></script >
<!-- am kelly JavaScript -->
<script src="/music/src/js/kelly.js" ></script >
<!-- am maps JavaScript -->
<script src="/music/src/js/maps.js" ></script >
<!-- am worldLow JavaScript -->
<script src="/music/src/js/worldLow.js" ></script >
<!-- Raphael-min JavaScript -->
<script src="/music/src/js/raphael-min.js" ></script >
<!-- Morris JavaScript -->
<script src="/music/src/js/morris.js" ></script >
<!-- Morris min JavaScript -->
<script src="/music/src/js/morris.min.js" ></script >
<!-- Flatpicker Js -->
<script src="/music/src/js/flatpickr.js" ></script >
<!-- Style Customizer -->
<script src="/music/src/js/style-customizer.js" ></script >
<!-- Chart Custom JavaScript -->
<script src="/music/src/js/chart-custom.js" ></script >
<!-- Music js -->
<!-- Music-player js -->
<!-- Custom JavaScript -->
<script src="/music/src/js/custom.js" ></script >
<script src="/music/src/js/toaster.js" ></script >
<script >
  $("#chTheme").on("click", function () {
	$("#customSwitch05").click();
  });
  $("#customSwitch05").on("click", function () {
	let itheme = $(this).is(":checked");

	function theme(i) {
	  $.ajax({
		type: 'POST',
		url: '/music/assets/theme/theme.php',
		data: {
		  theme: i,
		},
		success: function (response) {
		  console.log(response);
		  $("#inj").html(response);
		  let t = i == 0 ? 'dark' : 'light';
		  // $("#themeState").html(t + " theme")
		}
	  });
	}

	if (itheme) {
	  theme(0);
	} else {
	  theme(1);
	}
  })
  var addMusic = [];
  toastr.options = {
	"closeButton": false,
	"debug": false,
	"newestOnTop": true,
	"progressBar": true,
	"positionClass": "toast-top-right",
	"preventDuplicates": false,
	"onclick": null,
	"showDuration": "300",
	"hideDuration": "1000",
	"timeOut": "5000",
	"extendedTimeOut": "1000",
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"
  };

  function playMyMusic(dta){
	let data = dta;
	for (i = 0; i < data.length; i++) {
	  let url = data[i][i]['url'];
	  let img = data[i][i].img;
	  let title = data[i][i].title;
	  let user = data[i][i].user;
	  MusicId[i] = data[i][i].mid;
	  mymusic = {
		[i]: {
		  img: img,
		  title: title,
		  user: user,
		  url: url,
		},
	  };
	  arr[i] = mymusic;
	}
  }

</script >
