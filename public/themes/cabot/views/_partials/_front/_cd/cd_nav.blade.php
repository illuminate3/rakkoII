<!-- cd-nav -->
<nav class="cd-nav">
<ul id="cd-primary-nav" class="cd-primary-nav is-fixed">

	<li class="has-children">
		<a href="#about-us">About Us</a>

		<ul class="cd-secondary-nav is-hidden">
			<li class="go-back"><a href="#">Go Back</a></li>

			<li class="has-children">
				<div class="img-center">
				<img class="img-responsive" src="{{ asset('/themes/' . $activeTheme . '/assets/img/cabot.png') }}">
				</div>
			</li>

			<li class="has-children">
				<h3 class="padding-left-xl">
					Cabot Technology Department
				</h3>
			</li>

			<li class="has-children">
				<h4 class="h-bottom_border">
					Mission
				</h4>
				<p>
					To provide the best technology support in the state.
				</p>

				<h4 class="h-bottom_border">
					Values
				</h4>
				<p>
					We will exceed your expectations.
				</p>

				<h4 class="h-bottom_border">
					Vision
				</h4>
				<p>
					Greeting you in the halls, your classroom and outside of school because we have done our job.
				</p>
			</li>

			<li class="has-children">
				<h4 class="h-bottom_border">
					Technology Department Information
				</h4>
				<p>
					Hours: 7:30am to 4pm
				</p>
				<p>
					Telephone: (501)
				</p>
				<p>
					Emergency Contact: (501)
				</p>
			</li>
		</ul>
	</li>


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
