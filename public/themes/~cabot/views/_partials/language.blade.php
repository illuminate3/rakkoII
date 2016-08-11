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
