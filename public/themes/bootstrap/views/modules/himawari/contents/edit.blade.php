@extends($theme_back)

{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::general.content', 2) }} :: @parent
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-datepicker/css/datepicker3.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/chosen_v1.4.2/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen_bootstrap.css') }}">
@stop

@section('scripts')
	<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-datepicker/js/datepicker-settings.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendors/chosen_v1.4.2/chosen.jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendors/ckeditor/ckeditor.js') }}"></script>
@stop

@section('inline-scripts')
	jQuery(document).ready(function($) {
		$(".chosen-select").chosen({
			width: "100%"
		});
	});
	CKEDITOR.replace( 'ckeditor' );
@stop


{{-- Content --}}
@section('content')


<div class="row margin-top-lg">
{!! Form::model(
	$content,
	[
		'route' => ['admin.contents.update', $content->id],
		'method' => 'PATCH',
		'class' => 'form'
	]
) !!}


<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified" role="tablist">
	<li role="presentation" class="active"><a href="#content" aria-controls="content" role="tab" data-toggle="tab">{{ trans('kotoba::cms.content') }}</a></li>
	<li role="presentation"><a href="#meta" aria-controls="meta" role="tab" data-toggle="tab">{{ trans('kotoba::cms.meta') }}</a></li>
	<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">{{ Lang::choice('kotoba::general.setting', 2) }}</a></li>
</ul>


<!-- Tab panes -->
<div class="tab-content padding">


	<div role="tabpanel" class="tab-pane active" id="content">
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
				<label for="content">{{ trans('kotoba::cms.content') }}</label>
				<textarea class="form-control ckeditor" rows="3" name="{{ 'content_'. $language->id }}" id="{{ 'content_'. $language->id }}">{{ $content->translate($language->locale)->content }}</textarea>
			</div>

			<div class="form-group">
				<label for="title">{{ trans('kotoba::general.title') }}</label>
				<input type="text" class="form-control" name="{{ 'title_'. $language->id }}" id="{{ 'title_'. $language->id }}" value="{{  $content->translate($language->locale)->title }}">
			</div>

			<div class="form-group">
				<label for="summary">{{ trans('kotoba::cms.summary') }}</label>
				<textarea class="form-control ckeditor" rows="3" name="{{ 'summary_'. $language->id }}" id="{{ 'summary_'. $language->id }}">{{ $content->translate($language->locale)->summary }}</textarea>
			</div>

	</div><!-- ./ $lang panel -->
	@endforeach

	@endif


	</div>
	</div><!-- ./ content panel -->

	<div role="tabpanel" class="tab-pane" id="meta">
	<div class="tab-content">


	@if (count($languages))

	<ul class="nav nav-tabs">
		@foreach( $languages as $language)
			<li class="@if ($language->locale == $lang)active @endif">
				<a href="#{{ $language->id }}" data-target="#meta_{{ $language->id }}" data-toggle="tab">{{{ $language->name }}}</a>
			</li>
		@endforeach
	</ul>

	@foreach( $languages as $language)
	<div role="tabpanel" class="tab-pane padding fade @if ($language->locale == $lang)in active @endif" id="meta_{{{ $language->id }}}">

		<div class="form-group">
			<label for="title">{{ trans('kotoba::cms.meta_title') }}</label>
			<input type="text" class="form-control" name="{{ 'meta_title_'. $language->id }}" id="{{ 'meta_title_'. $language->id }}" value="{{  $content->translate($language->locale)->meta_title }}">
		</div>

		<div class="form-group">
			<label for="title">{{ trans('kotoba::cms.meta_keywords') }}</label>
			<input type="text" class="form-control" name="{{ 'meta_keywords_'. $language->id }}" id="{{ 'meta_keywords_'. $language->id }}" value="{{  $content->translate($language->locale)->meta_keywords }}">
		</div>

		<div class="form-group">
			<label for="title">{{ trans('kotoba::cms.meta_description') }}</label>
			<input type="text" class="form-control" name="{{ 'meta_description_'. $language->id }}" id="{{ 'meta_description_'. $language->id }}" value="{{  $content->translate($language->locale)->meta_description }}">
		</div>

	</div><!-- ./ $lang panel -->
	@endforeach

	@endif



	</div>
	</div><!-- ./ meta panel -->


	<div role="tabpanel" class="tab-pane" id="settings">
	<div class="tab-content padding">



<div class="row">
<div class="col-sm-6">
<div class="padding">

	<div class="form-group">
		{!! Form::label('parent_id', trans('kotoba::cms.parent'), ['class' => 'control-label']) !!}
		{!!
			Form::select(
				'parent_id',
				$pagelist,
				$content->parent_id,
				array(
					'class' => 'form-control chosen-select',
					'id' => 'parent_id'
				)
			)
		!!}
	</div>

	<div class="form-group">
		{!! Form::label('is_online', Lang::choice('kotoba::account.user', 1), ['class' => 'control-label']) !!}
		{!!
			Form::select(
				'user_id',
				$users,
				$content->user_id,
				array(
					'class' => 'form-control chosen-select'
				)
			)
		!!}
	</div>

	<div class="form-group {{ $errors->first('link') ? 'has-error' : '' }}">
		{!! Form::label('link', Lang::choice('kotoba::cms.link', 1), $errors->first('link'), ['class' => 'control-label']) !!}
		{!! Form::text('link', Input::old('link'), ['id' => 'link', 'class' => 'form-control', 'placeholder' => 'http://...']) !!}
	</div>


</div>
</div><!-- ./ col-6 -->
<div class="col-sm-6">
<div class="padding">

	@if (Auth::user()->can('manage_admin'))
		<div class="form-group">
			{!! Form::label('is_online', Lang::choice('kotoba::general.status', 1), ['class' => 'control-label']) !!}
			{!!
				Form::select(
					'print_status_id',
					$print_statuses,
					$content->print_status_id,
					array(
						'class' => 'form-control chosen-select'
					)
				)
			!!}
		</div>
	@else
		<div class="form-group">
			{!! Form::label('is_online', Lang::choice('kotoba::general.status', 1), ['class' => 'control-label']) !!}
			{!! Form::hidden('print_status_id', 1) !!}
			{{ Lang::choice('kotoba::cms.draft', 1) }}
		</div>
	@endif

	<div class="form-group {{ $errors->first('order') ? 'has-error' : '' }}">
		{!! Form::label('order', trans('kotoba::cms.position'), $errors->first('order'), ['class' => 'control-label']) !!}
		{!! Form::text('order', $content->order, ['id' => 'order', 'class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		<label for="is_featured" class="col-sm-1 control-label">{{ trans('kotoba::cms.is_featured') }}</label>
		<div class="col-sm-11">
			<div class="checkbox">
				<label>
					<input type="checkbox" id="is_featured" name="is_featured" value="1" {{ $content->present()->featured }}>
				</label>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="is_timed" class="col-sm-1 control-label">{{ trans('kotoba::cms.is_timed') }}</label>
		<div class="col-sm-11">
			<div class="checkbox">
				<label>
					<input type="checkbox" id="is_timed" name="is_timed" value="1" {{ $content->present()->timed }}>
				</label>
			</div>
		</div>
	</div>

	<div class="form-group {{ $errors->first('order') ? 'has-error' : '' }}">
		{!! Form::label('order', trans('kotoba::cms.publish_start'), $errors->first('order'), ['class' => 'control-label']) !!}
		<div id="datepicker-container">
			<div class="input-group date">
				<input type="text" id="publish_start" name="publish_start" class="form-control" value="{{ $content->publish_start }}">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
		</div>
	</div>

	<div class="form-group {{ $errors->first('order') ? 'has-error' : '' }}">
		{!! Form::label('order', trans('kotoba::cms.publish_end'), $errors->first('order'), ['class' => 'control-label']) !!}
		<div id="datepicker-container">
			<div class="input-group date">
				<input type="text" id="publish_end" name="publish_end" class="form-control" value="{{ $content->publish_end }}">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
		</div>
	</div>


</div>
</div><!-- ./ col-6 -->
</div><!-- ./ row -->












{{--
	<div class="form-group">
		{!! Form::label('featured_image', Lang::choice('kotoba::cms.image', 1), ['class' => 'control-label']) !!}
		<div class="imageTarget" rel="{{ $thumbnailPath }}"></div>
		{!! Form::hidden('featured_image', Input::old('featured_image'), ['id' => 'featured_image', 'class' => 'form-control hidden']) !!}
	</div>
	<div class="form-group">
		<a class="btn btn-default btn-rect btn-grad" id="changeFeaturedImage" data-toggle="modal" data-target="#featuredImageModal">{{ trans('kotoba::general.change') }}</a>
		<a class="btn btn-metis-3 btn-rect btn-grad" id="clearFeaturedImage">{{ trans('kotoba::general.clear') }}</a>
	</div>
--}}

	</div>
	</div><!-- ./ settings panel -->


</div><!-- ./ tab panes -->


<hr>


<div class="row">
<div class="col-sm-12">
	<input class="btn btn-success btn-block" type="submit" value="{{ trans('kotoba::button.save') }}">
</div>
</div>

<br>

<div class="row">

<div class="col-sm-4">
	<a href="/admin/contents" class="btn btn-default btn-block" title="{{ trans('kotoba::button.cancel') }}">
		<i class="fa fa-times fa-fw"></i>
		{{ trans('kotoba::button.cancel') }}
	</a>
</div>

<div class="col-sm-4">
	<input class="btn btn-default btn-block" type="reset" value="{{ trans('kotoba::button.reset') }}">
</div>

<div class="col-sm-4">
<!-- Button trigger modal -->
	<a data-toggle="modal" data-target="#myModal" class="btn btn-default btn-block" title="{{ trans('kotoba::button.delete') }}">
		<i class="fa fa-trash-o fa-fw"></i>
		{{ trans('kotoba::general.command.delete') }}
	</a>
</div>

</div>


{!! Form::close() !!}


</div> <!-- ./ row -->
@stop
