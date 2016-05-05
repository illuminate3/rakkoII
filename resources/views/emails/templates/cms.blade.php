@extends($theme_layout)

@section('content')


<table class="container text-center">
<tbody>
<tr>
<td>


	<table class="row">
	<tbody>
	<tr>
	<th class="small-10 large--10 columns">
	</th>
	<th class="small-2 large-2 columns">
		<img src="{{ $message->embed( public_path('assets/images/vendors/kenshu/kenshu.png') ) }}">
	</th>
	</tr>
	</tbody>
	</table>

	<table class="row">
	<tbody>
	<tr>
	<th class="small-12 large-12 columns first last">
		<table>
		<tr>
		<th>

		<center data-parsed="">
			<img src="{{ $message->embed( public_path('assets/images/vendors/kenshu/openbook.png') ) }}">
		</center>

		<hr>

		<p class="">
			{!! $canned !!}
		</p>

		<hr>

		<table class="button large expand">
		<tr>
		<td>
			<table>
			<tr>
			<td>
				<center data-parsed="">
					<a href="{{ env('APP_URL') }}/kiosk/{{ $seminar_id }}" align="center" class="text-center">
						{{ Lang::choice('kotoba::hr.seminar', 1) }}
					</a>
				</center>
			</td>
			</tr>
			</table>
		</td>
		<td class="expander"></td>
		</tr>
		</table>

		</th>
		<th class="expander"></th>
		</tr>
		</table>

	</th>
	</tr>
	</tbody>
	</table>


</td>
</tr>
</tbody>
</table>


@stop
