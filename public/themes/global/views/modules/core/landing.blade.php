@extends($theme_simple)

{{-- Web site Title --}}
@section('title')
{{ Config::get('core.title') }} :: @parent
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/global/assets/css/global.css') }}">
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')



<div id="flex-container">
<div id="flex-item">


<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">
{{ Setting::get('brand_title') }}
</h3>
</div>
<div class="panel-body padding-lg">

	<form class="form-horizontal" role="form" method="POST" action="/auth/login">
		{!! csrf_field() !!}

		<div class="form-group">
			<label class="col-md-3 control-label">{{ trans('kotoba::account.email') }}</label>
			<div class="col-md-9">
				<input type="email" class="form-control" name="email" value="{{ old('email') }}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label">{{ trans('kotoba::auth.password') }}</label>
			<div class="col-md-9">
				<input type="password" class="form-control" name="password">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<div class="col-md-9">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember"> {{ trans('kotoba::auth.remember_me') }}
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<div class="col-md-9">
				<button type="submit" class="btn btn-success btn-block">
					{{ trans('kotoba::button.log_in') }}
				</button>
			</div>
		</div>

	</form>

</div>
</div>


@stop
