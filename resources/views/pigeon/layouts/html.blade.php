<!DOCTYPE html>
<head>

	<meta charset="utf-8">

<!-- ------------------------------------------ Google Fonts ------------------------------------------ -->
<!--
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
-->

<!-- ------------------------------------------ app loaded CSS stylesheets ------------------------------------------ -->
	@yield('styles')
<style>
body, html {
	height: 100%;
}

#flex-container {
	display: -webkit-box;      /* OLD - iOS 6-, Safari 3.1-6 */
	display: -moz-box;         /* OLD - Firefox 19- (buggy but mostly works) */
	display: -webkit-flex;     /* NEW - Chrome */
	display: flex;             /* NEW, Spec - Opera 12.1, Firefox 20+ */
	-webkit-box-flex-direction: row;
	-moz-box-flex-direction: row;
	-webkit-flex-direction: row;
	flex-direction: row;
	height:100%;
}

#flex-item {
	margin: auto;
	width: 80%;

}

#panel {
	width: 50%;
	height: 50%;
}
</style>

<!-- ------------------------------------------ head loaded js ------------------------------------------ -->

</head>

<body>


<div id="flex-container">
<div id="flex-item">

@yield('content')


</div>
</div>


</div>
</div>


<!-- ------------------------------------------ app loaded js ------------------------------------------ -->
	@yield('scripts')


</body>
</html>
