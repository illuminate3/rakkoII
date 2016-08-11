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

	<div class="tabs-pane active" id="tabA">
		<ul class="nav navbar-nav">
		</ul>
	</div>
	<div role="tabpanel" class="tabs-pane @yield('staffs-bar')" id="tabB">
		<ul class="nav navbar-nav">
			<li id="bar" @yield('staffs')><a href="{{ url('agents') }}" >Staffs</a></li></a></li>
			<li id="bar" @yield('departments')><a href="{{ url('departments') }}" >Departments</a></li></a></li>
			<li id="bar" @yield('teams')><a href="{{ url('teams') }}" >Teams</a></li></a></li>
			<li id="bar" @yield('groups')><a href="{{ url('groups') }}" >Groups</a></li></a></li>
		</ul>
	</div>
	<div role="tabpanel" class="tabs-pane @yield('emails-bar')" id="tabC">
		<ul class="nav navbar-nav">
			<li id="bar" @yield('emails')><a href="{{ url('emails') }}" >Emails</a></li></a></li>
			<li id="bar" @yield('ban')><a href="{{ url('banlist') }}" >Ban List</a></li>
			<li id="bar" @yield('template')><a href="{{ url('template') }}" >Template</a></li>
			<li id="bar" @yield('diagno')><a href="{{ url('getdiagno') }}" >Diagnostic</a></li>
			<li id="bar" @yield('smtp')><a href="{{ url('getsmtp') }}" >Smtp</a></li>
		</ul>
	</div>
	<div role="tabpanel" class="tabs-pane @yield('manage-bar')" id="tabD">
		<ul class="nav navbar-nav">
			<li id="bar" @yield('help')><a href="{{url('helptopic')}}">Help Topic</a></li>
			<li id="bar" @yield('sla')><a href="{{url('sla')}}">SLA Plans</a></li>
			{{-- <li id="bar" @yield('forms')><a href="#">Forms</a></li> --}}
		</ul>
	</div>
	<div role="tabpanel" class="tabs-pane @yield('settings-bar')" id="tabE">
		<ul class="nav navbar-nav">
			<li id="bar" @yield('company')><a href="{{url('getcompany')}}">Company</a></li>
			<li id="bar" @yield('system')><a href="{{url('getsystem')}}">System</a></li>
			<li id="bar" @yield('email')><a href="{{url('getemail')}}">Email</a></li>
			<li id="bar" @yield('tickets')><a href="{{url('getticket')}}">Tickets</a></li>
			<li id="bar" @yield('access')><a href="{{url('getaccess')}}">Access</a></li>
			<li id="bar" @yield('auto-response')><a href="{{url('getresponder')}}">Auto-Responce</a></li>
			<li id="bar" @yield('alert')><a href="{{url('getalert')}}">Alert & Notice</a></li>
		</ul>
	</div>
	<div role="tabpanel" class="tabs-pane @yield('theme-bar')" id="tabF">
		<ul class="nav navbar-nav">
			<li id="bar" @yield('footer')><a href="{{ url('create-footer') }}" >Footer</a></li></a></li>
			<li id="bar" @yield('footer2')><a href="{{ url('create-footer2') }}" >Footer2</a></li></a></li>
			<li id="bar" @yield('footer3')><a href="{{ url('create-footer3') }}" >Footer3</a></li></a></li>
			<li id="bar" @yield('footer4')><a href="{{ url('create-footer4') }}" >Footer4</a></li></a></li>
		</ul>
	</div>

</div>

</div>
</div>
<!-- Nav tabs -->
