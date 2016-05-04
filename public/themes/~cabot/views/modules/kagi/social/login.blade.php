@extends($theme_simple)

@section('content')



<div id="flex-container">
<div id="flex-item">

	<a href="/">
		<img src="{{ asset('themes/' . $activeTheme . '/assets/img/logo.png') }}">
	</a>

	<div class="margin-top-lg">
		<a href="/social/login" class="btn btn-primary btn-block">{{ trans('kotoba::button.log_in') }}</a>
	</div>


</div>
</div>



@endsection
