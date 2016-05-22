@extends($theme_front)

{{-- Web site Title --}}
@section('title')
{{ Config::get('core.title') }} :: @parent
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/cd_style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/carousel.css') }}">
@stop

@section('scripts')
	<script type="text/javascript" src="{{ asset('themes/' . $activeTheme . '/assets/js/jquery.mobile.custom.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('themes/' . $activeTheme . '/assets/js/main.js') }}"></script>
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')


<!-- Banner -->
<div class="container-fluid">
<div class="row">

	{!!
		Widget::NewsBanner()
	!!}

</div><!--./row-->
</div><!--./container-fluid-->

<div class="container-fluid padding-top-md">
	@include($activeTheme . '::' . '_partials._front._content.jumbo_tron')
</div><!--./container-fluid-->

<div class="row margin-left-md margin-right-md">
<div class="col-md-4">

	<article class="left-box">
			<h4>EASILY CUSTOMIZABLE</h4>
			<p>Sed ut perspiciatis unde omnis iste natus <strong>error sit voluptatem accusantium</strong> doloremque laudantium, totam aspernatur aut odit aut fugit.</p>
			<a href="index.html#">LEARN MORE</a>
	</article>

</div>
<div class="col-md-4">

	<article class="right-box">
			<h4>PSD FILES INCLUDED</h4>
			<p>Sed ut perspiciatis unde omnis iste natus <strong>error sit voluptatem accusantium</strong> doloremque laudantium, totam aspernatur aut odit aut fugit.</p>
			<a href="index.html#">LEARN MORE</a>
	</article>

</div>
<div class="col-md-4">
	@include($activeTheme . '::' . '_partials._front._tabs.tabs')
</div>
</div> <!-- ./row -->


	@include($activeTheme . '::' . '_partials._front._content.main_content')

@stop
