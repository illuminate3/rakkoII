<! -- Widget -->


<div class="row">
	<h1>
		{{ trans('kotoba::cms.news') }}
	</h1>
</div>


@foreach ($articles as $article)


<div class="row margin-top-md">

<div class="media">
	<div class="media-left">
		@foreach($article->images as $image)
			<a href="/news/{{ $article->slug }}">
				<img src="{{ $image->image->url('news') }}" class="media-object" alt="{{ $article->slug }}">
			</a>
		@endforeach
	</div>
	<div class="media-body">
		<h3 class="media-heading">
			{{ $article->translate($lang)->title }}
		</h3>
		<p>
			{!! $article->translate($lang)->summary !!}
		</p>
		<p class="margin-top-lg">
			<a class="btn btn-primary" href="/news/{{ $article->slug }}">{{ trans('kotoba::cms.more') }}</a>
		</p>
	</div>
</div>


@endforeach
