@extends($theme_front)

{{-- Web site Title --}}
@section('title')
{{{ $page->title }}} :: @parent
@stop

@section('seo')
	<meta name="keywords" content="{{ Meta::getKeywords() }}" />
	<meta name="description" content="{{ Meta::getDescription() }}" />
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pdf_viewer.css') }}">
@stop

@section('scripts')
	<script src="{{ asset('assets/js/pdf_viewer.min.js') }}"></script>
@stop

@section('inline-scripts')
$(function(){
	$('.view-pdf').on('click',function(){
		var pdf_link = $(this).attr('href');
		var text = {!! json_encode($js_lang) !!};
		var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
		$.createModal({
		title: text.TITLE,
		close: text.CLOSE,
		message: iframe,
		closeButton:true,
		scrollable:false
		});
		return false;
	});
})
@stop


{{-- Content --}}
@section('content')


<div class="row">
	<h1>
		{{ $page->title }}
	</h1>
	<hr>
</div>


<div class="row">
<div class="col-sm-8 col-sm-offset-2">
	@if ( count($page->images) )
		@foreach($page->images as $image)
			<img src="<?= $image->image->url('landscape') ?>" class="img-responsive img-rounded">
		@endforeach
	@endif
</div>
</div>

{{--
<div class="row">
	<h2>
		{!! $page->summary !!}
	</h2>
</div>
--}}

<div class="row padding-xl">
<div class="col-sm-12">
	{!! $page->content !!}
</div>
</div>



@if ( count($page->documents) )
	<div class="row">
		<h3>
			{{ Lang::choice('kotoba::files.file', 2) }}
		</h3>
		<hr>
	</div>

	<div class="row">
	<table id="table" class="table table-striped table-hover">
		<thead>
			<tr>
				<th>{{ Lang::choice('kotoba::table.document', 1) }}</th>
				<th>{{ trans('kotoba::table.updated') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($page->documents as $document)
			<tr>
				<td>
					@if ( File::extension($document->document_file_name) == "pdf" )
						<i class="fa fa-file-pdf-o fa-lg"></i>
						<a class="view-pdf" href="{{ $document->document->url() }}">{{ $document->document_file_name }}</a>
					@else
						<i class="fa fa-download fa-lg"></i>
						<a class="" href="{{ $document->document->url() }}">{{ $document->document_file_name }}</a>
					@endif
				</td>
				<td>{{ $document->document_updated_at }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>

@endif


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	@include($activeTheme . '::' . '_partials.modal')
</div>


@stop
