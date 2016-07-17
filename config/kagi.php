<?php

return [

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'kagi_db' => array(
	'prefix'					=> '', // not fully implemented, also may not make of difference due to models
),

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

'login_return_path'				=> getenv('LOGIN_RETURN_PATH'),
'logout_return_path'			=> getenv('LOGOUT_RETURN_PATH'),

'auth_fail_redirect'			=> '/auth/login',

/*
|--------------------------------------------------------------------------
| Security
|--------------------------------------------------------------------------
*/
'password_min'					=> 'min:6',
'throttle'						=> '3',
'time_out'						=> '2',

/*
|--------------------------------------------------------------------------
| Defaults
|--------------------------------------------------------------------------
*/
'default_role'					=> '2', // Admin is ID 1
'default_role_id'				=> 2,

'activated'						=> 1,
'banned'						=> 0,
'blocked'						=> 0,
'confirmed'						=> 1,

'kagi_avatar'					=> 'assets/images/usr.png',

];
