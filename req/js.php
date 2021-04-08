<?php $js = isset($js) ? $js . 'src/' : 'src/'; ?>
<script src="<?=$js; ?>js/jquery.min.js"></script>
<script src="<?=$js; ?>js/popper.min.js"></script>
<script src="<?=$js; ?>js/bootstrap.min.js"></script>
<!-- Appear JavaScript -->
<script src="<?=$js; ?>js/jquery.appear.js"></script>
<!-- Countdown JavaScript -->
<script src="<?=$js; ?>js/countdown.min.js"></script>
<!-- Counterup JavaScript -->
<script src="<?=$js; ?>js/waypoints.min.js"></script>
<script src="<?=$js; ?>js/jquery.counterup.min.js"></script>
<!-- Wow JavaScript -->
<script src="<?=$js; ?>js/wow.min.js"></script>
<!-- Apexcharts JavaScript -->
<script src="<?=$js; ?>js/apexcharts.js"></script>
<!-- Slick JavaScript -->
<script src="<?=$js; ?>js/slick.min.js"></script>
<!-- Select2 JavaScript -->
<script src="<?=$js; ?>js/select2.min.js"></script>
<!-- Owl Carousel JavaScript -->
<script src="<?=$js; ?>js/owl.carousel.min.js"></script>
<!-- Magnific Popup JavaScript -->
<script src="<?=$js; ?>js/jquery.magnific-popup.min.js"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="<?=$js; ?>js/smooth-scrollbar.js"></script>
<!-- lottie JavaScript -->
<script src="<?=$js; ?>js/lottie.js"></script>
<!-- am core JavaScript -->
<script src="<?=$js; ?>js/core.js"></script>
<!-- am charts JavaScript -->
<script src="<?=$js; ?>js/charts.js"></script>
<!-- am animated JavaScript -->
<script src="<?=$js; ?>js/animated.js"></script>
<!-- am kelly JavaScript -->
<script src="<?=$js; ?>js/kelly.js"></script>
<!-- am maps JavaScript -->
<script src="<?=$js; ?>js/maps.js"></script>
<!-- am worldLow JavaScript -->
<script src="<?=$js; ?>js/worldLow.js"></script>
<!-- Raphael-min JavaScript -->
<script src="<?=$js; ?>js/raphael-min.js"></script>
<!-- Morris JavaScript -->
<script src="<?=$js; ?>js/morris.js"></script>
<!-- Morris min JavaScript -->
<script src="<?=$js; ?>js/morris.min.js"></script>
<!-- Flatpicker Js -->
<script src="<?=$js; ?>js/flatpickr.js"></script>
<!-- Style Customizer -->
<script src="<?=$js; ?>js/style-customizer.js"></script>
<!-- Chart Custom JavaScript -->
<script src="<?=$js; ?>js/chart-custom.js"></script>
<!-- Music js -->

<!-- Music-player js -->

<!-- Custom JavaScript -->
<script src="<?=$js; ?>js/custom.js"></script>
<script src="<?=$js; ?>js/toaster.js"></script>


<script>
   $("#chTheme").on("click", function() {
      $("#customSwitch05").click();
   })
   $("#customSwitch05").on("click", function() {
      let itheme = $(this).is(":checked");

      function theme(i) {


         $.ajax({
            type: 'POST',
            url: '/music/assets/theme/theme.php',
            data: {
               theme: i,
            },
            success: function(response) {
               console.log(response)
               $("#inj").html(response)
                let t = i == 0 ? 'dark' : 'light'
               $("#themeState").html(t + " theme")
            }
         });
      }

      if (itheme) {
         theme(0);
      } else {
         theme(1);
      }


   })
</script>