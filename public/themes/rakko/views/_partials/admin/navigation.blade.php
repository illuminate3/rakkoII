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

	@include($activeTheme . '::' . '_partials.admin.navigation_profile')

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

@if (Auth::user()->is('super_admin'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::general.setting', 2) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navSettings->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif

@if (Auth::user()->can('manage_yubin'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::general.mail', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navYubin->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif

@if (Module::isEnabled('horitsu'))
@if (Auth::user()->can('manage_horitsu'))
@if ( count($menu_navHoritsu->roots()) )
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::hr.legal', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navHoritsu->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif
@endif
@endif


@if (Module::isEnabled('gakko'))
@if (Auth::user()->can('manage_gakko'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::hr.school', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navGakko->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif
@endif


@if (Module::isEnabled('campus'))
@if (Auth::user()->can('manage_campus'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ trans('kotoba::hr.campus') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navCampus->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif
@endif


@if (Module::isEnabled('jinji'))
@if (Auth::user()->can('manage_jinji'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::hr.hr', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navJinji->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif
@endif


@if ( (Module::isEnabled('himawari')) || (Module::isEnabled('newsdesk')) )
@if ( (Auth::user()->can('manage_himawari')) || (Auth::user()->can('manage_newsdesk')) )
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ trans('kotoba::cms.cms') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navHimawari->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif
@endif

@if (Module::isEnabled('social'))
@if (Auth::user()->can('manage_social'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ trans('kotoba::general.social') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navSocial->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif
@endif

@if (Module::isEnabled('chishiki'))
@if (Auth::user()->can('manage_ticket'))
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
@endif

@if (Module::isEnabled('filex'))
@if (Auth::user()->can('manage_filex'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ trans('kotoba::files.media') }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navFilex->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif
@endif

@if (Module::isEnabled('shisan'))
@if (Auth::user()->can('manage_shisan'))
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				{{ Lang::choice('kotoba::shop.asset', 1) }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li>
					@include('partials.nav_menu', ['items'=> $menu_navShisan->roots()])
				</li>
			</ul>
		</li>
	</ul>
@endif
@endif


@endif


</div><!-- ./navbar-collapse -->


</div><!-- ./container-fluid -->
</nav><!-- /nav -->

