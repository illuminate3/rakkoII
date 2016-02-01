<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container-fluid">

<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="/admin">
		{{ Setting::get('brand_title', Config::get('core.brand_title')) }}
	</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

@if (Auth::user())

{{-- @if (Auth::user()->can('manage_shisan')) --}}
@if ( Config::get('shisan.show_category_menu') == true)
	<ul class="nav navbar-nav">
		<li>
		<a href="#" class="sitemap" id="showLeft">
			{{ Lang::choice('kotoba::general.category', 2) }}
		</a>
		</li>
	</ul>
@endif
@endif


	@if (Auth::user())
		<ul class="nav navbar-nav">
{{--
			@include('_partials.menu', ['items'=> $menu_navbar->roots()])
			@include('_partials.menu_links')
--}}
		</ul>
	@endif
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
@if (Auth::user()->is('super_admin'))
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
@endif
@if (Auth::user()->is('super_admin'))
					<li class="divider"></li>
					{!!
						Widget::MenuAdmin()
					!!}
					<li class="divider"></li>
@endif
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

@endif


@if ( Auth::user()->is('hr_admin') )

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::general.setting', 2) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{!!
					Widget::MenuSettings()
				!!}
				</li>
			</ul>
		</li>
	</ul>

@endif



@if ( Auth::user()->is('hr_admin') )

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::general.mail', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{!!
					Widget::MenuMail()
				!!}
				</li>
			</ul>
		</li>
	</ul>

@endif




@if ( Auth::user()->is('hr_admin') )

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::hr.legal', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{!!
					Widget::MenuHoritsu()
				!!}
				</li>
			</ul>
		</li>
	</ul>

@endif



@if ( Auth::user()->is('hr_admin') )

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::hr.school', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{!!
					Widget::MenuSchool()
				!!}
				</li>
			</ul>
		</li>
	</ul>

@endif



@if ( Auth::user()->is('hr_admin') )

@endif


@if ( Auth::user()->is('hr_admin') )

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ trans('kotoba::hr.campus') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{!!
					Widget::MenuCampus()
				!!}
				</li>
			</ul>
		</li>
	</ul>

@endif





@if ( Auth::user()->is('hr_admin') )

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::hr.hr', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{!!
					Widget::MenuHR()
				!!}
				</li>
			</ul>
		</li>
	</ul>

@endif

@if ( Auth::user()->is('news_admin') || Auth::user()->is('cms_admin') )

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ trans('kotoba::cms.cms') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
				{!!
					Widget::MenuCMS()
				!!}
				</li>
			</ul>
		</li>
	</ul>

@endif


@if ( Auth::user()->is('super_admin') || Auth::user()->can('manage_shisan') )

	@include('shisan::_partials.nav')

@endif



</div>

</div><!-- ./container-fluid -->
</nav><!-- /nav -->
