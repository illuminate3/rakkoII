<?php

return [

/*
|--------------------------------------------------------------------------
| general
|--------------------------------------------------------------------------
*/
'site_name'						=> 'Kagi',
'separator'						=> ':',
'site_email'					=> 'kagi@example.com',

/*
|--------------------------------------------------------------------------
| Route
|--------------------------------------------------------------------------
|
| login paths:
| /auth/login // normal full login page
| /login // simple 1 button to redirect to social oauth provider
|
*/
'auth_login_path'				=> getenv('AUTH_LOGIN_PATH'),

'admin_login_return_path'		=> '/admin/dashboard',
'admin_logout_return_path'		=> '/auth/login',

'login_return_path'				=> '/',
'logout_return_path'			=> getenv('LOGOUT_RETURN_PATH'),

'auth_fail_redirect'			=> getenv('AUTH_FAIL_REDIRECT'),

/*
|--------------------------------------------------------------------------
| Security
|--------------------------------------------------------------------------
*/
'password_min'					=> 'min:6',
'throttle'						=> '3',
'time_out'						=> '2',
'default_role'					=> '2', // Admin is ID 1

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'kagi_db' => array(
	'prefix'					=> '', // not fully implemented, also may not make of difference due to models
	'default_role_id'			=> '2',
	'activated'					=> '1',
	'blocked'					=> '0',
),

'kagi_avatar'					=> 'assets/images/usr.png',

];
