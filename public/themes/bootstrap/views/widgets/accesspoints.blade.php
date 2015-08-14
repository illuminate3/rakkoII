<! -- Widget / accesspoints -->

<nav class="accesspoint">
<ul>

	{!!
		Menu::handler('accesspoint')
		->getItemsAtDepth(0)
		->addClass('accesspoint');
	!!}

</ul>
</nav>
