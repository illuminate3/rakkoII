<! -- Widget -->


<div class="row">
	<h1>
		{{ trans('kotoba::cms.news') }}
	</h1>
</div>


@foreach ($articles as $article)
<div class="row">

	<div class="col-sm-3">
		<img class="img-responsive margin-top-sm" src="{{ asset('images/news/' . $article->image) }}" alt="{{ $article->slug }}">
	</div>

	<div class="col-sm-9">
		<h2 class="margin-top-none">
			{{ $article->translate($lang)->title }}
		</h2>
		<p>
			{!! $article->translate($lang)->summary !!}
		</p>
		<a class="btn btn-primary" href="/news/{{ $article->slug }}">{{ trans('kotoba::cms.more') }}</a>
	</div>

</div>

<br>
<br>

@endforeach
