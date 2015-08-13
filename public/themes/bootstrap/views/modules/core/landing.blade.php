@extends($theme_front)

{{-- Web site Title --}}
@section('title')
{{ Config::get('core.title') }} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
<script src="{{ asset('themes/district/assets/js/calendar.js') }}" type="text/javascript"></script>
@stop

@section('inline-scripts')
jQuery(function ($) {

	$('#eventlist').gCalReader({
		calendarId:'bryantschools.org_0uailapodvjkgoate1ke1jd7q8@group.calendar.google.com',
		apiKey:'AIzaSyCp0u86myROyRqtz8w-YQmouTlHHtYSxPw',
		sortDescending: false
	});

});
@stop


{{-- Content --}}
@section('content')


<!-- Buttons -->
{{--
	Widget::NewsBanner()
--}}


<!--WELCOME-->
<div class="container-fluid">
<div class="row welcome">

	<div class="col-md-12">
		<h1 class="text-center">Welcome to the Bryant School District!</h1>
		<h3 class="text-center subheading">Bryant Public Schools create opportunities for academic and personal success to ensure all students are future ready.</h3>
	</div>

</div>

</div><!--./row-->
</div><!--./container-fluid-->


<hr>


<!--Calendar/News-->
<div class="container-fluid">
<div class="row">

	<div class="col-sm-6">
		<div class="header1">
			<h1>
				Calendar
			</h1>
		</div>
		<ul id="eventlist"></ul>
	</div>

	<div class="col-sm-6">


<!-- Buttons -->
{!!
	Widget::TopNews()
!!}


	</div>

</div><!--./row-->
</div><!--./container-fluid-->
</div>


<hr>


<!--Catch Copy-->
<div class="container-fluid">
	<img class="img-responsive center-block" src="{{ asset('themes/district/assets/img/creating.png') }}" />
</div><!--./container-fluid-->


@stop
