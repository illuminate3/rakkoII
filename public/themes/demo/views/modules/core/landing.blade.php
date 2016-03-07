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
{!!
	Widget::NewsBanner()
!!}


<!--WELCOME-->
<div class="container-fluid">
<div class="row">

	<a href="/">
		<img class="landing" src="{{ asset('/assets/images/rakko.jpg') }}"></img>
	</a>

</div><!--./row-->
</div><!--./container-fluid-->
</div>

@stop
