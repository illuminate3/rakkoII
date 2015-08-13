<! -- Widget -->

<!-- Carousel -->


<div id="myCarousel" class="carousel slide" data-ride="carousel">

<!-- Buttons -->
{{--
	Widget::AccessPoints()
--}}


<!-- Indicators -->
<ol class="carousel-indicators">
	@for ($i = 0; $i < $count; $i++)
		<li data-target="#myCarousel" data-slide-to="{{ $i }}"></li>
	@endfor
</ol>


<div class="carousel-inner" role="listbox">

	@foreach ($articles as $article)

		<div class="item">
			<a href="/news/{{ $article->slug }}"><img class="third-slide img-responsive" src="{{ asset('images/news/' . $article->image) }}" alt="{{ $article->slug }}"></a>
		</div>

	@endforeach


<div class="item active">
	<a href="/news/{{ $article->slug }}"><img class="third-slide img-responsive" src="{{ asset('images/news/' . $article->image) }}" alt="{{ $article->slug }}"></a>
	<div class="container">
		<div class="carousel-caption">
			<h1>
				{{ $article->translate($lang)->title }}
			</h1>
			<p>
				{!! $article->translate($lang)->summary !!}
			</p>
			<p>
				<a class="btn btn-primary" href="/news/{{ $article->slug }}">{{ trans('kotoba::cms.more') }}</a>
			</p>
		</div>
	</div>
</div>


</div><!-- ./carousel-inner -->
</div><!-- /#myCarousel -->
