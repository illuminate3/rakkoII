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

	@if (Auth::user()->can('manage_ticket'))

	<h2>
		<i class="fa fa-ticket fa-lg"></i>
			{{ Lang::choice('kotoba::general.ticket', 2) }}
		<hr>
	</h2>

		<div class="row">
		<div class="col-sm-6">

			<div class="panel panel-info">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::general.ticket', 2) }}
				</h3>
				</div>
				<div class="panel-body">

					<dl class="dl-horizontal">
						<dt>
							{{ trans('kotoba::general.all') }}
						</dt>
						<dd>
							<a href="{{ URL::to('/admin/tickets') }}">
							{{-- $total_tickets --}}
							{!! Widget::AllTickets() !!}
							</a>
						</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>
							{{ trans('kotoba::general.active') }}
						</dt>
						<dd>
							<a href="{{ URL::to('/admin/tickets') }}">{{ $total_tickets_active }}</a>
						</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>
							{{ trans('kotoba::general.closed') }}
						</dt>
						<dd>
							<a href="{{ URL::to('/admin/tickets') }}">{{ $total_tickets_closed }}</a>
						</dd>
					</dl>

				</div>
			</div>

		</div>
		<div class="col-sm-6">
		</div>
		</div>

	@endif

	@if (Auth::user()->can('manage_shisan'))

	<h2>
		<i class="fa fa-keyboard-o fa-lg"></i>
		{{ Lang::choice('kotoba::shop.asset', 2) }}
		<hr>
	</h2>

		<div class="row">
		<div class="col-sm-6">

			<dl class="dl-horizontal">
				<dt>
					{{ trans('kotoba::general.all') }}
				</dt>
				<dd>
					<a href="{{ URL::to('/admin/asset') }}">
					{{-- $total_assets --}}
					{!! Widget::AllAssets() !!}
					</a>
				</dd>
			</dl>

		</div>
		<div class="col-sm-6">

			<dl class="dl-horizontal">
				<dt>
					{{ date("Y") }}&nbsp;{{ Lang::choice('kotoba::general.year', 1) }}
				</dt>
				<dd>
					<a href="{{ URL::to('/admin/asset') }}">{{ $total_assets_year }}</a>
				</dd>
			</dl>

		</div>
		</div>

	@endif

</div>
<div class="col-sm-6">

	@if (Auth::user()->can('manage_himawari'))

	<h2>
		<i class="fa fa-file fa-lg"></i>
		{{ Lang::choice('kotoba::cms.content', 2) }}
		<hr>
	</h2>

	<dl class="dl-horizontal">
		<dt>
			{{ trans('kotoba::general.all') }}
		</dt>
		<dd>
			<a href="{{ URL::to('/admin/contents') }}">{{ $total_contents }}</a>
		</dd>
	</dl>

	@endif

	@if (Auth::user()->can('manage_newsdesk'))

	<h2>
		<i class="fa fa-newspaper-o fa-lg"></i>
		{{ Lang::choice('kotoba::cms.article', 2) }}
		<hr>
	</h2>

	<dl class="dl-horizontal">
		<dt>
			{{ trans('kotoba::general.all') }}
		</dt>
		<dd>
			<a href="{{ URL::to('/admin/news') }}">{{ $total_articles }}</a>
		</dd>
	</dl>

	@endif

	@if (Auth::user()->can('manage_kenshu'))

	<h2>
		<i class="fa fa-lightbulb-o fa-lg"></i>
		{{ Lang::choice('kotoba::hr.seminar', 2) }}
		<hr>
	</h2>

	<dl class="dl-horizontal">
		<dt>
			{{ trans('kotoba::general.all') }}
		</dt>
		<dd>
			<a href="{{ URL::to('/admin/seminars') }}">
			{{-- $total_seminars --}}
			{!! Widget::AllSeminars() !!}
			</a>
		</dd>
	</dl>

	@endif

</div>
</div>



@stop
