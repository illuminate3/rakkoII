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
		<div class="img-align padding-left-xl padding-right-xl">
			<a href="/">
{{-- $activeTheme --}}

				<img class="logo" src="{{ asset('themes/' . $activeTheme . '/assets/img/logo.png') }}"></img>
			</a>
		</div>
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
