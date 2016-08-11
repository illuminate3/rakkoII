<! -- Widget -->

@foreach ($alerts as $alert)

<div class="row margin-top-lg" style="z-index: 9999; !important">
<div class="alert alert-danger alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<h2 class="margin-top-none">
		{{ $alert->translate($lang)->title }}
	</h2>
	<p>
		{!! $alert->translate($lang)->summary !!}
	</p>
</div>
</div>

@endforeach
