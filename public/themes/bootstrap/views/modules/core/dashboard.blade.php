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
	<a href="/" class="btn btn-primary" title="{{ trans('kotoba::cms.site') }}">
		<i class="fa fa-globe fa-fw"></i>
		{{ trans('kotoba::cms.site') }}
	</a>
	</p>
	<i class="fa fa-dashboard fa-lg"></i>
		{{ trans('kotoba::cms.dashboard') }}
	<hr>
</h1>
</div>


<div class="row">
<div class="col-sm-4">

	{!!
		Widget::MenuSchools()
	!!}

</div>
<div class="col-sm-4">

	{!!
		Widget::MenuDistrict()
	!!}


</div>
<div class="col-sm-4">

</div>
</div>


@stop
