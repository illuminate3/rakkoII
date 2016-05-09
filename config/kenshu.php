<?php

// php artisan vendor:publish --provider="App\Modules\Kenshu\Providers\KenshuServiceProvider" --tag="config"
// php artisan vendor:publish --provider="App\Modules\Kenshu\Providers\KenshuServiceProvider" --tag="config"
// php artisan vendor:publish --provider="App\Modules\Kenshu\Providers\KenshuServiceProvider" --tag="views"

return [

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'kenshu_db' => array(
	'prefix'					=> '',
),


'auth_fail_redirect'			=> '/admin/dashboard',


'mailer' => [
	'from_email'				=> '',
	'from_name'					=> '',
	'group_slug'				=> '',
	'template'					=> 'seminars',
	'canned_slug'				=> 'seminar_info',
],


];
