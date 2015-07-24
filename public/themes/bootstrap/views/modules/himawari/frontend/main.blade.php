<!DOCTYPE html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	@section('meta')
		<meta name="title" content="{{ $page->meta_title }}" />
		<meta name="keywords" content="{{ $page->meta_keywords }}" />
		<meta name="description" content="{{ $page->meta_description }}" />
	@show


	<title>
		@section('title')
			{{ Config::get('general.title') }}
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

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-3.3.2/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/font-awesome-4.3.0/css/font-awesome.css') }}">

<!--
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-3.3.2/css/bootstrap-theme.min.css') }}">
-->

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/illuminate3/css/standard.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/SlidePushMenus.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/navgoco/jquery.navgoco.css') }}" media="screen" />

<!-- ------------------------------------------ app loaded CSS stylesheets ------------------------------------------ -->
	@yield('styles')

<!-- ------------------------------------------ head loaded js ------------------------------------------ -->
	<script type="text/javascript" src="{{ asset('assets/vendors/jquery/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
</head>

<body>


	@include('himawari::frontend._partials.navigation')

	<div class="container-fluid">
<!-- <div id="wrap" class="container"> -->
		@include('himawari::frontend._partials.content')
	</div><!-- ./container -->

	@include('himawari::frontend._partials.footer')


<!-- ------------------------------------------ js ------------------------------------------ -->

	<script type="text/javascript" src="{{ asset('assets/vendors/jquery/jquery-2.1.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-3.3.2/js/bootstrap.min.js') }}"></script>

<!--
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
-->


<!-- ------------------------------------------ app loaded js ------------------------------------------ -->
	@yield('scripts')

<!-- ------------------------------------------ template loaded js ------------------------------------------ -->
	<script type="text/javascript">
		@yield('inline-scripts')
	</script>

</body>
</html>
