<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
<div class="container-fluid">

<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
		@if (Auth::user() && Auth::user()->can('manage_admin'))
			<a class="navbar-brand" href="/admin">
			{{ trans('kotoba::general.administration') }}
			</a>
		@else
			<a class="navbar-brand" href="/">
			{{ Setting::get('brand_title', Config::get('core.brand_title')) }}
			</a>
		@endif
</div>

	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-right">

{{-- Widget::NavLinks() --}}
{{-- $menu_example->asUl() --}}
@include('partials.nav_menu', ['items'=> $menu_navLinks->roots()])

		</ul>
	</div><!--/.nav-collapse -->

</div>
</nav>
