<! -- Widget -->


<div class="row">
	<h2>
		{{ trans('kotoba::general.recent') }}&nbsp;{{ Lang::choice('kotoba::general.post', 2) }}
	</h2>
	<hr>
</div>


<?php $instagram = json_decode($instagrams); ?>


<div class="row margin-top-md">
@foreach ($instagram as $gram)


<div class="media">
	<div class="media-left">
		<img class="work-thumbnail" src="{{ $gram->images->thumbnail->url }}" />
	</div>
	<div class="media-body">
		<p>
			{{ $gram->caption->text }}
		</p>
{{--
		<p class="margin-top-lg">
			<a class="btn btn-primary" href="/news/{{ $article->slug }}">{{ trans('kotoba::cms.more') }}</a>
		</p>
--}}
	</div>
</div>

<br>
<br>


@endforeach
</div><!-- ./row -->
