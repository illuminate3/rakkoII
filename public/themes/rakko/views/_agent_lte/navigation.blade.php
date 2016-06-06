<header class="main-header">

<!-- Logo -->
<a href="/" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-mini"><b>A</b></span>
<!-- logo for regular state and mobile devices -->
<span class="logo-lg"><b>Agent</b></span>
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
<?php
$notifications = App\Modules\Support\Http\Controllers\Common\NotificationController::getNotifications();
?>
<div class="collapse navbar-collapse" id="navbar-collapse">

<!-- Nav tabs -->
<ul class="tabs tabs-horizontal nav navbar-nav navbar-left">
	<li role="presentation" @yield('Dashboard') id="dashboard"><a href="{{ url('agent/dashboard') }}">{!! trans('kotoba::helpdesk.dashboard') !!}</a></li>
	<li role="presentation" @yield('Tickets') id="tickets"><a href="#ticket-tab" aria-controls="tab" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.tickets') !!}</a></li>
	<li role="presentation" @yield('KB') id="kb"><a href="#kb-tab" aria-controls="tab" role="tab" data-toggle="tab"" >{!! trans('kotoba::helpdesk.knowledge_base') !!}</a></li>
</ul>


	<ul class="nav navbar-nav navbar-right">

		@if (Shinobi::is('super_admin'))
			<li><a href="{{ url('support/admin') }}">{!! trans('kotoba::helpdesk.admin_panel') !!}</a></li>
		@endif
		<!-- User Account: style can be found in dropdown.less -->
		<li class="dropdown notifications-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="myFunction()">
				<i class="fa fa-bell-o"></i>
				<span class="label label-warning" id="count">{!! count($notifications) !!}</span>
			</a>
			<ul class="dropdown-menu">
				<li class="header">You have {!! count($notifications) !!} notifications</li>
				<li>

					<ul class="menu">
						@foreach($notifications as $notification)
						@if($notification->type == 'registration')
						<li>
							<a href="{!! route('user.show', $notification->model_id) !!}" id="{{ $notification->notification_id }}" class='noti_User'>
								<i class="{!! $notification->icon_class !!}"></i> {!! $notification->message !!}
							</a>
						</li>
						@else
						<li>
							<a href="{!! route('ticket.thread', $notification->model_id) !!}" id='{{ $notification->notification_id }}' class='noti_User'>
								<i class="{!! $notification->icon_class !!}"></i> {!! $notification->message !!}
							</a>
						</li>
						@endif
						@endforeach

					</ul>
				</li>
				<li class="footer"><a href="{{ url('notifications-list') }}">View all</a>
				</li>

			</ul>
		</li>

		@include($activeTheme . '::' . '_partials.admin.navigation_profile')

	</ul>
</div>

		</nav>


</header>
