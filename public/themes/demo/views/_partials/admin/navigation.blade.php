<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container-fluid">

<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="/">
		{{ Setting::get('brand_title', Config::get('core.brand_title')) }}
	</a>
	<a class="navbar-brand" href="/admin">
		<i class="fa fa-dashboard fa-lg"></i>
		{{ trans('kotoba::cms.dashboard') }}
	</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

@if (Auth::user())

	<ul class="nav navbar-nav navbar-right">
		@if (Auth::guest())
			<li><a href="/auth/login">{{ trans('kotoba::auth.log_in') }}</a></li>
			<li><a href="/auth/register">{{ trans('kotoba::auth.register') }}</a></li>
		@else
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
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
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
{{--
					<li>
						<a href="/admin/users">
							{{ Lang::choice('kotoba::account.user', 2) }}
						</a>
					</li>
					<li>
						<a href="/admin/roles">
							{{ Lang::choice('kotoba::role.role', 2) }}
						</a>
					</li>
					<li>
						<a href="/admin/permissions">
							{{ Lang::choice('kotoba::permission.permission', 2) }}
						</a>
					</li>
					<li class="divider"></li>
--}}
					{{--
						Widget::MenuAdmin()
					--}}

{{-- $menu_navAdmin->asUl() --}}
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

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown messages-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<img alt="{{ Session::get('locale')  }}" src="{{ asset('/assets/images/famfamfam_flag_icons/png/' . Session::get('locale') . '.png') }}">
				<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				@foreach( $languages as $language)
					<li>
						<a rel="alternate" hreflang="{{ $language->locale }}" href="/language/{{ $language->locale }}">
							<img alt="{{ $language->locale }}" src="{{ asset('/assets/images/famfamfam_flag_icons/png/' . $language->locale . '.png') }}">
							{{{ $language->name }}}
						</a>
					</li>
				@endforeach
			</ul>
		</li>
	</ul>

@if (Auth::user())

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::general.setting', 2) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{{--
					Widget::MenuSettings()
				--}}
{{-- $menu_navAdmin->asUl() --}}
@include('partials.nav_menu', ['items'=> $menu_navSettings->roots()])
				</li>
			</ul>
		</li>
	</ul>

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::general.mail', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{{--
					Widget::MenuMail()
				--}}
{{-- $menu_navAdmin->asUl() --}}
@include('partials.nav_menu', ['items'=> $menu_navYubin->roots()])
				</li>
			</ul>
		</li>
	</ul>

@if (Module::isEnabled('horitsu'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::hr.legal', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{{--
					Widget::MenuHoritsu()
				--}}
{{-- $menu_navAdmin->asUl() --}}
@include('partials.nav_menu', ['items'=> $menu_navHoritsu->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif


@if (Module::isEnabled('gakko'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::hr.school', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{{--
					Widget::MenuSchool()
				--}}
{{-- $menu_navAdmin->asUl() --}}
@include('partials.nav_menu', ['items'=> $menu_navGakko->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif


@if (Module::isEnabled('campus'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ trans('kotoba::hr.campus') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{{--
					Widget::MenuCampus()
				--}}
{{-- $menu_navAdmin->asUl() --}}
@include('partials.nav_menu', ['items'=> $menu_navCampus->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif


@if (Module::isEnabled('jinji'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::hr.hr', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{{--
					Widget::MenuHR()
				--}}
{{-- $menu_navAdmin->asUl() --}}
@include('partials.nav_menu', ['items'=> $menu_navJinji->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif


@if (Module::isEnabled('himawari'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ trans('kotoba::cms.cms') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{{--
					Widget::MenuCMS()
				--}}
{{-- $menu_navAdmin->asUl() --}}
@include('partials.nav_menu', ['items'=> $menu_navHimawari->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif


@if (Module::isEnabled('chishiki'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ trans('kotoba::general.support') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
@include('partials.nav_menu', ['items'=> $menu_navChishiki->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif


@if (Module::isEnabled('shisan'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::shop.asset', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{{--
					Widget::MenuAssets()
				--}}
{{-- $menu_navAdmin->asUl() --}}
@include('partials.nav_menu', ['items'=> $menu_navShisan->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif


@endif



</div>

</div><!-- ./container-fluid -->
</nav><!-- /nav -->

