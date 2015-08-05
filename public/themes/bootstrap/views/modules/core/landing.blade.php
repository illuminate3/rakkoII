@extends($theme_back)


{{-- Web site Title --}}
@section('title')
{{ Config::get('core.title') }} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')

	<a href="/">
		<img src="/assets/images/rakko.jpg" class="img-responsive">
	</a>
	<div class="title">
		Welcome to the Rakko Platform System
	</div>

@stop
