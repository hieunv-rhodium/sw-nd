<script src="{{ mix('js/app.js') }}"></script>

<!-- jQuery 3 -->
<script src="/js/admin/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/js/admin/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Morris.js charts -->
<script src="/js/admin/raphael.min.js"></script>
<script src="/js/admin/morris.min.js"></script>
<!-- Sparkline -->
<script src="/js/admin/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/js/admin/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/js/admin/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/js/admin/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/js/admin/moment.min.js"></script>
<script src="/js/admin/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/js/admin/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/js/admin/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/js/admin/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/js/admin/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/js/admin/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/js/admin/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/admin/demo.js"></script>

<script src="/js/sweetalert.js"></script>



<script>
    window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    ]) !!};
</script>

