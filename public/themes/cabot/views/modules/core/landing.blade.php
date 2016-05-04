@extends($theme_front)

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


<!-- Banner -->
<div class="container-fluid">
<div class="row">

	{!!
		Widget::NewsBanner()
	!!}

</div><!--./row-->
</div><!--./container-fluid-->
</div>

@stop
