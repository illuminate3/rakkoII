<footer class="footer">
<div class="container-fluid">

	<hr>

		<div class="row">
			<div class="col-sm-4">

				{!! Plugin::MenuFooter() !!}

			</div>
			<div class="col-sm-4">
				<p class="text-muted">
					{{ Config::get('general.footer') }}
				</p>
			</div>
			<div class="col-sm-2">
				{!! Plugin::Featured() !!}
			</div>
			<div class="col-sm-2">
				{!! Plugin::Timed() !!}
			</div>
		</div>



</div>
</footer>
