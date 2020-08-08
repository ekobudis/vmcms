<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ env('APP_NAME') }} | Log in</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="stylesheet" href="{{ asset('comfort/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('comfort/css/animations.css') }}">
	<link rel="stylesheet" href="{{ asset('comfort/css/fonts.css') }}">
	<link rel="stylesheet" href="{{ asset('comfort/css/main.css') }}" class="color-switcher-link">
	<link rel="stylesheet" href="{{ asset('comfort/css/dashboard.css') }}" class="color-switcher-link">
	<script src="{{ asset('comfort/js/modernizr-2.6.2.min.js') }}"></script>
</head>
<body class="admin">
  <div class="preloader">
		<div class="preloader_image"></div>
  </div>
  <!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

      <!-- template sections -->
      @yield('content')
		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->

  <!-- template init -->
	<script src="{{ asset('comfort/js/compressed.js') }}"></script>
	<script src="{{ asset('comfort/js/main.js') }}"></script>

	<!-- dashboard libs -->

	<!-- events calendar -->
	<script src="{{ asset('comfort/js/moment.min.js') }}"></script>
	<script src="{{ asset('comfort/js/fullcalendar.min.js') }}"></script>
	<!-- range picker -->
	<script src="{{ asset('comfort/js/daterangepicker.js') }}"></script>

	<!-- charts -->
	<script src="{{ asset('comfort/js/Chart.bundle.min.js') }}"></script>
	<!-- vector map -->
	<script src="{{ asset('comfort/js/jquery-jvectormap-2.0.3.min.js') }}"></script>
	<script src="{{ asset('comfort/js/jquery-jvectormap-world-mill.js') }}"></script>
	<!-- small charts -->
	<script src="{{ asset('comfort/js/jquery.sparkline.min.js') }}"></script>

	<!-- dashboard init -->
	<script src="{{ asset('comfort/js/admin.js') }}"></script>
</body>
</html>