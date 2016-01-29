@extends($theme_front)

{{-- Web site Title --}}
@section('title')
{{ Config::get('core.title') }} :: @parent
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')


<div id="flex-container" class="margin-xl padding-xl">
<div id="flex-item">

	<a href="/">
		<img src="{{ asset('themes/' . $activeTheme . '/assets/img/logo.png') }}">
	</a>

@if ( Auth::user() != null) {
	<div class="margin-top-lg">
		<a href="/admin" class="btn btn-success btn-block">{{ trans('kotoba::general.dashboard') }}</a>
	</div>
@else
	<div class="margin-top-lg">
		<a href="/auth/login" class="btn btn-success btn-block">{{ trans('kotoba::button.log_in') }}</a>
	</div>
@endif

</div>
</div>


<hr>


<div class="row">
	<div class="col-sm-4">
		{!!
			Widget::MenuDistrict()
		!!}
	</div>
	<div class="col-sm-4">
		<h1 class="text-center">Cabot Public Schools</h1>
		<h3 class="text-center subheading">It's about KIDS</h3>
	</div>
	<div class="col-sm-4">
		{!!
			Widget::TopNews()
		!!}
	</div>
</div>


@stop
