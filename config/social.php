<?php

return [

//vendor:publish --provider="App\Modules\Social\Providers\SocialServiceProvider" --tag="config"
//vendor:publish --provider="App\Modules\Social\Providers\SocialServiceProvider" --tag="js"
//vendor:publish --provider="App\Modules\Social\Providers\SocialServiceProvider" --tag="plugins"
//vendor:publish --provider="App\Modules\Social\Providers\SocialServiceProvider" --tag="views"

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'himawari_db' => array(
	'prefix'					=> '',
),

'auth_fail_redirect'			=> '/admin',
'username'						=> 'sapporoguy',
'tweet_minutes'					=> 5,


];
