<!DOCTYPE html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@section('seo')
	<meta name="keywords" content="{{ Setting::get('keywords', Config::get('core.keywords')) }}" />
	<meta name="description" content="{{ Setting::get('description', Config::get('core.description')) }}" />
	@show
	<meta name="author" content="{{ Setting::get('author', Config::get('core.author')) }}" />

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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

<!-- ------------------------------------------ CSS stylesheets ------------------------------------------ -->

	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/reset.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/font-awesome-4.4.0/css/font-awesome.css') }}">

<!--
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css') }}">
-->

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/illuminate3/css/standard.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/illuminate3/css/bootbasics.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/footer.css') }}">

<!-- ------------------------------------------ app loaded CSS stylesheets ------------------------------------------ -->
	@yield('styles')

<!-- ------------------------------------------ head loaded js ------------------------------------------ -->
	<script type="text/javascript" src="{{ asset('assets/vendors/jquery/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
{{--
	<script type="text/javascript" src="{{ asset('themes/' . $activeTheme . '/assets/js/modernizr.js') }}"></script>
--}}
</head>

<body class="Site">


<header class="Site-header cd-main-header">
	@include($activeTheme . '::' . '_partials._front.header')
</header>

<main class="Site-main cd-main-content">

	@if(Auth::user())
		@include($activeTheme . '::' . '_client.navigation')
		@include($activeTheme . '::' . '_client.breadcrumb')
		@include($activeTheme . '::' . '_client.search')
	@endif

	@include($activeTheme . '::' . '_partials._front.content')

</main>

<footer class="Site-footer">
	@include($activeTheme . '::' . '_partials._front.footer')
</footer>

	@include($activeTheme . '::' . '_partials._front._cd.cd_overlay')
	@include($activeTheme . '::' . '_partials._front._cd.cd_nav')
	@include($activeTheme . '::' . '_partials._front._cd.cd_search')

<!-- ------------------------------------------ js ------------------------------------------ -->

	<script type="text/javascript" src="{{ asset('assets/vendors/jquery/jquery-2.1.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-3.3.5-dist/js/bootstrap.min.js') }}"></script>

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

<!-- ------------------------------------------ google ananlytics js ------------------------------------------ -->
<script>
	{!! Setting::get('google_analytics') !!}
</script>
<!-- ------------------------------------------ google ananlytics js ------------------------------------------ -->

</body>
</html>
