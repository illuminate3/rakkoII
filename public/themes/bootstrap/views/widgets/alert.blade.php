<! -- Widget -->

@foreach ($articles as $article)

<div class="row margin-top-lg">
<div class="alert alert-danger alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<h2 class="margin-top-none">
		{{ $article->translate($lang)->title }}
	</h2>
	<p>
		{!! $article->translate($lang)->summary !!}
	</p>
</div>
</div>

@endforeach
