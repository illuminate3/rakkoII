<! -- Widget -->


<div class="row">
	<h2>
		{{ trans('kotoba::general.recent') }}&nbsp;{{ Lang::choice('kotoba::general.tweet', 1) }}
	</h2>
	<hr>
</div>


{{--
<script type="text/javascript" src="{{ asset('assets/js/jquery.timeago.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("span.timeago").timeago();
	jQuery("span.tintent").hide();
	jQuery(".twitter-block").hover(
		function() { $(this).children("span.tintent").fadeIn('fast'); },
		function() { $(this).children("span.tintent").fadeOut('fast'); }
	);
});
</script>
--}}


<div class="row margin-top-md">
<div class="twitter">
@if(!empty($tweets))
	@foreach ( $tweets as $tweet )
<div class="media">
	<div class="media-left">
		<img src="{!! $tweet->user->profile_image_url !!}" class="media-object" alt="{{ $screen_name }}">
	</div>
	<div class="media-body">

		<div class="twitter-block">

			{!! $tweet->user->name !!}&nbsp;({!! Twitter::linkify('@'.$tweet->user->screen_name) !!})

			<span class="timeago" title="{!! $tweet->created_at !!}">
				{!! date('H:i, M d', strtotime($tweet->created_at)) !!}
			</span>

			<p>
			{!! Twitter::linkify($tweet->text) !!}
			</p>

			<hr>

			<p>
				<a href="https://twitter.com/intent/user?screen_name={{ $screen_name }}" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-twitter fa-fw" aria-hidden="true"></i>{{ trans('kotoba::button.follow') }}</a>
{{--
				<a href="https://twitter.com/intent/tweet?in_reply_to={!! $tweet->id !!}" class="btn btn-default"><i class="fa fa-reply" aria-hidden="true"></i></a>
--}}
				<a href="https://twitter.com/intent/retweet?tweet_id={!! $tweet->id !!}" class="btn btn-default"><i class="fa fa-retweet" aria-hidden="true"></i></a>
				<a href="https://twitter.com/intent/favorite?tweet_id={!! $tweet->id !!}" class="btn btn-default"><i class="fa fa-heart" aria-hidden="true"></i></a>
			</p>

		</div>
	</div>
</div>
	@endforeach
@else
	<p>We are having a problem with our Twitter Feed right now.</p>
@endif
</div>

<br>
<br>

</div><!-- ./row -->
