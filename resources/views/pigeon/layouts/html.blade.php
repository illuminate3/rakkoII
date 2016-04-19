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
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            font-size: 100%;
            line-height: 1.6;
        }
        img {
            max-width: 100%;
        }
        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100%!important;
            height: 100%;
        }
        a {
            color: #348eda;
        }
        .btn-primary {
            text-decoration: none;
            color: #FFF;
            background-color: #348eda;
            border: solid #348eda;
            border-width: 10px 20px;
            line-height: 2;
            font-weight: bold;
            margin-right: 10px;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            border-radius: 25px;
        }
        .btn-secondary {
            text-decoration: none;
            color: #FFF;
            background-color: #aaa;
            border: solid #aaa;
            border-width: 10px 20px;
            line-height: 2;
            font-weight: bold;
            margin-right: 10px;
            text-align: center;
            cursor: pointer;
            display: inline-block;
            border-radius: 25px;
        }
        .last {
            margin-bottom: 0;
        }
        .first {
            margin-top: 0;
        }
        .padding {
            padding: 10px 0;
        }
        table.body-wrap {
            width: 100%;
            padding: 20px;
        }
        table.body-wrap .container {
            border: 1px solid #f0f0f0;
        }
        table.footer-wrap {
            width: 100%;
            clear: both!important;
        }
        .footer-wrap .container p {
            font-size: 12px;
            color: #666;

        }
        table.footer-wrap a {
            color: #999;
        }
        h1, h2, h3 {
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            line-height: 1.1;
            margin-bottom: 15px;
            color: #000;
            margin: 40px 0 10px;
            line-height: 1.2;
            font-weight: 200;
        }
        h1 {
            font-size: 36px;
        }
        h2 {
            font-size: 28px;
        }
        h3 {
            font-size: 22px;
        }
        p, ul, ol {
            margin-bottom: 10px;
            font-weight: normal;
            font-size: 14px;
        }
        ul li, ol li {
            margin-left: 5px;
            list-style-position: inside;
        }
        .container {
            display: block!important;
            max-width: 600px!important;
            margin: 0 auto!important; /* makes it centered */
            clear: both!important;
        }
        .body-wrap .container {
            padding: 20px;
        }
        .content {
            max-width: 600px;
            margin: 0 auto;
            display: block;
        }
        .content table {
            width: 100%;
        }
    </style>

<style type="text/css">{{-- file_get_contents(asset('assets/vendors/bootstrap-3.3.5-dist/css/bootstrap.min.css')) --}}</style>


<!-- ------------------------------------------ head loaded js ------------------------------------------ -->

</head>

<body>


<img src="{{ $message->embed( public_path('assets/images/rakko.jpg') ) }}">
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
