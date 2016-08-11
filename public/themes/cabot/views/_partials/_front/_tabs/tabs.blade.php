<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active">
		<a href="#news" aria-controls="news" role="tab" data-toggle="tab">
			<i class="fa fa-news fa-fw"></i>
			{{ trans('kotoba::cms.news') }}
		</a>
	</li>
	<li role="presentation">
		<a href="#tweets" aria-controls="tweets" role="tab" data-toggle="tab">
			<i class="fa fa-twitter fa-fw"></i>
			{{ trans('kotoba::general.twitter') }}
		</a>
	</li>
	<li role="presentation">
		<a href="#grams" aria-controls="grams" role="tab" data-toggle="tab">
			<i class="fa fa-instagram fa-fw"></i>
			{{ trans('kotoba::general.instagram') }}
		</a>
	</li>
	<li role="presentation">
		<a href="#facebook" aria-controls="facebook" role="tab" data-toggle="tab">
			<i class="fa fa-facebook fa-fw"></i>
			{{ trans('kotoba::general.facebook') }}
		</a>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

	<div role="tabpanel" class="tab-pane active" id="news">
		@include($activeTheme . '::' . '_partials._front._tabs.news')
	</div>
	<div role="tabpanel" class="tab-pane" id="tweets">
		@include($activeTheme . '::' . '_partials._front._tabs.twitter')
	</div>
	<div role="tabpanel" class="tab-pane" id="grams">
		@include($activeTheme . '::' . '_partials._front._tabs.instagram')
	</div>
	<div role="tabpanel" class="tab-pane" id="facebook">
		@include($activeTheme . '::' . '_partials._front._tabs.facebook')
	</div>

</div>
<!-- Nav tabs -->
