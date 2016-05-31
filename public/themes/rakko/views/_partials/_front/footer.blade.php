<!-- FOOTER -->
<div class="footer-wrapper">
<footer>

	<div class="col-md-4">
		<p class="copyright-text"><a href="/" class="logo"><img src="{{ asset('/themes/' . $activeTheme . '/assets/img/footer-logo.png') }}" alt="" /></a> &copy; 2015-2016, All rights reserved</p>

		<ul class="footer-nav">
			<li><a href="/">Contact</a></li>
			<li><a href="/">Download</a></li>
			<li><a href="/">Privacy Policy</a></li>
			<li><a href="/">Terms of Use</a></li>
			<li><a href="/">FAQ</a></li>
		</ul>
	</div>

	<div class="col-md-4">
		<ul class="social">
			<li><a href="/" class="fb">&nbsp;</a></li>
			<li><a href="/" class="tw">&nbsp;</a></li>
			<li><a href="/" class="vm">&nbsp;</a></li>
		</ul>

		<p class="footer-email"><a href="/">info@illuminate3.com</a></p>
	</div>
	<div class="col-md-4">
		@include($activeTheme . '::' . '_partials._front._extra.login')
	</div>

</footer>
</div>
<!-- FOOTER -->
