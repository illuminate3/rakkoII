@extends($theme_layout)


{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::general.mail_layout', 2) }} :: @parent
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $theme . '/views/modules/yubin/pigeon/templates/yubin/assets/css/yubin.css') }}">
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')


<div class="row">
<div class="col-sm-12">


<p class="pull-right">
	<a href="/">
		<img src="{{ asset('themes/' . $theme . '/views/modules/yubin/pigeon/templates/yubin/assets/images/yubin.png') }}" class="img-responsive">
	</a>
</p>
<div class="clearfix"></div>


<div class="panel panel-default">
<div class="panel-heading">

	<h3 class="panel-title">
	{{ trans('kotoba::general.information') }}
	</h3>

</div>
<div class="panel-body">


DEMO !!


<dl class="dl-horizontal">
	<dt>
		{{ Lang::choice('kotoba::general.message', 1) }}
	</dt>
	<dd>
		{!! $canned !!}
	</dd>
</dl>


DEMO !!


</div><!-- ./ panel body -->


</div>
</div>


@stop
