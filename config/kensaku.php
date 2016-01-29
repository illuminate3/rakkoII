<?php

// php artisan vendor:publish --provider="App\Modules\Kensaku\Providers\KensakuServiceProvider" --tag="config"
// php artisan vendor:publish --provider="App\Modules\Kensaku\Providers\KensakuServiceProvider" --tag="config"
// php artisan vendor:publish --provider="App\Modules\Kensaku\Providers\KensakuServiceProvider" --tag="views"

return [

/*
|--------------------------------------------------------------------------
| db settings
|--------------------------------------------------------------------------
*/
'kensaku_db' => array(
	'prefix'					=> '',
),

'relevance_news'				=> 20,
'relevance_content'				=> 20,
'relevance_file'				=> 20,

];
