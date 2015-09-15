<footer class="footer">
<div class="container-fluid">

	<hr>

		<div class="row">
			<div class="col-sm-4">

				{!! Widget::MenuFooter() !!}

			</div>
			<div class="col-sm-4">

				<p class="text-muted">
					{{ Config::get('core.footer') }}
				</p>

			</div>
			<div class="col-sm-4">

				{!! Widget::Featured() !!}
				{!! Widget::Timed() !!}

			</div>
		</div>



</div>
</footer>
