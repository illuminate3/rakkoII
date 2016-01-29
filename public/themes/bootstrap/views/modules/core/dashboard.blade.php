@extends($theme_back)

{{-- Web site Title --}}
@section('title')
{{ trans('kotoba::general.dashboard') }} :: @parent
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/district/assets/css/admin.css') }}">
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')

<div class="row">
<h1>
	<p class="pull-right">
	<a href="/" class="btn btn-primary" title="{{ Lang::choice('kotoba::cms.site', 1) }}">
		<i class="fa fa-globe fa-fw"></i>
		{{ Lang::choice('kotoba::cms.site', 1) }}
	</a>
	</p>
	<i class="fa fa-dashboard fa-lg"></i>
		{{ trans('kotoba::cms.dashboard') }}
	<hr>
</h1>
</div>

<div class="row">

<div class="col-sm-6">
</div>
<div class="col-sm-6">
</div>



@if (Auth::user()->can('manage_ticket'))

	@include('ticket::_partials.dash')

@endif



@if (Auth::user()->can('manage_shisan'))

	@include('shisan::_partials.dash')

@endif



@if (Auth::user()->can('manage_himawari'))

	@include('himawari::_partials.dash')

@endif



@if (Auth::user()->can('manage_newsdesk'))

	@include('newsdesk::_partials.dash')

@endif



@if (Auth::user()->can('manage_kenshu'))

	@include('kenshu::_partials.dash')

@endif



</div>


@stop
