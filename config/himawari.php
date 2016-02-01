<?php

return [

//vendor:publish --provider="App\Modules\Himawari\Providers\HimawariServiceProvider" --tag="config"
//vendor:publish --provider="App\Modules\Himawari\Providers\HimawariServiceProvider" --tag="js"
//vendor:publish --provider="App\Modules\Himawari\Providers\HimawariServiceProvider" --tag="plugins"
//vendor:publish --provider="App\Modules\Himawari\Providers\HimawariServiceProvider" --tag="views"

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'himawari_db' => array(
	'prefix'					=> '',
),

'auth_fail_redirect'			=> '/admin/dashboard',

];
