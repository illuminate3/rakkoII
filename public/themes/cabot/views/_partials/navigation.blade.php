<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
<div class="container-fluid">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		@if (Auth::user() && Auth::user()->can('manage_admin'))
			<a class="navbar-brand" href="/admin">{{ Setting::get('title', Config::get('core.title')) }}</a>
		@else
			<a class="navbar-brand" href="/">{{ Setting::get('title', Config::get('core.title')) }}</a>
		@endif
	</div>

	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-right">

{!!
	Widget::NavLinks()
!!}
{!!
	Widget::AccessNavPoints()
!!}
{{--
	Widget::AccessPoints()
--}}

		</ul>
	</div><!--/.nav-collapse -->

</div>
</nav>
