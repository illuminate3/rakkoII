@extends($theme_front)

{{-- Web site Title --}}
@section('title')
{{{ $page->title }}} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop

{{-- Content --}}
@section('content')


<div class="row">
	<h1>
		{{ $page->title }}
	</h1>
</div>

<div class="row">
	<h2>
		{!! $page->summary !!}
	</h2>
</div>

<div class="row">
	{!! $page->content !!}
</div>


@stop
