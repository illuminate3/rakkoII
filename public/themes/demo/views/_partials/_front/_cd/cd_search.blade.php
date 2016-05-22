<!-- cd-search -->
<div id="cd-search" class="cd-search">
{!! Form::open([
	'url' => 'search/results',
	'method' => 'POST',
	'class' => 'form-horizontal'
]) !!}

<input type="text" id="search_terms" name="search_terms" placeholder="{{ trans('kotoba::general.command.enter') }} {{ Lang::choice('kotoba::general.search', 1) }}" class="form-control">

{!! Form::close() !!}
</div>
<!-- cd-search -->


{{--
		<div class="row">
		{!! Form::open([
			'url' => 'search/results',
			'method' => 'POST',
			'class' => 'form-horizontal'
		]) !!}

			<div class="form-group">
				<label class="col-md-3 control-label">{{ Lang::choice('kotoba::general.search', 1) }}</label>
				<div class="col-md-9">
					<input type="text" id="search_terms" name="search_terms" placeholder="{{ trans('kotoba::general.command.enter') }} {{ Lang::choice('kotoba::general.search', 1) }}" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="col-md-9">
					<button type="submit" class="btn btn-success btn-block" tabindex="0">
						{{ trans('kotoba::button.search') }}
					</button>
				</div>
			</div>

		{!! Form::close() !!}
		</div> <!-- ./ row -->
--}}
