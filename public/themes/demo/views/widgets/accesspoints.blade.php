<! -- Widget / accesspoints -->

<nav class="accesspoint">
<ul>

	{!!
		Menu::handler('widget_accesspoints')
		->getItemsAtDepth(0)
		->addClass('accesspoint');
	!!}

</ul>
</nav>
