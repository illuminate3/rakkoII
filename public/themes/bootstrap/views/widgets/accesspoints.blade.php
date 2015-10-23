<! -- Widget / accesspoints -->

<nav class="accesspoint">
<ul>

	{!!
		Menu::handler('widget_accesspoint')
		->getItemsAtDepth(0)
		->addClass('accesspoint');
	!!}

</ul>
</nav>
