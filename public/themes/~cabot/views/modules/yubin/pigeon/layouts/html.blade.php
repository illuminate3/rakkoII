<!DOCTYPE html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="author" content="{{ Setting::get('author', Config::get('core.author')) }}" />
	<meta name="keywords" content="{{ Setting::get('keywords', Config::get('core.keywords')) }}" />
	<meta name="description" content="{{ Setting::get('description', Config::get('core.description')) }}" />

	<title>
		@section('title')
			{{ Setting::get('title', Config::get('core.title')) }}
		@show
	</title>

<!-- ------------------------------------------ Google Fonts ------------------------------------------ -->
<!--
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
-->

<!-- ------------------------------------------ app loaded CSS stylesheets ------------------------------------------ -->
	@yield('styles')

<!-- ------------------------------------------ head loaded js ------------------------------------------ -->

</head>

<body>


<div id="flex-container">
<div id="flex-item">

@yield('content')


</div>
</div>


</div>
</div>


<!-- ------------------------------------------ app loaded js ------------------------------------------ -->
	@yield('scripts')

<!-- ------------------------------------------ template loaded js ------------------------------------------ -->
	<script type="text/javascript">
		@yield('inline-scripts')
	</script>

</body>
</html>
