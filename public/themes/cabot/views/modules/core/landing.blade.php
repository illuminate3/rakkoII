@extends($theme_front)


{{-- Web site Title --}}
@section('title')
{{ trans('kotoba::helpdesk.tech_bar') }} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')


<div class="container-fluid padding-left-xl padding-right-xl">

<div class="row">
<h1>
	<p class="pull-right">
{{--
	<a href="/tech_support/create" class="btn btn-primary" title="{{ trans('kotoba::button.new') }}">
		<i class="fa fa-plus fa-fw"></i>
		{{ trans('kotoba::button.new') }}
	</a>
--}}
	</p>
	<i class="fa fa-magnet fa-lg"></i>
		{{ trans('kotoba::helpdesk.tech_bar') }}
	<hr>
</h1>
</div>


<div class="row padding-top-xl">
<div class="col-sm-6 col-sm-offset-3">
	<h2>
		<i class="fa fa-sign-in fa-lg"></i>
		Device Drop Off
		<hr>
	</h2>

	<div class="col-sm-12">
		<h2>
		<p>
			Please have your device asset tag ready.
		</p>
		<p>
			If you have your employee ID tag with you, please click on the "ID" button below. If not, please click on the "Email" button.
		</p>
		<hr>
		</h2>
	</div>

	<div class="row padding-top-xl">
		<div class="col-sm-12">
			<a href="/tech_support/id" class="btn btn-success btn-block btn-lg" title="{{ trans('kotoba::button.cancel') }}">
				<i class="fa fa-tag fa-fw"></i>
				{{ trans('kotoba::button.id') }}
			</a>
		</div>
	</div><!-- ./row -->

	<div class="row padding-top-xl">
		<div class="col-sm-12">
			<a href="/tech_support/email" class="btn btn-primary btn-block btn-lg" title="{{ trans('kotoba::button.cancel') }}">
				<i class="fa fa-envelope fa-fw"></i>
				{{ trans('kotoba::button.email') }}
			</a>
		</div>
	</div><!-- ./row -->
</div>
</div>


{{--
<div class="row padding-top-xl">
<div class="col-sm-6">

	<h2>
		<i class="fa fa-sign-in fa-lg"></i>
		Device Drop Off
		<hr>
	</h2>

	<div class="col-sm-12">
		<h2>
		<p>
			Please have your device asset tag ready.
		</p>
		<p>
			If you have your employee ID tag with you, please click on the "ID" button below. If not, please click on the "Email" button.
		</p>
		<hr>
		</h2>
	</div>

	<div class="row padding-top-xl">
		<div class="col-sm-12">
			<a href="/tech_support/id" class="btn btn-success btn-block btn-lg" title="{{ trans('kotoba::button.cancel') }}">
				<i class="fa fa-tag fa-fw"></i>
				{{ trans('kotoba::button.id') }}
			</a>
		</div>
	</div><!-- ./row -->

	<div class="row padding-top-xl">
		<div class="col-sm-12">
			<a href="/tech_support/email" class="btn btn-primary btn-block btn-lg" title="{{ trans('kotoba::button.cancel') }}">
				<i class="fa fa-envelope fa-fw"></i>
				{{ trans('kotoba::button.email') }}
			</a>
		</div>
	</div><!-- ./row -->

</div>
<div class="col-sm-6">

	<h2>
		<i class="fa fa-shopping-cart fa-lg"></i>
		Device Pick Up
		<hr>
	</h2>

	<div class="col-sm-12">
		<h2>
		<p>
			Please have your device asset tag ready.
		</p>
		<p>
			If you have your employee ID tag with you, please click on the "ID" button below. If not, please click on the "Email" button.
		</p>
		<hr>
		</h2>
	</div>

	<div class="row padding-top-xl">
		<div class="col-sm-12">
			<a href="/tech_support/id" class="btn btn-success btn-block btn-lg" title="{{ trans('kotoba::button.cancel') }}">
				<i class="fa fa-tag fa-fw"></i>
				{{ trans('kotoba::button.id') }}
			</a>
		</div>
	</div><!-- ./row -->

	<div class="row padding-top-xl">
		<div class="col-sm-12">
			<a href="/tech_support/email" class="btn btn-primary btn-block btn-lg" title="{{ trans('kotoba::button.cancel') }}">
				<i class="fa fa-envelope fa-fw"></i>
				{{ trans('kotoba::button.email') }}
			</a>
		</div>
	</div><!-- ./row -->

</div>
</div><!-- ./row -->
--}}

</div><!-- ./container -->


@stop
