@extends($theme_front)

{{-- Web site Title --}}
@section('title')
{{{ $article->title }}} :: @parent
@stop

@section('seo')
	<meta name="keywords" content="{{ Meta::getKeywords() }}" />
	<meta name="description" content="{{ Meta::getDescription() }}" />
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('themes/' . $activeTheme . '/assets/css/cd_style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pdf_viewer.css') }}">
@stop

@section('scripts')
	<script type="text/javascript" src="{{ asset('themes/' . $activeTheme . '/assets/js/main.js') }}"></script>
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


{{-- News --}}
@section('content')

<div class="container-fluid padding-left-xl padding-right-xl">

<div class="row">
<div class="col-sm-12">
	<h1>
		{{ $article->title }}
	</h1>
	<hr>
</div>
</div>

<div class="row">
<div class="col-sm-8 col-sm-offset-2">
	@if ( count($article->images) )
		@foreach($article->images as $image)
			<img src="<?= $image->image->url('landscape') ?>" class="img-responsive img-rounded">
		@endforeach
	@endif
</div>
</div>


<!-- well -->
<div class="well">
	<h3>
		{!! $article->summary !!}
	</h3>
</div>
<!-- well -->


<div class="row">
<div class="col-sm-12">
	{!! $article->content !!}
</div>
</div>


@if ( count($article->documents) )
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
			@foreach($article->documents as $document)
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

</div> <!-- ./container -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	@include($activeTheme . '::' . '_partials.modal')
</div>


@stop
