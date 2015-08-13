<! -- Widget -->



<!-- Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">

<!-- Buttons -->
{!!
	Widget::AccessPoints()
!!}

<!-- Indicators -->
<ol class="carousel-indicators">
	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	<li data-target="#myCarousel" data-slide-to="1"></li>
	<li data-target="#myCarousel" data-slide-to="2"></li>
	<li data-target="#myCarousel" data-slide-to="3"></li>
</ol>

<div class="carousel-inner" role="listbox">

	<div class="item active">
		<a href="flashing-red-kids-ahead"><img class="first-slide img-responsive" src="{{ asset('themes/district/assets/img/slides/Bus_Safety_banner.jpg') }}" alt="First slide"></a>
	</div>

		<div class="item">
		<a href="school-board-meetings"><img class="first-slide img-responsive" src="{{ asset('themes/district/assets/img/slides/Board_Meeting_Banner.jpg') }}" alt="First slide"></a>
	</div>

	<div class="item">
		<a href="unfinished-business"><img class="second-slide img-responsive" src="{{ asset('themes/district/assets/img/slides/Salt Bowl 15_Banner.jpg') }}" alt="second slide"></a>
	</div>

	<div class="item">
		<a href="social-networking-to-stay-connected"><img class="third-slide img-responsive" src="{{ asset('themes/district/assets/img/slides/Stay Connected_banner.jpg') }}" alt="third slide"></a>
	</div>

</div><!-- ./carousel-inner -->

</div><!-- #/myCarousel -->

</div><!-- /.carousel -->





{!!
	Menu::handler('slider')
	->addClass('list-unstyled');
!!}
