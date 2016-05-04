@include('flash::message')

@if (count($errors) > 0)
<div class="row margin-top-lg">
	@include($activeTheme . '::' . '_partials.errors')
</div>
@endif

@if (session('status'))
<div class="row margin-top-lg">
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
</div>
@endif


<!-- Buttons -->
{!!
	Widget::alert()
!!}

@yield('content')
