@include('flash::message')

@if (count($errors) > 0)
	@include($activeTheme . '::' . '_partials.errors')
@endif

@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif


<!-- Buttons -->
{!!
	Widget::alert()
!!}


@yield('content')
