@if (Auth::user())

	<ul class="nav navbar-nav navbar-right">
		@if (Auth::guest())
			<li><a href="/auth/login">{{ trans('kotoba::auth.log_in') }}</a></li>
			<li><a href="/auth/register">{{ trans('kotoba::auth.register') }}</a></li>
		@else
{{--
			<li>
				@if (Auth::user()->avatar != null)
					<img
						src="{{ asset(Auth::user()->avatar) }}"
						alt="{{ Auth::user()->email }}"
						class="img-circle nav-profile"
					/>
				@else
					<img
						src="{{ asset('/assets/images/usr.png') }}"
						alt="{{ Auth::user()->email }}"
						class="img-circle nav-profile"
					/>
				@endif
			</li>
--}}
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				<i class="fa fa-magnet fa-fw"></i>
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="/profiles/{{ Auth::user()->id }}">
							{{ Lang::choice('kotoba::account.profile', 1) }}
						</a>
					</li>
				<li class="divider"></li>

				@if (Auth::user()->can('manage_admin'))
					@include('partials.nav_menu', ['items'=> $menu_navAdmin->roots()])
					<li class="divider"></li>
				@endif

					<li>
						<a href="/auth/logout">
							{{ trans('kotoba::auth.log_out') }}
						</a>
					</li>
				</ul>
			</li>
		@endif
	</ul>

@endif
