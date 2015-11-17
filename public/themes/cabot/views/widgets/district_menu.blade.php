<! -- Widget / district -->


<div class="row">
	<h1>
		District Links
	</h1>
</div>


<div class="row margin-top-md">
<ul>

	{!!
		Menu::handler('widget_district')
		->getItemsAtDepth(0)
		->addClass('nav-item');
	!!}

</ul>
</div>
