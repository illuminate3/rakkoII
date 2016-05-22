<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">News</a></li>
	<li role="presentation"><a href="#tweets" aria-controls="tweets" role="tab" data-toggle="tab">Tweets</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

	<div role="tabpanel" class="tab-pane active" id="news">
		@include($activeTheme . '::' . '_partials._front._tabs.news')
	</div>
	<div role="tabpanel" class="tab-pane" id="tweets">
		@include($activeTheme . '::' . '_partials._front._tabs.other')
	</div>

</div>
<!-- Nav tabs -->
