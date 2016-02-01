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

'auth_fail_redirect'			=> '/admin/dashboard',


];
