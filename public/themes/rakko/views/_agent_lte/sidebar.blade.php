<aside class="main-sidebar">
<section class="sidebar">


<ul id="side-bar" class="sidebar-menu">
	@yield('sidebar')
	<li class="header">{!! trans('kotoba::helpdesk.Tickets') !!}</li>

<?php

if (Shinobi::is('super_admin')) {
//if(Auth::user()->role == 'admin') {

//$inbox = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::all();
$myticket = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('assigned_to', Auth::user()->id)->where('status','1')->get();
$unassigned = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('assigned_to', '=',null)->where('status', '=', '1')->get();
$tickets = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('status','1')->get();
$deleted = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('status', '5')->get();

//} elseif(Auth::user()->role == 'agent') {
}elseif (Shinobi::is('agent')) {


//$inbox = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('dept_id','',Auth::user()->primary_dpt)->get();
$myticket = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('assigned_to', Auth::user()->id)->where('status','1')->get();
$unassigned = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('assigned_to', '=',null)->where('status', '=', '1')->where('dept_id','=',Auth::user()->primary_dpt)->get();
$tickets = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('status','1')->where('dept_id','=',Auth::user()->primary_dpt)->get();
$deleted = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('status', '5')->where('dept_id','=',Auth::user())->get();
}


//if (Auth::user()->role == 'agent') {
if (Shinobi::is('agent')) {

$dept = App\Modules\Support\Http\Models\HelpDesk\Agent\Department::where('id', '=', Auth::user()->primary_dpt)->first();
$overdues = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('status', '=', 1)->where('isanswered', '=', 0)->where('dept_id', '=', $dept->id)->orderBy('id', 'DESC')->get();
} else {
$overdues = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('status', '=', 1)->where('isanswered', '=', 0)->orderBy('id', 'DESC')->get();
}

$i = count($overdues);
if ($i == 0) {
$overdue_ticket = 0;
} else {
$j = 0;
foreach ($overdues as $overdue) {
$sla_plan = App\Modules\Support\Http\Models\HelpDesk\Manage\Sla_plan::where('id', '=', $overdue->sla)->first();

$ovadate = $overdue->created_at;
$new_date = date_add($ovadate, date_interval_create_from_date_string($sla_plan->grace_period)).'<br/><br/>';
if (date('Y-m-d H:i:s') > $new_date) {
$j++;
//$value[] = $overdue;
}
}

// dd(count($value));
if ($j > 0) {
$overdue_ticket = $j;
} else {
$overdue_ticket = 0;
}

}
?>



<li @yield('inbox')>
<a href="{{ url('agent/ticket/inbox') }}" id="load-inbox">
<i class="fa fa-envelope"></i> <span>{!! trans('kotoba::helpdesk.inbox') !!}</span> <small class="label pull-right bg-green"><?php echo count($tickets); ?></small>
</a>
</li>
<li @yield('myticket')>
<a href="{{ url('agent/ticket/myticket') }}" id="load-myticket">
<i class="fa fa-user"></i> <span>{!! trans('kotoba::helpdesk.my_tickets') !!} </span>
<small class="label pull-right bg-green">{{count($myticket) }}</small>
</a>
</li>
<li @yield('unassigned')>
<a href="{{ url('agent/unassigned') }}" id="load-unassigned">
<i class="fa fa-th"></i> <span>{!! trans('kotoba::helpdesk.unassigned') !!}</span>
<small class="label pull-right bg-green">{{count($unassigned) }}</small>
</a>
</li>
<li @yield('overdue')>
<a href="{{ url('agent/ticket/overdue') }}" id="load-unassigned">
<i class="fa fa-calendar-times-o"></i> <span>{!! trans('kotoba::helpdesk.overdue') !!}</span>
<small class="label pull-right bg-green">{{$overdue_ticket}}</small>
</a>
</li>
<li @yield('trash')>
<a href="{{ url('agent/trash') }}">
<i class="fa fa-trash-o"></i> <span>{!! trans('kotoba::helpdesk.trash') !!}</span>
<small class="label pull-right bg-green">{{count($deleted) }}</small>
</a>
</li>
<li class="header">{!! trans('kotoba::helpdesk.Departments') !!}</li>

<?php
$depts = App\Modules\Support\Http\Models\HelpDesk\Agent\Department::all();
foreach ($depts as $dept) {
$open = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('status','=','1')->where('isanswered', '=', 0)->where('dept_id','=',$dept->id)->get();
$open = count($open);
$underprocess = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('status','=','1')->where('assigned_to','>', 0)->where('dept_id','=',$dept->id)->get();
$underprocess = count($underprocess);
$closed = App\Modules\Support\Http\Models\HelpDesk\Ticket\Tickets::where('status','=','2')->where('dept_id','=',$dept->id)->get();
$closed = count($closed);
// $underprocess = 0;
// foreach ($inbox as $ticket4) {
//  if ($ticket4->assigned_to == null) {
//  } else {
//      $underprocess++;
//  }
// }

//if (Auth::user()->role == 'admin') {
if (Shinobi::is('admin')) {
?>

<li class="treeview  @yield('{!! $dept->name !!}')">
	<a href="#"><i class="fa fa-folder-open"></i> <span>{!! $dept->name !!}</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href="{!! url::route('dept.open.ticket',$dept->name) !!}"><i class="fa fa-circle-o"></i>{!! trans('kotoba::helpdesk.open') !!}<small class="label pull-right bg-green">{!! $open !!}</small></a></li>
		<li><a href="{!! url::route('dept.inprogress.ticket',$dept->name) !!}"><i class="fa fa-circle-o"></i>{!! trans('kotoba::helpdesk.inprogress') !!}<small class="label pull-right bg-green">{!! $underprocess !!}</small></a></li>
		<li><a href="{!! url::route('dept.closed.ticket',$dept->name) !!}"><i class="fa fa-circle-o"></i>{!! trans('kotoba::helpdesk.closed') !!}<small class="label pull-right bg-green">{!! $closed !!}</small></a></li>
	</ul>
</li>

<?php
}
if (Auth::user()->role == 'agent' && Auth::user()->primary_dpt == $dept->id) {
?>

<li class="treeview">
	<a href="#"><i class="fa fa-folder-open"></i> <span>{!! $dept->name !!}</span> <i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href="{!! url::route('dept.open.ticket',$dept->name) !!}"><i class="fa fa-circle-o"></i>{!! trans('kotoba::helpdesk.open') !!}<small class="label pull-right bg-green">{!! $open !!}</small></a></li>
		<li><a href="{!! url::route('dept.inprogress.ticket',$dept->name) !!}"><i class="fa fa-circle-o"></i>{!! trans('kotoba::helpdesk.inprogress') !!}<small class="label pull-right bg-green">{!! $underprocess !!}</small></a></li>
		<li><a href="{!! url::route('dept.closed.ticket',$dept->name) !!}"><i class="fa fa-circle-o"></i>{!! trans('kotoba::helpdesk.closed') !!}<small class="label pull-right bg-green">{!! $closed !!}</small></a></li>
	</ul>
</li>

<?php
}
}
?>

</ul>


</section><!-- /.sidebar -->
</aside>
