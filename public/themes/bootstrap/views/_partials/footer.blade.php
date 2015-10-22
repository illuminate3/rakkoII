<!--FOOTER-->
<div class="container-fluid footer">

	<div class="row">

		<div class="col-sm-4">

			{!!
				Widget::MenuSchools()
			!!}

		</div>

		<div class="col-sm-4">

			{!!
				Widget::MenuDistrict()
			!!}

		</div>



		<div class="col-sm-4">
		<ul class="nav-title">
			<h3>
			Get Connected
			</h3>
			<li class="nav-item padding-top-md">
			    <a class="fa fa-facebook fa-inverse fa-2x" href="https://www.facebook.com/pages/Bryant-Public-Schools/231848664782"></a>
				<a class="twitter fa fa-twitter fa-inverse fa-2x" href="https://twitter.com/BryantSchools"></a>
				<a class="twitter fa fa-instagram fa-inverse fa-2x" href="https://instagram.com/bryantpublicschools"></a>
				<a class="fa fa-wifi fa-inverse fa-rotate-90 fa-2x" href="https://bryantschools.bbcportal.com/"></a>
			</li>
			<br />
			<li class="nav-item">
				<a href="www.bryantschools.org/school-contact-information">School Contact Information</a>
			</li>
			<br />
			<li class="nav-item">
				1105 Woodland Drive
			</li>
			<li class="nav-item">
				Bryant, AR 72022
			</li>
			<br />
			<li class="nav-item">
				School Phone: 501-847-5651
			</li>
			<li class="nav-item">
				School Fax: 501-847-5654
			</li>
			<br />
		</ul>
		</div>

	</div><!--./row-->
	<div class="row">

		<div class="col-sm-12 padding-lg">
			<div class="copyright text-center">
				@if (Auth::user() && Auth::user()->can('manage_admin'))
					<a href="/admin">Bryant School District</a> &copy; 2015
				@else
					<a href="http://www.bryantschools.org">Bryant School District</a> &copy; 2015
				@endif
			</div>
		</div>

	</div><!--./row-->

</div><!--./container-fluid-->
