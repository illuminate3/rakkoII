<!DOCTYPE html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<meta name="author" content="{{ Setting::get('author', Config::get('core.author')) }}" />
	<meta name="keywords" content="{{ Setting::get('keywords', Config::get('core.keywords')) }}" />
	<meta name="description" content="{{ Setting::get('description', Config::get('core.description')) }}" />

	<title>
		@section('title')
			{{ Setting::get('title', Config::get('core.title')) }}
		@show
	</title>

	<link rel="shortcut icon" href="{{ asset('ico/favicon.png') }}">
	<link rel="icon" href="{{ asset('favicon.ico') }}">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('ico/apple-touch-icon-57-precomposed.png') }}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('ico/apple-touch-icon-72-precomposed.png') }}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('ico/apple-touch-icon-144-precomposed.png') }}">

<!-- ------------------------------------------ Google Fonts ------------------------------------------ -->
<!--
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
-->

<!-- ------------------------------------------ CSS stylesheets ------------------------------------------ -->

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/font-awesome-4.4.0/css/font-awesome.css') }}">

<!--
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css') }}">
-->

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/illuminate3/css/standard.css') }}">
<!--
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/admin.css') }}">
-->
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/style.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/admin_lte/dist/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/admin_lte/dist/css/skins/_all-skins.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/admin_lte/dist/css/skins/skin-black.css') }}">

<!-- ------------------------------------------ app loaded CSS stylesheets ------------------------------------------ -->
	@yield('styles')

<!-- ------------------------------------------ head loaded js ------------------------------------------ -->
	<script type="text/javascript" src="{{ asset('assets/vendors/jquery/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>

</head>

<!--
<body class="hold-transition skin-black sidebar-collapse sidebar-mini">
-->
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">


	@include($activeTheme . '::' . '_admin_lte.navigation')

	@include($activeTheme . '::' . '_admin_lte.sidebar')

	<div class="content-wrapper padding-left-lg padding-right-md">
{{--
		@include($activeTheme . '::' . '_admin_lte.tabs')
--}}
<section class="content-header">
	@yield('PageHeader')
	@yield('breadcrumbs')
</section>

		@include($activeTheme . '::' . '_admin_lte.content')
	</div><!-- /.content-wrapper -->

	@include($activeTheme . '::' . '_admin_lte.footer')

	@include($activeTheme . '::' . '_admin_lte.control_sidebar')
	<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- ------------------------------------------ js ------------------------------------------ -->

	<script type="text/javascript" src="{{ asset('assets/vendors/jquery/jquery-2.1.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js') }}"></script>

<!--
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
-->
	<script type="text/javascript" src="{{ asset('themes/' . $activeTheme . '/assets/admin_lte/dist/js/app.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('themes/' . $activeTheme . '/assets/admin_lte/plugins/fastclick.min.js') }}"></script>


<!-- ------------------------------------------ app loaded js ------------------------------------------ -->
	@yield('scripts')

<!-- ------------------------------------------ template loaded js ------------------------------------------ -->
	<script type="text/javascript">
	var AdminLTEOptions = {
//Enable sidebar expand on hover effect for sidebar mini
//This option is forced to true if both the fixed layout and sidebar mini
//are used together
//	sidebarExpandOnHover: true,
//	BoxRefresh Plugin
	enableBoxRefresh: true,
//	Bootstrap.js tooltip
//	enableBSToppltip: true
//'fast', 'normal', or 'slow'
	animationSpeed: 'fast',
	};

		@yield('inline-scripts')
	</script>

</body>
</html>
