<?php

return [

//vendor:publish --provider="App\Modules\Newsdesk\Providers\NewsdeskServiceProvider" --tag="config"
//vendor:publish --provider="App\Modules\Newsdesk\Providers\NewsdeskServiceProvider" --tag="js"
//vendor:publish --provider="App\Modules\Newsdesk\Providers\NewsdeskServiceProvider" --tag="plugins"
//vendor:publish --provider="App\Modules\Newsdesk\Providers\NewsdeskServiceProvider" --tag="views"

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'newsdesk_db' => array(
	'prefix'					=> '',
),

'top_news_count'				=> 5,
'default_publish_status'		=> 1,

'auth_fail_redirect'			=> '/admin/dashboard',


'mailer' => [
	'from_email'				=> '',
	'from_name'					=> '',
	'group_slug'				=> 'news-mailer-group',
	'template'					=> 'news',
	'create_canned_slug'		=> 'news_created',
	'update_canned_slug'		=> 'news_update',
],

];
