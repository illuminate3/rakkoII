<?php

return [

//vendor:publish --provider="App\Modules\ModuleManager\Providers\ModuleManagerServiceProvider" --tag="config"

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'genius_db' => array(
	'prefix'					=> '',
),


'mailer' => [
	'from_email'				=> '',
	'from_name'					=> '',
	'group_slug'				=> 'genius-mailer-group',
	'template'					=> 'genius',
	'create_canned_slug'		=> 'genius_ticket_create',
	'update_canned_slug'		=> 'genius_ticket_update',
],


];
