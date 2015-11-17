<!--FOOTER-->
<div class="container-fluid">
<div class="row">

	<div class="col-sm-12 padding-lg">
		<div class="text-center">
			@if (Auth::user() && Auth::user()->can('manage_admin'))
				<a href="/admin">Cabot School District</a> &copy; 2015
			@else
				<a href="http://www.cabotschools.org">Cabot School District</a> &copy; 2015
			@endif
		</div>
	</div>

</div><!--./row-->
</div><!--./container-fluid-->
