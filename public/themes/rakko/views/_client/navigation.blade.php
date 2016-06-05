<nav class="navbar navbar-default">
<div class="col-sm-6 col-sm-offset-3">

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<ul class="nav navbar-nav nav-remove-style">

	<li @yield('home')><a href="{{ url('helpdesk') }}">Help Desk</a></li>

	<li @yield('submit')><a href="{{ url('helpdesk/create-ticket') }}">{!! trans('kotoba::helpdesk.submit_a_ticket') !!}</a></li>

	<li @yield('myticket')><a href="{{ url('helpdesk/mytickets') }}">{!! trans('kotoba::helpdesk.my_tickets') !!}</a></li>


	<li class="dropdown" @yield('kb')>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! trans('kotoba::helpdesk.knowledge_base') !!} <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="{{ url('helpdesk/knowledgebase') }}">{!! trans('kotoba::helpdesk.knowledge_base') !!}</a></li>
			<li><a href="{{ url('helpdesk/categories') }}">{!! trans('kotoba::helpdesk.categories') !!}</a></li>
			<li><a href="{{ url('helpdesk/articles') }}">{!! trans('kotoba::helpdesk.articles') !!}</a></li>
		</ul>
	</li>

<?php
$pages = App\Modules\Support\Http\Models\KB\Page::where('status', '1')->where('visibility', '1')->get();
?>

	@foreach($pages as $page)
		<li><a href="{{ url('helpdesk/pages',$page->slug) }}">{{$page->name}}</a></li>
	@endforeach

</ul>

</div><!-- /.navbar-collapse -->
</nav>
