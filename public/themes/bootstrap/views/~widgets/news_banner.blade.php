<! -- Widget -->

<!-- Carousel -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">

<!-- Buttons -->
{!!
	Widget::AccessPoints()
!!}


<!-- Indicators -->
<ol class="carousel-indicators">
	@for ($i = 0; $i < $count; $i++)
		<li data-target="#myCarousel" data-slide-to="{{ $i }}" class="@if ($i == 0)active @endif""></li>
	@endfor
</ol>


<div class="carousel-inner" role="listbox">

	{{--*/ $i=0 /*--}}
	@foreach ($articles as $article)
		<div class="item @if ($i == 0)active @endif">
		@foreach($article->images as $image)
			<a href="/news/{{ $article->slug }}">
				<img src="{{ $image->image->url('landscape') }}" class="" alt="{{ $article->slug }}">
			</a>
		@endforeach
			<div class="carousel-caption">
				<a class="top-link" href="/news/{{ $article->slug }}">{{ $article->translate($lang)->title }}</a>
{{--
				<h1>
					{{ $article->translate($lang)->title }}
				</h1>
				<p>
					{!! $article->translate($lang)->summary !!}
				</p>
				<p>
					<a class="btn btn-primary" href="/news/{{ $article->slug }}">{{ trans('kotoba::cms.more') }}</a>
				</p>
--}}
			</div>
		</div>

	{{--*/ $i++ /*--}}
	@endforeach


</div><!-- ./carousel-inner -->
</div><!-- /#myCarousel -->
