@extends($theme_front)

{{-- Web site Title --}}
@section('title')
{{ Config::get('core.title') }} :: @parent
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/district/assets/css/style.css') }}">
@stop

@section('scripts')
<script src="{{ asset('themes/district/assets/js/calendar.js') }}" type="text/javascript"></script>
@stop

@section('inline-scripts')
jQuery(function ($) {

	$('#eventlist').gCalReader({
		calendarId:'bryantschools.org_iqtueaujn0n4a9ksvijd8ar22c@group.calendar.google.com',
		apiKey:'AIzaSyBKzLxjq0AnyJORq2vh_6UtfaXVqz1Xad0',
		sortDescending: false
	});

});
@stop


{{-- Content --}}
@section('content')


<!-- Carousel -->
{!!
	Widget::NewsBanner()
!!}


<!--WELCOME-->
<div class="container-fluid">
<div class="row welcome">

	<div class="col-md-12">
		<h1 class="text-center">Welcome to Bryant Middle School!</h1>
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

		<div class="eventdate padding-top-md">
			<i class="fa fa-calendar fa-2x"></i>
		</div>
		<div class="eventtitle padding-top-lg">
			<a href="district-calendars">Click here for all district calendars</a>
		</div>
	</div>

	<div class="col-sm-6">

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
