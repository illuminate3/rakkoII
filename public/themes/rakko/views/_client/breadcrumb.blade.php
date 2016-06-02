<!-- bottom_content -->
<div class="row search-wrapper" id="search">

<div class="col-sm-8 col-sm-offset-2">

<ol class="breadcrumb-clean">

{{--
	<li class="">{!! trans('kotoba::helpdesk.you_are_here') !!}: </li>
--}}
	<li>
		<a href="{!! URL::route('/') !!}">
			<i class="fa fa-home fa-fw"></i>
			{!! trans('kotoba::helpdesk.home') !!}
		</a>
	</li>
	@yield('breadcrumb')
</ol>

</div>


</div> <!-- ./row -->
<!-- bottom_content -->
