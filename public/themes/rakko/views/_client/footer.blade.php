<footer class="main-footer">

<div class="pull-right hidden-xs">
	<b>
		{{ trans('kotoba::general.version') }}
	</b>
	{{ Config::get('core.version') }}
</div>

<strong>
	{{ trans('kotoba::general.copyright') }} &copy; 2015-2016 {{ Setting::get('brand_title', Config::get('core.brand_title')) }}
</strong>

{{ trans('kotoba::general.all_rights_reserved') }}

</footer>
