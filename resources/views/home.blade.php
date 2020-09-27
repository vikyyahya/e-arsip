<!-- <!DOCTYPE html> -->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">



  <title>E-Arsip</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">



  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset ('lte3/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset ('lte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('lte3/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div id="app" class="wrapper">
    <!-- Navbar -->
    @include('header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('sidebar')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('footer')
    <!-- custom js -->
    @stack('customjs')

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{asset ('lte3/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset ('lte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset ('lte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset ('lte3/dist/js/adminlte.js')}}"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="{{asset ('lte3/dist/js/demo.js')}}"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{asset ('lte3/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
  <script src="{{asset ('lte3/plugins/raphael/raphael.min.js')}}"></script>
  <script src="{{asset ('lte3/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
  <script src="{{asset ('lte3/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
  <script src="{{asset ('lte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

  <!-- ChartJS -->
  <script src="{{asset ('lte3/plugins/chart.js/Chart.min.js')}}"></script>

  <!-- PAGE SCRIPTS -->
  <script src="{{asset ('lte3/dist/js/pages/dashboard.js')}}"></script>
  <script src="{{asset ('lte3/dist/js/pages/dashboard2.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      bsCustomFileInput.init();

      function upload() {
        console.log("Handler for .click() called.");
        $("#img_profile").click(function() {
          alert("Hello");
        });

      }
    });
  </script>
  <script>
    $("#img_profile").on('click', function() {
      console.log("Handler for .click() called.");

    });

    function upload() {
      console.log("Handler for .click() called.");
      $("#img_profile").click(function() {
        alert("Hello");
      });

    }
  </script>
</body>

</html>