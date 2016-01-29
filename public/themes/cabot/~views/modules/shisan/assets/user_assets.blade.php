@extends($theme_back)


{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::shop.asset', 2) }} :: @parent
@stop

@section('styles')
	<link href="{{ asset('assets/vendors/DataTables-1.10.7/plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('scripts')
	<script src="{{ asset('assets/vendors/DataTables-1.10.7/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/DataTables-1.10.7/plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
@stop


@section('inline-scripts')
$(document).ready(function() {
oTable =
	$('#table').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "{{ URL::to('/api/user_assets') }}",
		"columns": [
{data: 'first_name', name: 'first_name', orderable: false, searchable: true, visible: false},
{data: 'make', name: 'make', orderable: false, searchable: true, visible: false},
{data: 'model', name: 'model', orderable: false, searchable: true, visible: false},
			{
				data: 'id',
				name: 'id',
				orderable: true,
				searchable: false,
				visible: false
			},
			{
				data: function(d){
					return d.make + ' : ' + d.model + ' : ' + d.model_number;
				},
				name: 'model_number',
				orderable: true,
				searchable: true
			},
			{
				data: function(d){
					return d.last_name + ', ' + d.first_name;
				},
				name: 'last_name',
				orderable: true,
				searchable: true
			},
			{
				data: 'site_name',
				name: 'sites.name',
				orderable: true,
				searchable: true
			},
			{
				data: 'room_name',
				name: 'rooms.name',
				orderable: true,
				searchable: true
			},
			{
				data: 'asset_tag',
				name: 'asset_tag',
				orderable: true,
				searchable: true
			},
			{
				data: 'serial',
				name: 'serial',
				orderable: true,
				searchable: true
			},
			{
				data: 'po',
				name: 'po',
				orderable: true,
				searchable: true
			},
			{
				data: 'actions',
				name: 'actions',
				orderable: false,
				searchable: false
			}
		]
	});
});
@stop


{{-- Content --}}
@section('content')

<div class="row">
<h1>
	<p class="pull-right">
	</p>
	<i class="fa fa-angle-double-right fa-lg"></i>
		{{ Lang::choice('kotoba::shop.asset', 2) }}
	<hr>
</h1>
</div>


<div class="row">
<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th>{{ trans('kotoba::table.id') }}</th>
			<th>{{ Lang::choice('kotoba::table.item', 1) }}</th>
			<th>{{ Lang::choice('kotoba::table.user', 1) }}</th>
			<th>{{ trans('kotoba::table.site') }}</th>
			<th>{{ Lang::choice('kotoba::table.room', 1) }}</th>
			<th>{{ trans('kotoba::table.asset_tag') }}</th>
			<th>{{ trans('kotoba::table.serial') }}</th>
			<th>{{ trans('kotoba::table.po') }}</th>

			<th>{{ Lang::choice('kotoba::table.action', 2) }}</th>
		</tr>
	</thead>
	<tbody></tbody>
</table>
</div>


@stop
