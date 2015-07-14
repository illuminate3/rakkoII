@include('flash::message')

@if (count($errors) > 0)
	@include($activeTheme . '::' . '_partials.errors')
@endif

@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif

@yield('content')

{{-- var_dump($errors) --}}


{{ trans('kotoba::general.home') }}

