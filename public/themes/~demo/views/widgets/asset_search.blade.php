<! -- Widget / AssetSearch -->


<div class="row">
	<div class="col-sm-12">
<h3>
	<i class="fa fa-search fa-lg"></i>
	{{ Lang::choice('kotoba::shop.asset', 1) }}&nbsp;{{ Lang::choice('kotoba::general.search', 1) }}
	<hr>
</h3>
</div>
</div>


<div class="row">
	<div class="col-sm-12">

{!! Form::open([
	'url' => 'search/asset_results',
	'method' => 'POST',
	'class' => 'form-horizontal'
]) !!}

	<div class="form-group">
		<input type="text" id="search_terms" name="search_terms" placeholder="{{ trans('kotoba::general.command.enter') }} {{ Lang::choice('kotoba::general.search', 1) }}" class="form-control">
	</div>

	<hr>

	<div class="row">
		<input class="btn btn-success btn-block" type="submit" value="{{ trans('kotoba::button.search') }}">
	</div>

{!! Form::close() !!}

	</div>
</div> <!-- ./ row -->

