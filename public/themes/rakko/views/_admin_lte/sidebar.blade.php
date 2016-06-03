<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

{{--
<!-- Sidebar user panel -->
<div class="user-panel">
<div class="pull-left image">
<img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
</div>
<div class="pull-left info">
<p>Alexander Pierce</p>
<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>

<!-- search form -->
<form action="#" method="get" class="sidebar-form">
<div class="input-group">
<input type="text" name="q" class="form-control" placeholder="Search...">
<span class="input-group-btn">
<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
</button>
</span>
</div>
</form>
<!-- /.search form -->
--}}

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">

	<li class="header">
		{{ Lang::choice('kotoba::general.setting', 2) }}
	</li>
	<li class="treeview @yield('sidebar_staff')">
		<a href="#">
			<i class="fa fa-users fa-fw"></i>&nbsp;
			<span>
				{{ trans('kotoba::general.staff') }}
			</span>&nbsp;
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			<li @yield('sidebar_agents')>
				<a href="{{ url('support/agents') }}">
					<i class="fa fa-user fa-fw"></i>
					{{ trans('kotoba::helpdesk.agents') }}
				</a>
			</li>
			<li @yield('sidebar_departments')>
				<a href="{{ url('support/departments') }}">
					<i class="fa fa-building-o fa-fw"></i>
					{{ trans('kotoba::helpdesk.departments') }}
				</a>
			</li>
			<li @yield('sidebar_teams')>
				<a href="{{ url('support/teams') }}">
					<i class="fa fa-users fa-fw"></i>
					{{ trans('kotoba::helpdesk.teams') }}
				</a>
			</li>
			<li @yield('sidebar_groups')>
				<a href="{{ url('support/groups') }}">
					<i class="fa fa-group fa-fw"></i>
					{{ trans('kotoba::helpdesk.groups') }}
				</a>
			</li>
		</ul>
	</li>

	<li class="treeview @yield('sidebar_email')">
		<a href="#">
			<i class="fa fa-envelope-o fa-fw"></i>&nbsp;
			<span>
				{{ trans('kotoba::general.mail') }}
			</span>&nbsp;
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			<li @yield('sidear_email')>
				<a href="{{ url('support/emails') }}">
					<i class="fa fa-envelope-o fa-fw"></i>
					{{ trans('kotoba::general.mail') }}
				</a>
			</li>
			<li @yield('sidebar_ban')>
				<a href="{{ url('support/banlist') }}">
					<i class="fa fa-ban fa-fw"></i>
					{{ trans('kotoba::helpdesk.ban_lists') }}
				</a>
			</li>
			<li @yield('sidebar_template')>
				<a href="{{ url('support/list-directories') }}">
					<i class="fa fa-files-o fa-fw"></i>
					{{ trans('kotoba::helpdesk.templates') }}
				</a>
			</li>
			<li @yield('sidebar_diagnostics')>
				<a href="{{ url('support/getdiagno') }}">
					<i class="fa fa-check fa-fw"></i>
					{{ trans('kotoba::helpdesk.diagnostics') }}
				</a>
			</li>
		</ul>
	</li>

	<li class="treeview @yield('sidebar_manage')">
		<a href="#">
			<i class="fa fa-cubes fa-fw"></i>&nbsp;
			<span>
				{{ trans('kotoba::helpdesk.manage') }}
			</span>&nbsp;
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			<li @yield('sidear_help')>
				<a href="{{ url('support/helptopic') }}">
					<i class="fa fa-file-text-o fa-fw"></i>
					{{ trans('kotoba::helpdesk.help_topics') }}
				</a>
			</li>
			<li @yield('sidebar_sla')>
				<a href="{{ url('support/sla') }}">
					<i class="fa fa-clock-o fa-fw"></i>
					{{ trans('kotoba::helpdesk.sla_plans') }}
				</a>
			</li>
			<li @yield('sidebar_forms')>
				<a href="{{ url('support/forms') }}">
					<i class="fa fa-file-text fa-fw"></i>
					{{ trans('kotoba::helpdesk.forms') }}
				</a>
			</li>
			<li @yield('sidebar_workflow')>
				<a href="{{ url('support/workflow') }}">
					<i class="fa fa-sitemap fa-fw"></i>
					{{ trans('kotoba::helpdesk.workflow') }}
				</a>
			</li>
		</ul>
	</li>

	<li class="treeview @yield('sidebar_settings')">
		<a href="#">
			<i class="fa fa-cog fa-fw"></i>&nbsp;
			<span>
				{{ trans('kotoba::helpdesk.system-settings') }}
			</span>&nbsp;
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			<li @yield('sidear_company')>
				<a href="{{ url('support/getcompany') }}">
					<i class="fa fa-industry fa-fw"></i>
					{{ trans('kotoba::helpdesk.company') }}
				</a>
			</li>
			<li @yield('sidebar_system')>
				<a href="{{ url('support/getsystem') }}">
					<i class="fa fa-laptop fa-fw"></i>
					{{ trans('kotoba::helpdesk.system') }}
				</a>
			</li>
			<li @yield('sidebar_email')>
				<a href="{{ url('support/getemail') }}">
					<i class="fa fa-at fa-fw"></i>
					{{ trans('kotoba::helpdesk.email') }}
				</a>
			</li>
			<li @yield('sidebar_tickets')>
				<a href="{{ url('support/getticket') }}">
					<i class="fa fa-ticket fa-fw"></i>
					{{ trans('kotoba::helpdesk.ticket') }}
				</a>
			</li>
			<li @yield('sidear_auto_response')>
				<a href="{{ url('support/getalert') }}">
					<i class="fa fa-bell-o fa-fw"></i>
					{{ trans('kotoba::helpdesk.alert_notices') }}
				</a>
			</li>
			<li @yield('sidebar_languages')>
				<a href="{{ url('support/languages') }}">
					<i class="fa fa-language fa-fw"></i>
					{{ trans('kotoba::helpdesk.language') }}
				</a>
			</li>
			<li @yield('sidebar_cron')>
				<a href="{{ url('support/job-scheduler') }}">
					<i class="fa fa-hourglass fa-fw"></i>
					{{ trans('kotoba::helpdesk.cron') }}
				</a>
			</li>
		</ul>
	</li>

	<li class="treeview @yield('sidebar_themes')">
		<a href="#">
			<i class="fa fa-pie-chart fa-fw"></i>&nbsp;
			<span>
				{{ trans('kotoba::helpdesk.widgets') }}
			</span>&nbsp;
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			<li @yield('sidear_widget')>
				<a href="{{ url('support/widgets') }}">
					<i class="fa fa-list-alt fa-fw"></i>
					{{ trans('kotoba::helpdesk.widgets') }}
				</a>
			</li>
			<li @yield('sidebar_social')>
				<a href="{{ url('support/social-buttons') }}">
					<i class="fa fa-cubes fa-fw"></i>
					{{ trans('kotoba::helpdesk.social') }}
				</a>
			</li>
		</ul>
	</li>

	<li class="treeview @yield('sidebar_pligins')">
		<a href="{{ url('support/plugins') }}">
			<i class="fa fa-plug fa-fw"></i>&nbsp;
			<span>
				{{ trans('kotoba::helpdesk.plugin') }}
			</span>&nbsp;
		</a>
	</li>




{{--
<li class="treeview">
<a href="#">
<i class="fa fa-files-o"></i>
<span>Layout Options</span>
<span class="label label-primary pull-right">4</span>
</a>
<ul class="treeview-menu">
<li><a href="top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
<li><a href="boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
<li><a href="fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
<li class="active"><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a>
</li>
</ul>
</li>
<li>
<a href="../widgets.html">
<i class="fa fa-th"></i> <span>Widgets</span>
<small class="label pull-right bg-green">new</small>
</a>
</li>
<li class="treeview">
<a href="#">
<i class="fa fa-pie-chart"></i>
<span>Charts</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
<li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
<li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
<li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
</ul>
</li>
<li class="treeview">
<a href="#">
<i class="fa fa-laptop"></i>
<span>UI Elements</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
<li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
<li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
<li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
<li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
<li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
</ul>
</li>
<li class="treeview">
<a href="#">
<i class="fa fa-edit"></i> <span>Forms</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
<li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
<li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
</ul>
</li>
<li class="treeview">
<a href="#">
<i class="fa fa-table"></i> <span>Tables</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
<li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
</ul>
</li>
<li>
<a href="../calendar.html">
<i class="fa fa-calendar"></i> <span>Calendar</span>
<small class="label pull-right bg-red">3</small>
</a>
</li>
<li>
<a href="../mailbox/mailbox.html">
<i class="fa fa-envelope"></i> <span>Mailbox</span>
<small class="label pull-right bg-yellow">12</small>
</a>
</li>
<li class="treeview">
<a href="#">
<i class="fa fa-folder"></i> <span>Examples</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
<li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
<li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
<li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
<li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
<li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
<li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
<li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
<li><a href="../examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
</ul>
</li>
<li class="treeview">
<a href="#">
<i class="fa fa-share"></i> <span>Multilevel</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
<li>
<a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
<li>
<a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
</ul>
</li>
</ul>
</li>
<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
</ul>
</li>
<li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
<li class="header">LABELS</li>
<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
</ul>
--}}


</section>
<!-- /.sidebar -->
</aside>
