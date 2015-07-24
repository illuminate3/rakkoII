@extends($theme_back)

{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::cms.print_status', 2) }} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')

<div class="row">
<h1>
	<p class="pull-right">
	<a href="/admin/print_statuses" class="btn btn-default" title="{{ trans('kotoba::button.back') }}">
		<i class="fa fa-chevron-left fa-fw"></i>
		{{ trans('kotoba::button.back') }}
	</a>
	</p>
	<i class="fa fa-edit fa-lg"></i>
	{{ trans('kotoba::general.command.create') }}
	<hr>
</h1>
</div>


<div class="row">
{!! Form::open([
	'url' => 'admin/print_statuses',
	'method' => 'POST',
	'class' => 'form'
]) !!}


	<div class="tab-content">

	@if (count($languages))

	<ul class="nav nav-tabs">
		@foreach( $languages as $language)
			<li class="@if ($language->locale == $lang)active @endif">
				<a href="#{{ $language->id }}" data-target="#lang_{{ $language->id }}" data-toggle="tab">{{{ $language->name }}}</a>
			</li>
		@endforeach
	</ul>

	@foreach( $languages as $language)
	<div role="tabpanel" class="tab-pane padding fade @if ($language->locale == $lang)in active @endif" id="lang_{{{ $language->id }}}">

			<div class="form-group">
				<label for="title">{{ trans('kotoba::account.name') }}</label>
				<input type="text" class="form-control" name="{{ 'name_'. $language->id }}" id="{{ 'name_'. $language->id }}" placeholder="{{ trans('kotoba::account.name') }}">
			</div>

			<div class="form-group">
				<label for="title">{{ trans('kotoba::general.description') }}</label>
				<input type="text" class="form-control" name="{{ 'description_'. $language->id }}" id="{{ 'description_'. $language->id }}" placeholder="{{ trans('kotoba::general.description') }}">
			</div>

	</div><!-- ./ $lang panel -->
	@endforeach

	@endif

	</div>


<hr>


<div class="row">
<div class="col-sm-12">
	<input class="btn btn-success btn-block" type="submit" value="{{ trans('kotoba::button.save') }}">
</div>
</div>

<br>

<div class="row">
<div class="col-sm-6">
	<a href="/admin/print_statuses" class="btn btn-default btn-block" title="{{ trans('kotoba::button.cancel') }}">
		<i class="fa fa-times fa-fw"></i>
		{{ trans('kotoba::button.cancel') }}
	</a>
</div>

<div class="col-sm-6">
	<input class="btn btn-default btn-block" type="reset" value="{{ trans('kotoba::button.reset') }}">
</div>
</div>


{!! Form::close() !!}


</div> <!-- ./ row -->
@stop
