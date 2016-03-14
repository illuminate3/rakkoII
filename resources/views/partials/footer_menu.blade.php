@foreach($items as $item)
	<li class="related_links">
		@if($item->link)
			<a href="{{ $item->url() }}">
				{!! $item->title !!}
			</a>
		@else
			{{$item->title}}
		@endif
		@if($item->hasChildren())
			<ul class="related_links">
				@foreach($item->children() as $child)
					<li><a href="{{ $child->url() }}">{{ $child->title }}</a></li>
				@endforeach
			</ul>
		@endif
	</li>
	@if($item->divider)
		<li{{\HTML::attributes($item->divider)}}></li>
	@endif
@endforeach
