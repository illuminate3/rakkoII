<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>

		<h2>{{ trans('kotoba::email.welcome_to') }}{{ Config::get('kagi.site_name') }}</h2>

		<div>
			{{ trans('kotoba::email.click_to_reset') }}
			&nbsp;:&nbsp;
			<a href="{{ url('password/reset/'.$token) }}">
				{{ trans('kotoba::email.reset_password_link') }}
			</a>
			<br>
			<br>
			{{ url('password/reset/'.$token) }}
		</div>

	</body>
</html>
