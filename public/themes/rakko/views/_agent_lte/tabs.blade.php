<?php
//$agent_group = Auth::user()->assign_group;
$agent_group = DB::table('users')
	->join('faveo', 'faveo.user_id', '=', 'users.id')
	->pluck('assign_group');

$group = App\Modules\Support\Http\Models\HelpDesk\Agent\Groups::where('id', '=', $agent_group)->where('group_status', '=', '1')->first();
//dd($group);
?>


<!-- Tab panes -->
<div class="tab-content default">
<div class="collapse navbar-collapse" id="navbar-collapse">

<div class="tab-content">

	<div role="tabpanel" class="tab-pane @yield('dashboard-bar')" id="tabA">
		<ul class="nav navbar-nav">
			<li id="bar" @yield('dashboard') ><a href="{{url('dashboard')}}">{!! trans('kotoba::helpdesk.dashboard') !!}</a></li>
			<li id="bar" @yield('profile') ><a href="{{url('profile')}}">{!! trans('kotoba::helpdesk.profile') !!}</a></li>
		</ul>
	</div>

	<div role="tabpanel" class="tab-pane @yield('user-bar')" id="tabB">
		<ul class="nav navbar-nav">
			<li id="bar" @yield('user')><a href="{{ url('user') }}" >{!! trans('kotoba::helpdesk.user_directory') !!}</a></li></a></li>
			<li id="bar" @yield('organizations')><a href="{{ url('organizations') }}" >{!! trans('kotoba::helpdesk.organizations') !!}</a></li></a></li>
		</ul>
	</div>

	<div role="tabpanel" class="tab-pane @yield('ticket-bar')" id="tabC">
		<ul class="nav navbar-nav">
			<li id="bar" @yield('open')><a href="{{ url('/agent/ticket/open') }}" id="load-open">{!! trans('kotoba::helpdesk.open') !!}</a></li>
			<li id="bar" @yield('answered')><a href="{{ url('/agent/ticket/answered') }}" id="load-answered">{!! trans('kotoba::helpdesk.answered') !!}</a></li>
			<li id="bar" @yield('myticket')><a href="{{ url('/agent/ticket/myticket') }}" >{!! trans('kotoba::helpdesk.my_tickets') !!}</a></li>
			{{-- <li id="bar" @yield('ticket')><a href="{{ url('ticket') }}" >Ticket</a></li> --}}
			{{-- <li id="bar" @yield('overdue')><a href="{{ url('/agent/ticket/overdue') }}" >Overdue</a></li> --}}
			<li id="bar" @yield('assigned')><a href="{{ url('/agent/ticket/assigned') }}" id="load-assigned" >{!! trans('kotoba::helpdesk.assigned') !!}</a></li>
			<li id="bar" @yield('closed')><a href="{{ url('/agent/ticket/closed') }}" >{!! trans('kotoba::helpdesk.closed') !!}</a></li>
			<?php if ($group->can_create_ticket == 1) {?>
			<li id="bar" @yield('newticket')><a href="{{ url('/newticket') }}" >{!! trans('kotoba::helpdesk.create_ticket') !!}</a></li>
			<?php } ?>
		</ul>
	</div>

	<div role="tabpanel" class="tab-pane @yield('tools-bar')" id="tabD">
		<ul class="nav navbar-nav">
			<li id="bar" @yield('tools')><a href="{{ url('/canned/list') }}" >{!! trans('kotoba::helpdesk.canned_response') !!}</a></li>
			<li id="bar" @yield('kb')><a href="{{ url('/comment') }}" >{!! trans('kotoba::helpdesk.knowledge_base') !!}</a></li>
		</ul>
	</div>

</div>

</div>
</div>
<!-- Nav tabs -->
