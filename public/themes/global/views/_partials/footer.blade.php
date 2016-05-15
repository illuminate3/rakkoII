<!--FOOTER-->
<div class="container-fluid footer">
<div class="row">


		<div class="padding-lg">
			<div class="copyright text-center">
				@if (Auth::user() && Auth::user()->can('manage_admin'))
					<a href="/admin">
					{{ trans('kotoba::general.administration') }}
					</a>
					&nbsp;&copy;&nbsp;2015-2016
				@else
					<a href="/">
					{{ Setting::get('description', Config::get('core.brand_title')) }}
					</a>
					&nbsp;&copy;&nbsp;2015-2016
				@endif
			</div>
		</div>


</div><!--./row-->
</div><!--./container-fluid-->
