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

			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.receivable', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/receiving') }}">{{ $total_receivables }}</a>
				</div>
			</div>

		</div>
		<div class="col-sm-4">

			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ Lang::choice('kotoba::shop.shippable', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/shipping') }}">{{ $total_shippables }}</a>
				</div>
			</div>

		</div>
		<div class="col-sm-4">

			<div class="panel panel-default">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ trans('kotoba::shop.production') }}&nbsp;{{ Lang::choice('kotoba::shop.item', 2) }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/production') }}">{{ $total_production }}</a>
				</div>
			</div>

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

		<div class="row">
		<div class="col-sm-12">

			<div class="panel panel-danger">
				<div class="panel-heading">
				<h3 class="panel-title">
					{{ trans('kotoba::shop.production') }}
				</h3>
				</div>
				<div class="panel-body">
					<a href="{{ URL::to('/admin/makes') }}">{{ $total_makes }}</a>
				</div>
			</div>

		</div>
		</div>

	</div>
</div>



@stop
