@extends('module_info')

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

	<div class="container">
		<div class="content">
			<a href="/">
				<img src="/assets/images/rakko.png">
			</a>
			<div class="title">
				<a href="/">
					Core
				</a>
			</div>
			<div class="quote">
				A basic collection of functions for Rakko
			</div>
		</div>
	</div>

@stop
