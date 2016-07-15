<!-- cd-nav -->
<nav class="cd-nav">
<ul id="cd-primary-nav" class="cd-primary-nav is-fixed">

	<li class="has-children">
		<a href="#about-us">About Us</a>

		<ul class="cd-secondary-nav is-hidden">
			<li class="go-back"><a href="#">Go Back</a></li>
{{--
			<li class="see-all"><a href="/">Creating Opportunities for Success</a></li>
--}}
			<li class="has-children">
				<h3>
					Campus Soft
				</h3>
{{--
				<div class="img-center">
				<img class="img-responsive" src="{{ asset('/themes/' . $activeTheme . '/assets/img/-logo.png') }}">
				</div>
--}}
			</li>

			<li class="has-children">

				<h4 class="h-bottom_border">
					Company
				</h4>
				<p>
					An Arkansa based company with a history going back to the early 90's in education and educational software.
					<br>
					<br>
					Having seeing a need software in schools Campus Soft was created.
				</p>

			</li>

			<li class="has-children">
				<h4 class="h-bottom_border">
					Mission
				</h4>
				<p>
					To provide educational institutions easy to use and powerful IT solutions.
				</p>

				<h4 class="h-bottom_border">
					Values
				</h4>
				<p>
					As educators ourselves, we believe in going beyond the best that we can do for students, which translates to that we will do the same for our customers.
				</p>

				<h4 class="h-bottom_border">
					Vision
				</h4>
				<p>
					Seeing our customers consistently and continually exceed their expectations of our products and services.
				</p>
			</li>

			<li class="has-children">
				<h4 class="h-bottom_border">
					Get Connected
				</h4>
				<p>
					We are committed to making sure that information is always available to everyone.
					Use our website, social media, and messaging systems to get the most up to date information about events happening with Campus Soft.
				</p>
			</li>
		</ul>
	</li>

	<li class="has-children">
		<a href="#">Modules</a>

		<ul class="cd-nav-icons is-hidden">
			<li class="go-back"><a href="#0">Go Back</a></li>

			<li>
				<a class="cd-nav-item" href="/">
					<i class="fa fa-keyboard-o fa-2x"></i>
					Asset Management
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/">
					<i class="fa fa-files-o fa-fw"></i>
					Content Management System
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/">
					<i class="fa fa-users fa-fw"></i>
					Human Resource Management
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/">
					<i class="fa fa-clock-o fa-fw"></i>
					Personal Development Tracking
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/">
					<i class="fa fa-ticket fa-fw"></i>
					Ticket System
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/">
					<i class="fa fa-info-circle fa-fw"></i>
					Knowledge Base
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/">
					<i class="fa fa-plug fa-fw"></i>
					Extra Modules
				</a>
			</li>
		</ul>
	</li>

{{--
	<li class="has-children">
		<a href="/">Documentation</a>

		<ul class="cd-secondary-nav is-hidden">
			<li class="go-back"><a href="#0">Go Back</a></li>

			<li class="has-children">

				<h4 class="h-bottom_border">
					Documentation
				</h4>
				<p>
					<a href="/">Documentation</a>
				</p>

			</li>

		</ul>
	</li>
--}}

@if (Auth::user() && Auth::user()->is('user'))


	<li class="has-children">
		<a href="#">
			<i class="fa fa-magnet fa-fw"></i>
			{{ trans('kotoba::helpdesk.control_panel') }}
		</a>

		<ul class="cd-nav-icons is-hidden">
			<li class="go-back"><a href="#0">Go Back</a></li>

			@if ( Auth::user()->can('manage_admin') )
				<li>
					<a class="cd-nav-item" href="/admin">
						<i class="fa fa-cogs fa-fw"></i>
						{{ trans('kotoba::helpdesk.admin_panel') }}
					</a>
				</li>
			@endif

			<li>
				<a class="cd-nav-item" href="/staff/dashboard/{{ Auth::user()->id }}">
					<i class="fa fa-dashboard fa-fw"></i>
					{{ trans('kotoba::general.dashboard') }}
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/staff">
					<i class="fa fa-sign-in fa-fw"></i>
					{{ trans('kotoba::general.staff') }}&nbsp;{{ trans('kotoba::cms.portal') }}
				</a>
			</li>

			@if ( !Auth::user()->can('manage_admin') )
				<li>
					<a class="cd-nav-item" href="/">
					</a>
				</li>
			@endif

{{--
			@if ( Auth::user()->can('manage_support') )
				<li>
					<a class="cd-nav-item" href="/agent/dashboard">
						<i class="fa fa-ticket fa-fw"></i>
						{{ trans('kotoba::helpdesk.agent_panel') }}
					</a>
				</li>
			@endif
--}}

			<li>
				<a class="cd-nav-item" href="/helpdesk">
					<i class="fa fa-ticket fa-fw"></i>
					{{ trans('kotoba::helpdesk.helpdesk') }}
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/helpdesk/knowledgebase">
					<i class="fa fa-lightbulb-o fa-fw"></i>
					{{ trans('kotoba::helpdesk.knowledge_base') }}
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/">
				</a>
			</li>

			<li>
				<a class="cd-nav-item" href="/auth/logout">
					<i class="fa fa-sign-out fa-fw"></i>
					{{ trans('kotoba::auth.sign_out') }}
				</a>
			</li>

		</ul>
	</li>

@else

	<li>
		<a href="/social/login">
			{{ trans('kotoba::hr.staff') }}
		</a>
{{--
		<a href="/auth/login">
			{{ trans('kotoba::hr.staff') }}
		</a>
--}}
	</li>

@endif
<!-- login -->

</ul> <!-- primary-nav -->
</nav>
<!-- cd-nav -->
