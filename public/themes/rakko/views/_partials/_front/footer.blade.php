<!-- FOOTER -->
<div class="footer-wrapper">
<footer>

	<div class="col-sm-4">

		<a href="/" class="logo"><img src="{{ asset('/themes/' . $activeTheme . '/assets/img/footer-logo.png') }}" alt="" /></a>

{{--
		<ul class="footer-nav">
			<li><a href="/">Contact</a></li>
			<li><a href="/">Download</a></li>
			<li><a href="/">Privacy Policy</a></li>
			<li><a href="/">Terms of Use</a></li>
			<li><a href="/">FAQ</a></li>
		</ul>
--}}

	</div>
	<div class="col-sm-4">

		<p class="copyright-text">
			&copy;&nbsp;2015-2016, All rights reserved
			&nbsp;&nbsp;
			<a href="/">info@illuminate3.com</a>
		</p>

{{--
		<ul class="social">
			<li><a href="/" class="fb">&nbsp;</a></li>
			<li><a href="/" class="tw">&nbsp;</a></li>
			<li><a href="/" class="vm">&nbsp;</a></li>
		</ul>
--}}

	</div>
	<div class="col-sm-4">

		@include($activeTheme . '::' . '_partials._front._extra.login')

	</div>

</footer>
</div>
<!-- FOOTER -->
