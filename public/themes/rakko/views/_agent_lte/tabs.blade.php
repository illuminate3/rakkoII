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

	<div role="tabpanel" class="tab-pane @yield('ticket-bar')" id="ticket-tab">
		<ul class="nav navbar-nav">
			<li id="open" @yield('open')><a href="{{ url('agent/ticket/open') }}" id="load-open">{!! trans('kotoba::helpdesk.open') !!}</a></li>
			<li id="answered" @yield('answered')><a href="{{ url('agent/ticket/answered') }}" id="load-answered">{!! trans('kotoba::helpdesk.answered') !!}</a></li>
			<li id="myticket" @yield('myticket')><a href="{{ url('agent/ticket/myticket') }}" >{!! trans('kotoba::helpdesk.my_tickets') !!}</a></li>
			{{-- <li id="ticket" @yield('ticket')><a href="{{ url('ticket') }}" >Ticket</a></li> --}}
			{{-- <li id="overdue" @yield('overdue')><a href="{{ url('agent/ticket/overdue') }}" >Overdue</a></li> --}}
			<li id="assigned" @yield('assigned')><a href="{{ url('agent/ticket/assigned') }}" id="load-assigned" >{!! trans('kotoba::helpdesk.assigned') !!}</a></li>
			<li id="closed" @yield('closed')><a href="{{ url('agent/ticket/closed') }}" >{!! trans('kotoba::helpdesk.closed') !!}</a></li>
			<?php if ($group->can_create_ticket == 1) {?>
			<li id="newticket" @yield('newticket')><a href="{{ url('agent/newticket') }}" >{!! trans('kotoba::helpdesk.create_ticket') !!}</a></li>
			<?php } ?>
		</ul>
	</div>

	<div role="tabpanel" class="tab-pane @yield('kb-bar')" id="kb-tab">
		<ul class="nav navbar-nav">
			<li id="category" class="@yield('categories')"><a href="{{ url('agent/category') }}" >{!! trans('kotoba::helpdesk.categories') !!}</a></li></a></li>
			<li id="article" class="@yield('articles')"><a href="{{ url('agent/article') }}" >{!! trans('kotoba::helpdesk.articles') !!}</a></li></a></li>
			<li id="pages" class="@yield('pages')"><a href="{{ url('agent/page') }}" >{!! trans('kotoba::helpdesk.pages') !!}</a></li></a></li>

			<li id="commnets" class="@yield('commnets')"><a href="{{ url('agent/comment') }}" >{!! trans('kotoba::helpdesk.comments') !!}</a></li></a></li>
			<li id="canned" class="@yield('canned')"><a href="{{ url('agent/canned/list') }}" >{!! trans('kotoba::helpdesk.canned_response') !!}</a></li>
			<li id="organizations" class="@yield('organizations')"><a href="{{ url('agent/organizations') }}" >{!! trans('kotoba::helpdesk.organizations') !!}</a></li></a></li>
		</ul>
	</div>

</div>

</div>
</div>
<!-- Nav tabs -->
