<! -- Widget -->


<div class="row">
	<h2>
		{{ trans('kotoba::cms.news') }}
	</h2>
	<hr>
</div>


<div class="row margin-top-md">
@foreach ($articles as $article)

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

{{--
<div class="row">

	<div class="col-sm-4">
		@foreach($article->images as $image)
			<a href="/news/{{ $article->slug }}">
				<img src="{{ $image->image->url('news') }}" class="img-responsive" alt="{{ $article->slug }}">
			</a>
		@endforeach
	</div>

	<div class="col-sm-8">
		<h2 class="margin-top-none">
			{{ $article->translate($lang)->title }}
		</h2>
		<p>
			{!! $article->translate($lang)->summary !!}
		</p>
			<a class="btn btn-primary" href="/news/{{ $article->slug }}">{{ trans('kotoba::cms.more') }}</a>
	</div>

</div>
--}}

<br>
<br>

@endforeach
</div>
