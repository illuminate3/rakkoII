<!-- bread_crumb -->
<div class="row search-wrapper">
<div class="col-sm-8 col-sm-offset-2">


<ol class="breadcrumb-clean">

	<li>
		<a href="{!! url('/') !!}">
			<i class="fa fa-home fa-fw"></i>
			{!! trans('kotoba::general.home') !!}
		</a>
	</li>

	@yield('breadcrumb')

</ol>


</div>
</div> <!-- ./row -->
<!-- bread_crumb -->
