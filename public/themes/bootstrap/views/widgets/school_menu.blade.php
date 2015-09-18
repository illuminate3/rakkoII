<! -- Widget / schools-->

<ul class="nav-title">
	<h3>
	Schools
	</h3>

	{!!
		Menu::handler('schools')
		->getItemsAtDepth(0)
		->addClass('nav-item');
	!!}

</ul>

