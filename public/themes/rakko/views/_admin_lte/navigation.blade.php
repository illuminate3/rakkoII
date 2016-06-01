<header class="main-header">

<!-- Logo -->
<a href="../../index2.html" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-mini"><b>A</b></span>
<!-- logo for regular state and mobile devices -->
<span class="logo-lg"><b>Admin</b></span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="navbar-collapse">


<!-- Nav tabs -->
<ul class="tabs tabs-horizontal nav navbar-nav navbar-left">
	<li role="presentation" class="active"><a href="#tabA" aria-controls="tabA" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.home') !!}</a></li>
{{--
	<li role="presentation" class="@yield('Staffs')"><a href="#tabB" aria-controls="tabB" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.staffs') !!}</a></li>
	<li role="presentation" class="@yield('Emails')"><a href="#tabC" aria-controls="tabC" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.emails') !!}</a></li>
	<li role="presentation" class="@yield('Manage')"><a href="#tabD" aria-controls="tabD" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.manage') !!}</a></li>
	<li role="presentation" class="@yield('Settings')"><a href="#tabE" aria-controls="tabE" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.settings') !!}</a></li>
	<li role="presentation" class="@yield('Themes')"><a href="#tabF" aria-controls="tabF" role="tab" data-toggle="tab">{!! trans('kotoba::helpdesk.themes') !!}</a></li>
--}}
</ul>



<ul class="nav navbar-nav navbar-right">

<li><a href="{{url('agent/dashboard')}}">Agent Panel</a></li>



<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
@if(Auth::user())
@if(Auth::user()->profile_pic)
<img src="{{asset('lb-faveo/dist/img')}}{{'/'}}{{Auth::user()->profile_pic}}"class="user-image" alt="User Image"/>
@else
{{--
<img src="{{ Gravatar::src(Auth::user()->email) }}" class="user-image" alt="User Image">
--}}
@endif
<span class="hidden-xs">{!! Auth::user()->first_name." ".Auth::user()->last_name !!}</span>
@endif
</a>
<ul class="dropdown-menu">
<!-- User image -->
<li class="user-header" style="background-color:#343F44;">
@if(Auth::user())
@if(Auth::user()->profile_pic)
<img src="{{asset('lb-faveo/lb-faveo/dist/img')}}{{'/'}}{{Auth::user()->profile_pic}}" class="img-circle" alt="User Image" />
@else
{{--
<img src="{{ Gravatar::src(Auth::user()->email) }}" class="img-circle" alt="User Image">
--}}
@endif
<p>
{!! Auth::user()->first_name !!}{!! " ". Auth::user()->last_name !!} - {{Auth::user()->role}}
<small></small>
</p>
@endif
</li>
<!-- Menu Footer-->

<li class="user-footer"  style="background-color:#1a2226;">
<div class="pull-left">
<a href="{{url('admin-profile')}}" class="btn btn-info btn-sm"><b>Profile</b></a>
</div>
<div class="pull-right">
<a href="{{url('auth/logout')}}" class="btn btn-danger btn-sm"><b>Sign out</b></a>
</div>
</li>
</ul>
</li>

</nav>


</header>
