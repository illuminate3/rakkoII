<! -- Widget / schools-->

<ul class="nav-title">
	<h3>
	Schools
	</h3>

	{!!
		Menu::handler('widget_schools')
		->getItemsAtDepth(0)
		->addClass('nav-item');
	!!}

</ul>

