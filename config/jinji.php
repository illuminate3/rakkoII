<?php

// php artisan vendor:publish --provider="App\Modules\Jinji\Providers\JinjiServiceProvider" --tag="config"
// php artisan vendor:publish --provider="App\Modules\Jinji\Providers\JinjiServiceProvider" --tag="config"
// php artisan vendor:publish --provider="App\Modules\Jinji\Providers\JinjiServiceProvider" --tag="views"

return [

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------

*/
'jinji_db' => array(
	'prefix'						=> '',
),

'auth_fail_redirect'				=> '/admin/dashboard',


'mailer' => [
	'from_email'				=> '',
	'from_name'					=> '',
	'group_slug'				=> 'hr-mailer-group',
	'template'					=> 'hr',
	'canned_slug'				=> 'employee_created',
],


];
