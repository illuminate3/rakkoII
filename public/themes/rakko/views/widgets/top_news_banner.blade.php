<! -- Widget -->

<!-- news_content -->
<div class="row row-color">

	<h1 class="text-center">
		{{ trans('kotoba::cms.news') }}
	</h1>

	<p class="subheading text-center">
		Get the latest information from the school district.
	</p>

	<div class="container margin-top-xl">

@foreach ($articles as $article)

		<div class="col-md-6">

			@foreach($article->images as $image)
				<a href="/news/{{ $article->slug }}">
					<img src="{{ $image->image->url('landscape') }}" class="media-object" alt="{{ $article->slug }}">
				</a>
			@endforeach

			<br>

			<h2>
				{{ $article->translate($lang)->title }}
			</h2>

			<p>
				{!! $article->translate($lang)->summary !!}
			</p>

			<br>

			<p>
				<a class="btn btn-primary" href="/news/{{ $article->slug }}" role="button">
					{{ trans('kotoba::cms.more') }}
				</a>
			</p>

		</div><!-- ./col-6 -->

@endforeach

	</div><!-- ./container -->
</div><!-- ./row -->

<!-- news_content -->
