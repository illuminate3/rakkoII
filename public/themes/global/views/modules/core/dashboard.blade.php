@extends($theme_back)

{{-- Web site Title --}}
@section('title')
{{ trans('kotoba::general.dashboard') }} :: @parent
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/admin.css') }}">
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

		<div class="row">
		<div class="col-sm-4">

			<div class="panel panel-primary">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.customer', 1) }} {{ Lang::choice('kotoba::shop.catalog', 1) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/customer_catalogs') }}">{{ $total_customer_catalog }}</a>
				</div>
			</div>

		</div>
		<div class="col-sm-4">

			<div class="panel panel-primary">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.production', 1) }} {{ Lang::choice('kotoba::shop.catalog', 1) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/production_catalogs') }}">{{ $total_production_catalog }}</a>
				</div>
			</div>

		</div>
		<div class="col-sm-4">

			<div class="panel panel-primary">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.vendor', 1) }} {{ Lang::choice('kotoba::shop.catalog', 1) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/vendor_catalogs') }}">{{ $total_vendor_catalog }}</a>
				</div>
			</div>

		</div>
		</div>

		<div class="row">
		<div class="col-sm-4">

			<div class="panel panel-success">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.customer', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/customers') }}">{{ $total_customers }}</a>
				</div>
			</div>

		</div>
		<div class="col-sm-4">

			<div class="panel panel-success">
				<div class="panel-heading">
				<h3 class="panel-title">
					Customer Items
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/pallets') }}">{{ $total_customer_items }}</a>
				</div>
			</div>

		</div>
		<div class="col-sm-4">

			<div class="panel panel-success">
				<div class="panel-heading">
				<h3 class="panel-title">
					Global Items
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/pallets') }}">{{ $total_global_items }}</a>
				</div>
			</div>

		</div>
		</div>

		<div class="row">
		<div class="col-sm-4">

			<div class="panel panel-info">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.zone', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/zones') }}">{{ $total_zones }}</a>
				</div>
			</div>

		</div>
		<div class="col-sm-4">

			<div class="panel panel-info">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.rack', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/racks') }}">{{ $total_racks }}</a>
				</div>
			</div>

		</div>
		<div class="col-sm-4">

			<div class="panel panel-info">
				<div class="panel-heading">
				<h3 class="panel-title">
							{{ Lang::choice('kotoba::shop.pallet', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/pallets') }}">{{ $total_pallets }}</a>
				</div>
			</div>

		</div>
		</div>

		<div class="row">
		<div class="col-sm-4">


		</div>
		<div class="col-sm-4">


		</div>
		<div class="col-sm-4">


		</div>
		</div>


	</div>
	<div class="col-sm-6">

		<div class="row">
		<div class="col-sm-12">

			<div class="panel panel-danger">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::general.alert', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/alerts') }}">{{ $total_alerts }}</a>
				</div>
			</div>

		</div>
		</div>

		<div class="row">
		<div class="col-sm-12">

			<div class="panel panel-danger">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.pick', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/picks') }}">{{ $total_picks }}</a>
				</div>
			</div>

		</div>
		</div>

		<div class="row">
		<div class="col-sm-12">

			<div class="panel panel-danger">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.move', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/moves') }}">{{ $total_moves }}</a>
				</div>
			</div>

		</div>
		</div>

	</div>
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
							<a href="{{ URL::to('/admin/tickets') }}">{{ $total_tickets }}</a>
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
					<a href="{{ URL::to('/admin/asset') }}">{{ $total_assets }}</a>
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
			<a href="{{ URL::to('/admin/seminars') }}">{{ $total_seminars }}</a>
		</dd>
	</dl>

	@endif

</div>
</div>



@stop
