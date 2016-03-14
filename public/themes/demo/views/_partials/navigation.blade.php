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
			<a class="navbar-brand" href="/admin">Rakko :: Admin</a>
		@else
			<a class="navbar-brand" href="/">Rakko :: Information Management System</a>
		@endif
</div>

	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-right">

{{-- Widget::NavLinks() --}}
{{-- $menu_example->asUl() --}}
@include('partials.menu', ['items'=> $menu_example->roots()])
		</ul>
	</div><!--/.nav-collapse -->

</div>
</nav>
