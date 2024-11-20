<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OrnaTrack Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/assets/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets/css/vertical-light-layout/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">




    @yield('css')
  </head>
  <body>
    <div class="container-scroller">

      @include('admin.inc.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.inc.side_bar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
          <!-- content-wrapper ends -->
          @include('admin.inc.footer')
        </div>
        <!-- main-panel ends -->
      </div>
      @yield('modal')
      <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/assets/vendors/moment/moment.min.js"></script>
    <script src="/assets/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="/assets/vendors/chartist/chartist.min.js"></script>
    <script src="/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/assets/js/jquery.cookie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>



    <script>
        function updateDateTime() {
            const now = new Date();

            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const dateOptions = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };

            const time = now.toLocaleTimeString('en-US', timeOptions);
            const date = now.toLocaleDateString('en-US', dateOptions);

            document.getElementById('timeDisplay').textContent = time;
            document.getElementById('dateDisplay').textContent = date;
        }

        // Update the date and time every second
        setInterval(updateDateTime, 1000);

        // Initial call to display immediately
        updateDateTime();
    </script>

    @yield('script')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>
