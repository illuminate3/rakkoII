<div class="container-fluid">
<div class="row">
<div class="col-sm-8 col-sm-offset-2">

<div class="well well-lg">

{{-- Form::open(['method'=>'get','action'=>'Client\KB\UserController@search','class'=>'search-form clearfix']) --}}
{!! Form::open([
	'url' => 'helpdesk/search',
	'method' => 'GET',
	'class' => 'form'
]) !!}


<div class="row">
<div class="col-sm-12">

<div class="input-group">
	<input type="text" class="form-control" placeholder="{!! trans('kotoba::helpdesk.have_a_question?_type_your_search_term_here') !!}">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button">
		<i class="fa fa-search fa-fw"></i>
		{!! trans('kotoba::helpdesk.search') !!}
		</button>
	</span>
</div><!-- /input-group -->

</div>
</div><!-- /.row -->


{!! Form::close() !!}

</div>

</div>
</div>
</div>
