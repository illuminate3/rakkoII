<! -- Widget / district -->

<ul class="nav-title">
	<h3>
	District Links
	</h3>

	{!!
		Menu::handler('district')
		->getItemsAtDepth(0)
		->addClass('nav-item');
	!!}

</ul>

