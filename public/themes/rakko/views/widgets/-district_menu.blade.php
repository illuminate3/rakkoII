<! -- Widget / district -->

<ul class="nav-title">
	<h3>
	District Links
	</h3>

	{!!
		Menu::handler('widget_district')
		->getItemsAtDepth(0)
		->addClass('nav-item');
	!!}

</ul>

