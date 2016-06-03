@section('Tools')
	class="active"
@stop

@section('tools-bar')
	active
@stop

@section('kb')
	class="active"
@stop


@section('sidebar')


<li class="header">
	{{ trans('kotoba::helpdesk.knowledge_base') }}
</li>

<li class="treeview @yield('category')">
	<a href="#">
		<i class="fa fa-list-ul"></i>
		<span>
			{{ trans('kotoba::helpdesk.category') }}
		</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li @yield('add-category')>
			<a href="{{url('agent/category/create') }}">
				<i class="fa fa-circle-o"></i>
				{{ trans('kotoba::helpdesk.addcategory') }}
			</a>
		</li>
		 <li @yield('all-category')>
		 	<a href="{{url('agent/category') }}">
		 		<i class="fa fa-circle-o"></i>
		 		{{ trans('kotoba::helpdesk.allcategory') }}
		 	</a>
		 </li>
	 </ul>
</li>

<li class="treeview @yield('article')">
	<a href="#">
		<i class="fa fa-edit"></i>
		<span>
			{{ trans('kotoba::helpdesk.article') }}
		</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li @yield('add-article')>
			<a href="{{url('agent/article/create') }}">
				<i class="fa fa-circle-o"></i>
				{{ trans('kotoba::helpdesk.addarticle') }}
			</a>
		</li>
		 <li @yield('all-article')>
			 <a href="{{url('agent/article') }}">
				 <i class="fa fa-circle-o"></i>
				 {{ trans('kotoba::helpdesk.allarticle') }}
			 </a>
		 </li>
	 </ul>
</li>

<li class="treeview @yield('pages')">
	<a href="#">
		<i class="fa fa-file-text"></i>
		<span>
			{{ trans('kotoba::helpdesk.pages') }}
		</span>
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li @yield('add-pages')>
			<a href="{{url('agent/page/create') }}">
				<i class="fa fa-circle-o"></i>
				{{ trans('kotoba::helpdesk.addpages') }}
			</a>
		</li>
		<li @yield('all-pages')>
			<a href="{{url('agent/page') }}">
				<i class="fa fa-circle-o"></i>
				{{ trans('kotoba::helpdesk.allpages') }}
			</a>
		</li>
	 </ul>
</li>

<li @yield('comment')>
	<a href="{{url('agent/comment') }}">
		<i class="fa fa-comments-o"></i>
		<span>
			{{ trans('kotoba::helpdesk.comments') }}
		</span>
	</a>
</li>
<li @yield('settings')>
	<a href="{{url('agent/kb/settings') }}">
		<i class="fa fa-wrench"></i>
		<span>
			{{ trans('kotoba::helpdesk.settings') }}
		</span>
	</a>
</li>


@stop
