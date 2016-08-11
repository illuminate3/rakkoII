<header class="main-header">

<!-- Logo -->
<a href="../../index2.html" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-mini"><b>A</b></span>
<!-- logo for regular state and mobile devices -->
<span class="logo-lg"><b>Admin</b></span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</a>

<div class="collapse navbar-collapse" id="navbar-collapse">

	<ul class="nav navbar-nav">
		<li>
			<a href="{{url('support/admin')}}">
				{!! trans('kotoba::helpdesk.home') !!}
			</a>
		</li>
	</ul>

{{--
	<!-- Nav tabs -->
	<ul class="tabs tabs-horizontal nav navbar-nav navbar-left">
		<li role="presentation" class="active"><a href="#tabA" aria-controls="tabA" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.home') !!}</a></li>
		<li role="presentation" class="@yield('Staffs')"><a href="#tabB" aria-controls="tabB" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.staffs') !!}</a></li>
		<li role="presentation" class="@yield('Emails')"><a href="#tabC" aria-controls="tabC" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.emails') !!}</a></li>
		<li role="presentation" class="@yield('Manage')"><a href="#tabD" aria-controls="tabD" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.manage') !!}</a></li>
		<li role="presentation" class="@yield('Settings')"><a href="#tabE" aria-controls="tabE" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.settings') !!}</a></li>
		<li role="presentation" class="@yield('Themes')"><a href="#tabF" aria-controls="tabF" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.themes') !!}</a></li>
	</ul>
--}}

	<ul class="nav navbar-nav navbar-right">

		<li><a href="{{url('agent/dashboard')}}">Agent Panel</a></li>


		<!-- User Account: style can be found in dropdown.less -->
<?php
$notifications = App\Modules\Support\Http\Controllers\Common\NotificationController::getNotifications();
?>

		<li class="dropdown notifications-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="myFunction()">
				<i class="fa fa-bell-o"></i>
				<span class="label label-warning" id="count"><?php echo count($notifications); ?></span>
			</a>
			<ul class="dropdown-menu">
				<li class="header">You have <?php echo count($notifications); ?> notifications</li>
				<li>
					<ul class="menu">
						@foreach($notifications as $notification)
						@if($notification->type == 'registration')
						<li>
							<a href="{!! route('user.show', $notification->notification_id) !!}" id="{{$notification -> notification_id}}" class='noti_User'>
								<i class="{!! $notification->icon_class !!}"></i> {!! $notification->message !!}
							</a>
						</li>
						@else
						<li>
							<a href="{!! route('ticket.thread', $notification->notification_id) !!}" id='{{ $notification->notification_id }}' class='noti_User'>
								<i class="{!! $notification->icon_class !!}"></i> {!! $notification->message !!}
							</a>
						</li>
						@endif
						@endforeach
					</ul>
				</li>
				<li class="footer"><a href="{{ url('notifications-list') }}">View all</a></li>
			</ul>
		</li>


		@include($activeTheme . '::' . '_partials.admin.navigation_profile')

	</ul>

</div>

</nav>

</header>
