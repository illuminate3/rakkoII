<?php

// php artisan vendor:publish --provider="App\Modules\Yubin\Providers\YubinServiceProvider" --tag="config"


return [

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'yubin_db' => array(
	'prefix'					=> '',
),

'from_email'					=> '',
'from_name'						=> '',
'hr_mailer_slug'				=> 'hr-mailer-group',
'hr_template'					=> 'yubin',

'hr_canned_slug'				=> 'employee_created',

'cms_create_slug'				=> 'content_created',
'cms_update_slug'				=> 'content_update',


];
